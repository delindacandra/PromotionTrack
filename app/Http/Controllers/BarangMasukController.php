<?php

namespace App\Http\Controllers;

use App\Models\DetailBarangMasukModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangMasukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Barang Masuk',
            'list' => ['Barang Masuk', 'List']
        ];
        return view('barang_masuk.index', ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $barangMasuks = DetailBarangMasukModel::with('barang_masuk', 'barang')->latest();

        if ($request->has('start_date') && $request->start_date) {
            $barangMasuks->whereHas('barang_masuk', function ($query) use ($request) {
                $query->whereDate('tanggal_barangMasuk', '>=', $request->start_date);
            });
        }

        if ($request->has('end_date') && $request->end_date) {
            $barangMasuks->whereHas('barang_masuk', function ($query) use ($request) {
                $query->whereDate('tanggal_barangMasuk', '<=', $request->end_date);
            });
        }

        return DataTables::of($barangMasuks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barangMasuk) {
                $btn = '<a href="' . url('/barang_masuk/' . $barangMasuk->id_barangMasuk . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang_masuk/' . $barangMasuk->id_barangMasuk) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
