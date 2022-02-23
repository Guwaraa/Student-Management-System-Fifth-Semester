<?php

namespace App\Http\Controllers\ClassSchedule;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\classschedulefile;
use Exception;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Response as FacadesResponse;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status == "user") {
            $semester = auth()->user()->Semester;
            $result = classschedulefile::get();
            return view("admin.classschedule.index", compact('semester', 'result'));
        } else {
            $semester = null;
            $result = 0;
            return view("admin.classschedule.index", compact('semester', 'result'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ClassSchedule::truncate();
        return view("admin.classschedule.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = 0;
        $data = array();
        $data = $request->get('days');
        foreach ($data as $schedules) {
            $schedule = new ClassSchedule();
            $schedule->Time = $request->get('time');
            $schedule->Subject = $request->get('subject');
            $schedule->Day = $data[$i];
            $schedule->save();
            $i++;
        }
        $time = array(); //to abstract from database
        $timeschedule = array(); // to pass into blade form
        $i = 0;
        $k = 0;
        // orderBy("time")->
        $classschedules = ClassSchedule::get();
        foreach ($classschedules as $data) {
            $time[$i] = $data->Time;
            $i++;
        }
        for ($i = 0; $i < count($time); $i++) {
            $j = $i;
            $temp = $time[$i];
            for ($k = 0; $k < count($time); $k++) {
                if ($j != $k) {
                    if ($temp == $time[$k]) {
                        $time[$k] = "";
                    }
                }
            }
        }
        sort($time);
        $temp = 0;
        return view("admin.classschedule.edit", compact('classschedules', 'time', 'temp'));
    }
    public function display()
    {
        $time = array(); //to abstract from database
        $timeschedule = array(); // to pass into blade form
        $i = 0;
        $k = 0;
        $classschedules = ClassSchedule::get();
        foreach ($classschedules as $data) {
            $time[$i] = $data->Time;
            $i++;
        }
        for ($i = 0; $i < count($time); $i++) {
            $j = $i;
            $temp = $time[$i];
            for ($k = 0; $k < count($time); $k++) {
                if ($j != $k) {
                    if ($temp == $time[$k]) {
                        $time[$k] = "";
                    }
                }
            }
        }
        sort($time);
        $temp = 0;
        return view("admin.classschedule.viewdata", compact('classschedules', 'time', 'temp'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = classschedulefile::find($id);
        return view('admin.classschedule.viewfile', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function schedulestore(Request $request)
    {
        $result = new classschedulefile();
        $result->title = $request->get('title');
        $result->remarks = $request->get('remarks');
        $semester = $request->get('semester');
        $result->semester = $semester;
        $result->examtype = 'board';
        if ($request->hasfile('uploadfile')) {
            foreach ($request->file('uploadfile') as $file) {
                $filename = $file->getClientOriginalName();
                $name = $filename;
                $file->move(public_path() . '/' . 'Classschedule/' . $semester . '/', $name);
            }
        }
        $result->filename = $filename;
        $result->save();
        $semester = null;
        $result =  classschedulefile::get();
        return view("admin.classschedule.index", compact('result', 'semester'));
    }
    public function classedit($id)
    {
    }
    public function scheduledisplay(Request $request)
    {
        $semester = $request->get('semester');
        $result =  classschedulefile::get();
        return view("admin.classschedule.index", compact('semester', 'result'));
    }
    public function download(Request $request)
    {
        $filename = $request->get('filename');
        $semester = $request->get('semester');
        $file = 'Classschedule/' . $semester . '/' . $filename;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return FacadesResponse::download($file, $filename, $headers);
    }
    public function deletedata(Request $request)
    {
        $id = $request->get('id');
        $data = classschedulefile::find($id);
        $filename = $data->filename;
        $semester = $data->semester;
        $uploadpath = 'Classschedule/' . $semester . '/' . $filename;
        if (unlink($uploadpath)) {
            $data->delete();
        }
        return redirect()->action([ClassScheduleController::class, 'index']);
    }
}
