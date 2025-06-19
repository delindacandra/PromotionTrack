<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return view('auth.login');
        }

        $user = Auth::user();

        if (!in_array($user->id_level, [1, 2, 3])) {
            Auth::logout();
            return redirect('/login')->with('error', 'Akses tidak diizinkan');
        }

        return $this->redirectUser($user);
    }

    public function login_process(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['name' => $request->name]);
            session()->put('user', [
                'email' => $user->email,
                'level' => $user->level->nama_level,
                'sa'    => $user->nama_sa,
            ]);

            return $this->redirectUser($user);
        }
        return redirect('/login')->with('failed', 'Email atau Password Salah');
    }
    
    private function redirectUser($user)
    {
        return match ($user->id_level) {
            1, 2 => redirect('/dashboard')->with('success', 'Login Berhasil'),
            3    => redirect('/beranda')->with('success', 'Login Berhasil'),
            default => redirect('/login')->with('error', 'Akses tidak diizinkan'),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
