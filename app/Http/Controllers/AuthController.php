<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        if ($users) {
            return redirect('/dashboard');
        }
        return view('auth.login', );
    }

    public function login_process(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = UsersModel::where('email', $credentials['email'])->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            Auth::login($user);
            session()->put('user.email', $user->email);
            session()->put('user.level', $user->level->nama_level);
            session()->put('user.sa', $user->nama_sa);

            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }
        return redirect('/login')->with('failed', 'Email atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
