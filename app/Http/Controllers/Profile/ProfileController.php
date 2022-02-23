<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\studentdetail;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentdetail = studentdetail::get();
        $studentdetailprofile = studentdetail::get();


        return view("admin.profile.profilepage", compact('studentdetail', 'studentdetailprofile'));
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

        $id = $request->get('id');
        $detail = studentdetail::find($id);
        $user = User::find(auth()->user()->id);
        $detail->first_name = $request->get('first_name');
        $user->First_Name = $request->get('first_name');

        $detail->last_name = $request->get('last_name');
        $user->Last_Name = $request->get('last_name');

        $detail->email = $request->get('email');
        $user->email = $request->get('email');

        $detail->address = $request->get('address');
        $detail->contact_number = $request->get('contact_number');
        $detail->registration_no = $request->get('registration_no');
        $detail->parent_fname = $request->get('parent_fname');
        $detail->parent_lname = $request->get('parent_lname');
        $detail->parent_contact = $request->get('parent_contact');
        if ($request->hasFile('uploadfile')) {
            $name = $request->file('uploadfile')->getClientOriginalName();
            $detail->profile_image = $name;
            $user->image=$name;
            $image = $request->file('uploadfile');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/profileimage');
            $image->move($dest, $name);
        }
        $detail->save();
        $user->save();
        return redirect()->back();
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
}
