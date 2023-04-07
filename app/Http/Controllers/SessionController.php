<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view("sesi/login");
    }
    function login(Request $request){
        Session::flash('email', $request->email);
        $request->validate([  
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect()->route('klub')->with('success', 'Anda Berhasil Login');
        }else{
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }
    function logout(){
            Auth::logout();
            return redirect('sesi')->with('succes', 'Anda Berhasil Logout');
    }
}
