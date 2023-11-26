<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5|max:255',
            'password' => 'required'
        ],[
            'username.required' => 'Username field is required.',
            'username.min' => 'Username must be at least 5 characters.',
            'username.max:255' => 'Username maximal 255 characters.',
            'password.required' => 'Password field is required.',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login Berhasil');
        }

            $user = User::where('username',$request->username)->first();
            $user1 = User::where('username','!=',$request->username)->first();
            if($user){
                if (Hash::check($request->password, $user->password, [])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/login');
                }else{
                    return back()->with('LoginError', 'Password yang anda masukkan salah!'); 
                }
            }else if($user1){
                if (Hash::check($request->password, $user1->password, [])) {
                    return back()->with('LoginError', 'Username yang anda masukkan salah!');
                }else{
                    return back()->with('LoginError', 'Username dan Password anda salah!');
                }
            }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}