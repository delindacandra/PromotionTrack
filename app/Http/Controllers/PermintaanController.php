<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PermintaanModel;
use App\Models\SkalaKegiatanModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermintaanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Permintaan Barang',
            'list' => [' Daftar Permintaan']
        ];
        $users = UsersModel::with('fungsi')->get();
        $skala = SkalaKegiatanModel::all();
        return view('permintaan.index', ['breadcrumb' => $breadcrumb, 'skala' => $skala, 'users' => $users]);
    }

    public function list(Request $request)
    {
        $permintaan = PermintaanModel::with('users.fungsi', 'skala');

        if ($request->filter_skala) {
            $permintaan->where('id_skala', $request->filter_skala);
        }

        return DataTables::of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '';
                if (userHasAccess('permintaan', 'show')) {
                    $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/detail') . '" class="btn btn-info btn-sm me-1">Detail</a>';
                }
                if (userHasAccess('permintaan', 'proses')){
                    $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/proses') . '" class="btn btn-warning btn-sm me-1">Proses</a>';
                }
                if (userHasAccess('permintaan', 'destroy')) {
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/permintaan/' . $row->id_permintaan) . '">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                }

                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id)
    {
        $permintaan = PermintaanModel::with('users', 'skala')->findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'Permintaan Barang',
            'list' => ['Permintaan', 'Info']
        ];
        return view('permintaan.show', ['breadcrumb' => $breadcrumb, 'permintaan' => $permintaan]);
    }
}
