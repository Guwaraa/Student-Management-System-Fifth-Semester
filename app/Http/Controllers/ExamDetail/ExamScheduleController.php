<?php

namespace App\Http\Controllers\ExamDetail;

use App\Http\Controllers\Controller;
use App\Models\examschedule;
use App\Models\subjectdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response as FacadesResponse;


class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.examdetail.examschedule.index");
    }
    public function showtabledata()
    {
        $semester = null;
        $result = 0;
        if (auth()->user()->status == "user") {
            $semester = auth()->user()->Semester;
            $result = examschedule::get();
            return view("admin.examdetail.examschedule.show", compact('semester', 'result'));
        } else {
            return view("admin.examdetail.examschedule.show", compact('semester', 'result'));
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     *  * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return view("admin.examdetail.examschedule.create");
    }
    public function calculatedate(Request $request)
    {
        $sem = $request->get('sem');
        $flag = 0;
        date_default_timezone_set('UTC');
        $year = date("Y");
        $month = $request->get('month');
        $date = $request->get('day');
        $interval = $request->get('interval');
        ///////////////////////////
        $time = $year . $month . $date;
        $timestamp = strtotime($time);
        $day = date('l', $timestamp);
        /////////////////////////////////
        $dateday = array();
        $dateday[0][0] = $year . '-' .   $month . '-' .  $date;
        $dateday[0][1] = $day;
        ///////////////////////
        for ($i = 0; $i <= 10; $i++) {
            $date = date('Y-m-d', strtotime($dateday[$i][0] . '+' . $interval . 'days'));
            $timestamp = strtotime($date);
            $day = date('l', $timestamp);

            $dateday[$i + 1][$i + 1] = $day;
            $dateday[$i + 1][0] = $date;
            if ($flag == 0) {
                $dateday[0][0] = date('Y-m-d', strtotime($dateday[1][0] . '-' . $interval . 'days'));
                $timestamp = strtotime($dateday[0][0]);
                $day = date('l', $timestamp);
                $dateday[0][1] = $day;
                $flag = 1;
            }
        }
        $finaldate[0][0] = $dateday[0][0];
        $finaldate[0][1] = $dateday[0][1];
        $j = 1;
        for ($i = 1; $i <= 10; $i++) {

            if ($dateday[$i][$i] != 'Saturday') {
                $finaldate[$j][0] = $dateday[$i][0];
                $finaldate[$j][$j] = $dateday[$i][$i];
                $j++;
            }
        }
        $date = date("Y");
        $count = 0;
        $subjectdetails = subjectdetail::get();
        return view('admin.examdetail.examschedule.createview', compact('date', 'finaldate', 'subjectdetails', 'count', 'sem'));
    }
    public function schedulestore(Request $request)
    {
        $result = new examschedule();
        $result->title = $request->get('title');
        $result->remarks = $request->get('remarks');
        $semester = $request->get('semester');
        $result->semester = $semester;
        $result->examtype = 'terminal';
        if ($request->hasfile('uploadfile')) {
            foreach ($request->file('uploadfile') as $file) {
                $filename = $file->getClientOriginalName();
                $name = $filename;
                $file->move(public_path() . '/' . 'Examschedule/' . $semester . '/', $name);
            }
        }
        $result->filename = $filename;
        $result->save();
        $semester = null;
        $result = examschedule::get();
        return view("admin.examdetail.examschedule.show", compact('result', 'semester'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->get('date');
        $day = $request->get('day');
        $subject = $request->get('subjectdetail');
        $schedule = array();
        foreach ($date as $i => $data) {
            for ($j = 0; $j < 3; $j++) {
                if ($j == 0) {
                    $schedule[$i][$j] = $date[$i];
                }
                if ($j == 1) {
                    $schedule[$i][$j] = $day[$i];
                }
                if ($j == 2) {
                    $schedule[$i][$j] = $subject[$i];
                }
            }
        }
        $total = $i;

        return view('admin.examdetail.examschedule.preview', compact('schedule', 'total'));
    }
    public function display(Request $request)
    {
        $date = date("Y");
        $sem = $request->get('sem');
        return view('admin.examdetail.examschedule.create', compact('date', 'sem'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pdf=App::make('dompdf.wrapper');
        // return $pdf->download('admin.examdetail.examschedule.preview');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = examschedule::find($id);
        return view('admin.examdetail.examschedule.viewfile', compact('data'));
    }
    public function scheduledisplay(Request $request)
    {
        $semester = $request->get('semester');
        $result = examschedule::get();
        return view("admin.examdetail.examschedule.show", compact('semester', 'result'));
    }
    public function download(Request $request)
    {
        $filename = $request->get('filename');
        $semester = $request->get('semester');
        $file = 'Examschedule/' . $semester . '/' . $filename;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return FacadesResponse::download($file, $filename, $headers);
    }
    public function deletedata(Request $request)
    {
        $id = $request->get('id');
        $data = examschedule::find($id);
        $filename = $data->filename;
        $semester = $data->semester;
        $uploadpath = 'Examschedule/' . $semester . '/' . $filename;
        if (unlink($uploadpath)) {
            $data->delete();
        }
        return redirect()->action([ExamScheduleController::class, 'showtabledata']);
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



    public function boardschedule()
    {
        if (auth()->user()->status == "user") {
            $semester = auth()->user()->Semester;
            $result = examschedule::get();
            return view("admin.examdetail.examschedule.boardschedule", compact('semester', 'result'));
        } else {
            $semester = null;
            $result = 0;
            return view("admin.examdetail.examschedule.boardschedule", compact('semester', 'result'));
        }
    }
    public function boardschedulestore(Request $request)
    {
        $result = new examschedule();
        $result->title = $request->get('title');
        $result->remarks = $request->get('remarks');
        $semester = $request->get('semester');
        $result->semester = $semester;
        $result->examtype = 'board';
        if ($request->hasfile('uploadfile')) {
            foreach ($request->file('uploadfile') as $file) {
                $filename = $file->getClientOriginalName();
                $name = $filename;
                $file->move(public_path() . '/' . 'Examschedule/' . $semester . '/', $name);
            }
        }
        $result->filename = $filename;
        $result->save();
        $semester = null;
        $result = examschedule::get();
        return view("admin.examdetail.examschedule.boardschedule", compact('result', 'semester'));
    }
    public function boardedit($id)
    {
        $data = examschedule::find($id);
        return view('admin.examdetail.examresult.viewfile', compact('data'));
    }
    public function boardscheduledisplay(Request $request)
    {
        $semester = $request->get('semester');
        $result = examschedule::get();
        return view("admin.examdetail.examschedule.boardschedule", compact('semester', 'result'));
    }
    public function boarddownload(Request $request)
    {
        $filename = $request->get('filename');
        $semester = $request->get('semester');
        $file = 'Examschedule/' . $semester . '/' . $filename;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return FacadesResponse::download($file, $filename, $headers);
    }
    public function boarddeletedata(Request $request)
    {
        $id = $request->get('id');
        $data = examschedule::find($id);
        $filename = $data->filename;
        $semester = $data->semester;
        $uploadpath = 'Examschedule/' . $semester . '/' . $filename;
        if (unlink($uploadpath)) {
            $data->delete();
        }
        return redirect()->action([ExamScheduleController::class, 'showtabledata']);
    }
}
