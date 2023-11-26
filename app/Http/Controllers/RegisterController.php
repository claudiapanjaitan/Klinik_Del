<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function getLogin()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'nama' => 'required|min:5|max:255|unique:users',
            'nomor_induk' => 'required|min:3',
            'password' => 'required|min:5|max:255'
        ],[
            'username.required' => 'Username field is required.',
            'username.min' => 'Username must be at least 5 characters.',
            'username.max' => 'Username maximal 255 characters.',
            'username.unique' => 'Username has already been taken.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email has already been taken.',
            'nama.required' => 'Nama field is required.',
            'nama.min' => 'Nama must be at least 5 characters.',
            'nama.max' => 'Nama maximal 255 characters.',
            'nama.unique' => 'Nama has already been taken.',
            'nomor_induk.required' => 'NIM field is required.',
            'nomor_induk.min' => 'NIM must be at least 3 characters.',
            'password.required' => 'Password field is required.',
            'password.min' => 'Password must be at least 5 characters.',
            'password.max' => 'Password maximal 255 characters.',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi Berhasil, Silahkan Login');

        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
}
