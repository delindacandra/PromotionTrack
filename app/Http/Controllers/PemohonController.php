<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemohonController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => '',
            'list' => ['Beranda']
        ];
        return view('pemohon.index', ['breadcrumb' => $breadcrumb]);
    }
}
