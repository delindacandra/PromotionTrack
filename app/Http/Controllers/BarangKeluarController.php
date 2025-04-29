<?php

namespace App\Http\Controllers;

use App\Models\DetailBarangKeluarModel;
use App\Models\FungsiModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Barang Keluar',
            'list' => ['Barang Keluar', 'List']
        ];
        return view('barang_keluar.index', ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $barangKeluar = DetailBarangKeluarModel::with('barang_keluar', 'barang')->orderByDesc('id_barangKeluar');

        if ($request->has('start_date') && $request->start_date) {
            $barangKeluar->whereHas('barang_keluar', function ($query) use ($request) {
                $query->whereDate('tanggal_barangKeluar', '>=', $request->start_date);
            });
        }

        if ($request->has('end_date') && $request->end_date) {
            $barangKeluar->whereHas('barang_keluar', function ($query) use ($request) {
                $query->whereDate('tanggal_barangKeluar', '<=', $request->end_date);
            });
        }
        return DataTables::of($barangKeluar->get())
            ->addIndexColumn()
            ->addColumn('aksi', function ($barangKeluar) {
                $btn = '<a href="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
