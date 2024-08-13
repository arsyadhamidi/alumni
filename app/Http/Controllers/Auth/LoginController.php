<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }else{
            return back()->with('error', 'Username atau Password anda salah');
        }
    }

    public function logout(Request $request)
    {
          Auth::logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();
          return redirect('/login');
    }
}