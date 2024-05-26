<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user == null)
        {
            return redirect()->back()->with('ERR', 'Alamat email tidak terdaftar');
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials))
        {  
            return redirect()->back()->with('ERR', 'Email and password tidak valid');
        }

        return redirect()->route('dashboard.index')->with('OK', 'Berhasil masuk ke dasbor');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login')->with('OK', 'Berhasil keluar dari dasbor');
    }
}
