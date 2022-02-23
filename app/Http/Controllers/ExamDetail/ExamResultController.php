<?php

namespace App\Http\Controllers\Examdetail;

use App\Http\Controllers\Controller;
use App\Models\result;
use App\Models\User;
use GrahamCampbell\ResultType\Result as ResultTypeResult;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Response as FacadesResponse;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function terminal()
    {
        if (auth()->user()->status == "user") {
            $semester = auth()->user()->Semester;
            $result = result::get();
            return view("admin.examdetail.examresult.terminalexam", compact('semester', 'result'));
        } else {
            $semester = null;
            $result = 0;
            return view("admin.examdetail.examresult.terminalexam", compact('semester', 'result'));
        }
    }
    public function board()
    {
        if (auth()->user()->status == "user") {
            $semester = auth()->user()->Semester;
            $result = result::get();
            return view("admin.examdetail.examresult.boardexam", compact('semester', 'result'));
        } else {
            $semester = null;
            $result = 0;
            return view("admin.examdetail.examresult.boardexam", compact('semester', 'result'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new result();
        $result->title = $request->get('title');
        $result->remarks = $request->get('remarks');
        $semester = $request->get('semester');
        $result->semester = $semester;
        $result->examtype = 'terminal';
        if ($request->hasfile('uploadfile')) {
            foreach ($request->file('uploadfile') as $file) {
                $filename = $file->getClientOriginalName();
                $name = $filename;
                $file->move(public_path() . '/' . $semester . '/', $name);
            }
        }
        $result->filename = $filename;
        $result->save();
        $semester = null;
        $result = result::get();
        return view("admin.examdetail.examresult.terminalexam", compact('result', 'semester'));
    }
    public function boardstore(Request $request)
    {
        $result = new result();
        $result->title = $request->get('title');
        $result->remarks = $request->get('remarks');
        $semester = $request->get('semester');
        $result->semester = $semester;
        $result->examtype = 'board';
        if ($request->hasfile('uploadfile')) {
            foreach ($request->file('uploadfile') as $file) {
                $filename = $file->getClientOriginalName();
                $name = $filename;
                $file->move(public_path() . '/' . $semester . '/', $name);
            }
        }
        $result->filename = $filename;
        $result->save();
        $semester = null;
        $result = result::get();
        return view("admin.examdetail.examresult.boardexam", compact('result', 'semester'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = result::find($id);
        return view('admin.examdetail.examresult.viewfile', compact('data'));
    }
    public function boardedit($id)
    {
        $data = result::find($id);
        return view('admin.examdetail.examresult.viewfile', compact('data'));
    }
    public function display(Request $request)
    {

        $semester = $request->get('semester');
        $result = result::get();
        return view("admin.examdetail.examresult.terminalexam", compact('semester', 'result'));
    }
    public function boarddisplay(Request $request)
    {
        $semester = $request->get('semester');
        $result = result::get();
        return view("admin.examdetail.examresult.boardexam", compact('semester', 'result'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function download(Request $request)
    {
        $filename = $request->get('filename');
        $semester = $request->get('semester');
        $file = $semester . '/' . $filename;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return FacadesResponse::download($file, $filename, $headers);
    }
    public function boarddownload(Request $request)
    {
        $filename = $request->get('filename');
        $semester = $request->get('semester');
        $file = $semester . '/' . $filename;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return FacadesResponse::download($file, $filename, $headers);
    }

    // public function saveData(Request $request)
    // {
    //     $model = new User();
    //     $model2 = new User();
    //     if($model->create($request->all())){
    //         $model2->create($request->all());
    //     }
    // }
    public function deletedata(Request $request)
    {
        $id = $request->get('id');
        $data = result::find($id);
        $filename = $data->filename;
        $semester = $data->semester;
        $uploadpath = $semester . '/' . $filename;
        if (unlink($uploadpath)) {
            $data->delete();
        }
        return redirect()->action([ExamResultController::class, 'terminal']);
    }
    public function boarddeletedata(Request $request)
    {
        $id = $request->get('id');
        $data = result::find($id);
        $filename = $data->filename;
        $semester = $data->semester;
        $uploadpath = $semester . '/' . $filename;
        if (unlink($uploadpath)) {
            $data->delete();
        }
        return redirect()->action([ExamResultController::class, 'board']);
    }
}
