<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect(url()->previous())->with('success', 'Login Berhasil!');
        // }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('dashboard'))->with('success', 'Login Berhasil!');
        }

        return redirect('/login')->with('error', 'Login gagal! pastikan email dan password benar');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
