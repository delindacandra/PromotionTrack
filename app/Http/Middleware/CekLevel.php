<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if (!$user->level) {
            Auth::logout();
            return redirect('/login')->with('error', 'User tidak memiliki level akses');
        }

        if (in_array($user->id_level, $levels)) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Maaf anda tidak memiliki akses');
    }
}
