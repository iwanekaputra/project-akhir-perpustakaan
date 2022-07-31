<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\User;

use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{

    public function index () {
        return view('register.index');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255',
        ]);


        $validated['password'] = Hash::make($validated['password']);
        $validated['image'] = 'user.jpg';

        User::create($validated);
        return redirect('/')->with('success', 'Daftar Akun berhasil! silahkan login');


    }  
}
