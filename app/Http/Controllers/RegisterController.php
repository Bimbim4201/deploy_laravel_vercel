<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', 'Register telah berhasil, silahkan untuk login!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // ⬇️ DI SINI tempat kamu masukkan return back
        return back()
            ->withErrors($e->validator)
            ->withInput()
            ->with('errorFrom', 'register'); // untuk membedakan error login/register di tampilan
    }
}
   
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Lanjut simpan data, dll...
        
    }
}
