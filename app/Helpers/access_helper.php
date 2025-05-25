<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('userHasAccess')) {
    /**
     * Cek apakah user yang login punya hak akses fitur dan privilege tertentu
     *
     * @param string $fitur
     * @param string $privilege
     * @return bool
     */
    function userHasAccess(string $fitur, string $privilege): bool
    {
        $user = Auth::user();
        if (!$user) {
            return false; 
        }

        return DB::table('hak_akses')
            ->where('id_level', $user->id_level)
            ->where('fitur', $fitur)
            ->where('privilege', $privilege)
            ->exists();
    }
}
