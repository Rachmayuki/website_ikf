<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        if (Auth::check()){
            return redirect('home');
        }
        else{
            return view('login');
        }
    }

    public function loginAksi(Request $request)
    {
        $credentials = $request->only('name', 'password'); // Ambil 'name' dan 'password'

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session setelah login berhasil
            return redirect()->intended('/home'); // Pastikan route /home ada
        }

        // Jika login gagal
        return back()->withErrors([
            'error' => 'Username atau password salah!',
        ]);
    }


    public function logoutAksi(){
        Auth::logout();
        return redirect('/');
    }
}
