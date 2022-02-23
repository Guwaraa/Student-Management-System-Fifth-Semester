<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\coursedetail;
use App\Models\studentdetail;
use App\Models\subjectdetail;
use Exception;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.setting.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new coursedetail();
        $subjdetails=new subjectdetail();
        $semester=$request->get('semseter');
        $course->Subject_Code = $request->get('subjectcode');
        $course->Subject_Name = $request->get('subjectname');
        $course->Subject_teacher = $request->get('teachername');
        $course->Semester =$semester;
        $subjdetails->$semester=$request->get('subjectname');
        $name = $request->file('imagefile')->getClientOriginalName();
        $course->Teacher_profile = $name;
        if ($request->hasFile('imagefile')) {
            $image = $request->file('imagefile');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/image');
            $image->move($dest, $name);
        }
        try {
            $course->save();
            $subjdetails->save();
        } catch (Exception $ex) {
        }
        $studentdetails = coursedetail::get();
        return view('admin.setting.coursedetail.modify', compact('studentdetails'));
    }
    public function studentdetail()
    {
        $studentdetails = coursedetail::get();
        return view('admin.setting.coursedetail.modify', compact('studentdetails'));
    }

    public function studentdata()
    {
        $studentdetails = studentdetail::get();
        return view('admin.setting.studentdetail.index', compact('studentdetails'));
    }
    public function savedata(Request $request)
    {
        $studentdetails = new studentdetail();
        $studentdetails->Std_Id = $request->get('Stdid');
        $studentdetails->Semester = $request->get('semester');
        $studentdetails->first_name = $request->get('fname');
        $studentdetails->last_name = $request->get('lname');
        $studentdetails->registration_no = $request->get('registrationnumber');
        $studentdetails->profile_image = 'null';

        $studentdetails->save();
        $studentdetails = studentdetail::get();
        return view('admin.setting.studentdetail.index', compact('studentdetails'));
    }
    public function deletedata(Request $request)
    {
        $id = $request->get('id');
        $subject = studentdetail::find($id);
        $subject->delete();
        $studentdetails = studentdetail::get();
        return view('admin.setting.studentdetail.index', compact('studentdetails'));
    }
    public function editdata($id)
    {
        $studentdetails = studentdetail::get();
        $data = studentdetail::find($id);
        return view('admin.setting.studentdetail.edit', compact('data', 'studentdetails'));
    }
    public function updatedetail(Request $request)
    {
        $id = $request->get('id');
        $studentdetails = studentdetail::find($id);
        $studentdetails->Std_Id = $request->get('Stdid');
        $studentdetails->Semester = $request->get('semester');
        $studentdetails->first_name = $request->get('fname');
        $studentdetails->last_name = $request->get('lname');
        $studentdetails->registration_no = $request->get('registrationnumber');
        $studentdetails->save();
        $studentdetails = studentdetail::get();
        return view('admin.setting.studentdetail.index', compact('studentdetails'));
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
        $studentdetails = coursedetail::get();
        $data = coursedetail::find($id);
        return view('admin.setting.coursedetail.edit', compact('data', 'studentdetails'));
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
        //
    }
    public function subjectdelete(Request $request)
    {
        $Subject_id = $request->get('subjectid');
        $subject = coursedetail::find($Subject_id);
        $subject->delete();
        $studentdetails = coursedetail::get();
        return view('admin.setting.coursedetail.modify', compact('studentdetails'));
    }
    public function updatedata(Request $request)
    {
        $id = $request->get('id');
        $student = coursedetail::find($id);
        $student->Subject_Name = $request->get('subjectname');
        $student->Subject_teacher = $request->get('teachername');


        if ($request->hasFile('imagefile')) {
            $name = $request->file('imagefile')->getClientOriginalName();
            $student->Teacher_profile = $name;
            $image = $request->file('imagefile');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/image');
            $image->move($dest, $name);
        }
        try {
            $student->save();
        } catch (Exception $ex) {
        }
        $studentdetails = coursedetail::get();
        return view('admin.setting.coursedetail.modify', compact('studentdetails'));
    }
}
