<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\studentdetail;
use App\Models\subjectdetail;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function registerForm()
    {
        if (auth()->check())
            return redirect()->route('homepage');
        return view('auth.register');
    }
    function registerUser(Request $request)
    {
        $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "id" => 'required|unique:users',
            "email" => 'required|email|unique:users',
            "password" => 'required',
            "password-confirmation" => 'required',
        ]);

        $user = new User();
        $detail = new studentdetail();
        $user->First_Name = $request->get('first_name');
        $detail->first_name = $request->get('first_name');
        $user->Last_Name = $request->get('last_name');
        $detail->last_name = $request->get('last_name');
        $user->Std_Id = $request->get('id');
        $detail->Std_Id = $request->get('id');
        $user->email = $request->get('email');
        $detail->email = $request->get('email');
        $user->Semester = $request->get('semester');
        $detail->Semester = $request->get('semester');
        $detail->status="user";
        $user->status="user";
        $detail->profile_image="user.png";
        $user->image="user.png";
        $detail->save();
        $user->password = bcrypt($request->get('password-confirmation'));
        if ($user->save()) {
            return redirect()->route('register')->with(['msg' => "User Account Created Sucessfully"]);
            return redirect()->route('register')->withError(['msg' => "User Account Failed to Register"]);
        }
    }
}
