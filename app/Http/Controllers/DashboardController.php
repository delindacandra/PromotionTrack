<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Dashboard',
            'list' => ['Dashboard']
        ];
        $user = session('user');
        return view('dashboard', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }
}
