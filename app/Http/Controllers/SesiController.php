<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib di isi.',
            'password.required' => 'Password wajib di isi.'
        ]);

        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('dashboard');
        }else {
            return redirect('')->withErrors('Username atau Password tidak sesuai.')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('');
    }
}
