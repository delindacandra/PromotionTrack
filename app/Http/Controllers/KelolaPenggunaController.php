<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelolaPenggunaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Kelola Pengguna',
            'list' => ['Kelola Pengguna', 'List']
        ];
        return view(('pengguna.index'), ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $users = UsersModel::with('level', 'fungsi', 'sales_area')->orderBy('id_level', 'asc');
        if ($request->id_users) {
            $users->where('id_users', $request->id_users);
        }
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn = '<a href="' . url('/pengguna/' . $user->id_users) . '" class="btn btn-info btn-sm me-1">Detail</a>';
                $btn .= '<a href="' . url('/pengguna/' . $user->id_users . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/pengguna/' . $user->id_users) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
