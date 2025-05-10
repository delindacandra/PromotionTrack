<?php

namespace App\Http\Controllers;

use App\Models\FungsiModel;
use App\Models\LevelModel;
use App\Models\SAModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class KelolaPenggunaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Kelola Pengguna',
            'list' => ['Kelola Pengguna', 'List']
        ];
        return view('pengguna.index', ['breadcrumb' => $breadcrumb]);
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
                $btn = '<a href="' . url('/pengguna/' . $user->id_users . '/detail') . '" class="btn btn-info btn-sm me-1">Detail</a>';
                $btn .= '<a href="' . url('/pengguna/' . $user->id_users . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/pengguna/' . $user->id_users) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Kelola Pengguna',
            'list' => ['Kelola Pengguna', 'Tambah Pengguna']
        ];
        $level = LevelModel::all();
        $fungsi = FungsiModel::orderBy('nama_fungsi', 'asc')->get();
        $sa = SAModel::all();
        return view('pengguna.create', ['breadcrumb' => $breadcrumb, 'level' => $level, 'fungsi' => $fungsi, 'sa' => $sa]);
    }

    public function store(Request $request)
    {
        $request->validate(([
            'level' => 'required',
            'sa' => 'required',
            'fungsi' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]));

        UsersModel::create([
            'id_level' => $request->level,
            'id_sa' => $request->sa,
            'id_fungsi' => $request->fungsi,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/pengguna')->with('success', 'Data pengguna berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Kelola Pengguna',
            'list' => ['Kelola Pengguna', 'Detail Pengguna']
        ];
        $users = UsersModel::with('level', 'fungsi', 'sales_area')->findOrFail($id);
        return view('pengguna.show', ['breadcrumb' => $breadcrumb, 'users' => $users]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Kelola Pengguna',
            'list' => ['Kelola Pengguna', 'Edit Pengguna']
        ];
        $users = UsersModel::with('level', 'fungsi', 'sales_area')->findOrFail($id);
        $level = LevelModel::all();
        $fungsi = FungsiModel::orderBy('nama_fungsi', 'asc')->get();
        $sa = SAModel::all();
        return view('pengguna.edit', ['breadcrumb' => $breadcrumb, 'users' => $users, 'level' => $level, 'fungsi' => $fungsi, 'sa' => $sa]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(([
            'level' => 'required',
            'sa' => 'required',
            'fungsi' => 'required',
            'email' => 'required|email|unique:users,email,' . $id . ',id_users',
            'password' => 'nullable|min:6',
        ]));

        $users = UsersModel::findOrFail($id);
        $users->id_level = $request->level;
        $users->id_sa = $request->sa;
        $users->id_fungsi = $request->fungsi;
        $users->email = $request->email;

        if ($request->password) {
            $users->password = Hash::make($request->password);
        }

        $users->save();

        return redirect('/pengguna')->with('success', 'Data pengguna berhasil diubah');
    }

    public function destroy(string $id)
    {
        $user = UsersModel::find($id);
        if (!$user) {
            return redirect('/pengguna')->with('error', 'Data pengguna tidak ditemukan');
        }

        try {
            $user->delete();
            return redirect('/pengguna')->with('success', 'Data pengguna berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/pengguna')->with('error', 'Data pengguna gagal dihapus karena masih digunakan di tabel lain');
        }
    }
}
