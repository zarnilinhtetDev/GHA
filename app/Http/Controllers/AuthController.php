<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.login');
    }
    public function adminLogin()
    {
        request()->validate([
            'password' => 'required',
            'email' => 'required|email'
        ]);

        $email = request()->email;
        $password = request()->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('error', 'User Credentials Wrong');
        }
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
