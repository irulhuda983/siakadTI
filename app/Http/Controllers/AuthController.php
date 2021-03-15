<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    

    public function showLoginForm()
    {
        if(Auth::check()){
            return redirect('/');
        }

        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);


        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if(Auth::check()){
            return redirect('/');
        }else {
            return redirect('/login')->with('notif', 'Email Atau Password Salah');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
