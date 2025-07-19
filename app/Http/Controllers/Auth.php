<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Authentication;

class Auth extends Controller {
    public function login(Request $req){
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Authentication::attempt($data)){
            $req->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors('Login gagal!')->onlyInput('email');
    }

    public function logout(Request $req){
        Authentication::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/login');
    }
}
