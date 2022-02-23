<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\studentdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginForm()
    {
        if (auth()->check())
            return redirect()->route('homepage');
        return view('auth.login');
    }
    function loginUser(LoginRequest $request)
    {


        $credential = ['Std_Id' => $request->get('id'), "password" => $request->get('password')];


        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('homepage');
        }
        return back()->withErrors([
            'id' => 'The provided credentials do not match our records.',

        ]);
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }
}
