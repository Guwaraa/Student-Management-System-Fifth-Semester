<?php

namespace App\Http\Controllers\StudyMaterial;

use App\Http\Controllers\Controller;
use App\Models\NoteMaterial;
use App\Models\subjectdetail;
use Facade\FlareClient\Stacktrace\File;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Response as FacadesResponse;

class NoteController extends Controller
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
            $subjectname=null;
            $notematerial = NoteMaterial::get();
            $subjectdetails =  subjectdetail::get();
            return view("admin.studymaterial.note.create", compact('notematerial','subjectname','subjectdetails', 'semester'));
        } else {
            return view('admin.studymaterial.note.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function store(Request $request)
    {
        $semester = $request->get('semester');
        $subjectname = null;
        $subjectdetails =  subjectdetail::get();
        return view('admin.studymaterial.note.create', compact('subjectdetails', 'semester', 'subjectname'));
    }
    public function save(Request $request)
    {
        $subjectname = $request->get('subjectname');
        $title = $request->get('title');
        $remarks = $request->get('remarks');
        $semester = $request->get('semester');
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $filename = $file->getClientOriginalName();
                $name = $filename;
                $file->move(public_path() . '/' . $subjectname . '/', $name);
                // $data[] = $name;
                $file = new NoteMaterial();
                $file->title = $title;
                $file->remarks = $remarks;
                $file->semester = $semester;
                $file->subjectname = $subjectname;
                $file->filenames = $filename;
                $file->save();
            }
        }
        $notematerial = null;
        $subjectname = null;
        $subjectdetails =  subjectdetail::get();
        return view("admin.studymaterial.note.create", compact('notematerial', 'subjectname', 'subjectdetails', 'semester'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
        $data = NoteMaterial::find($id);
        return view('admin.studymaterial.note.viewfile', compact('data'));
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
    public function display(Request $request)
    {

        $semester = $request->get('semester');
        $subjectname = $request->get('subjectname');
        $notematerial = NoteMaterial::get();
        $subjectdetails =  subjectdetail::get();
        return view("admin.studymaterial.note.create", compact('notematerial', 'subjectname', 'subjectdetails', 'semester'));
    }
    public function download(Request $request)
    {

        $filename = $request->get('filename');
        $subjectname = $request->get('subjectname');
        $file = $subjectname . '/' . $filename;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return FacadesResponse::download($file, $filename, $headers);
    }
    public function deletedata(Request $request)
    {
        $id = $request->get('id');
        $data = NoteMaterial::find($id);
        $filename = $data->filenames;
        $subjectname = $data->subjectname;
        $semester = $data->semester;
        $uploadpath = $subjectname . '/' . $filename;
        if (unlink($uploadpath)) {
            $data->delete();
        }
        $notematerial = null;
        $subjectname = null;
        $subjectdetails =  subjectdetail::get();

        return view("admin.studymaterial.note.create", compact('notematerial', 'subjectname', 'subjectdetails', 'semester'));
    }
}
