<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('LoginPage', [
            'title' => 'Login',
        ]);
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:12'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/Index')->with('successLogin', 'Login Berhasil! Selamat datang di BalikModalin');

        }

        return back()->with('loginError', 'Login gagal! Silahkan Coba Lagi.')
             ->with('errorFrom', 'login');
    }

}
