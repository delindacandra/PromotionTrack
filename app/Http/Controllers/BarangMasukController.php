<?php

namespace App\Http\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
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

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Form Barang Masuk',
            'list' => ['Barang Masuk', 'Form Barang Masuk']
        ];
        $barang = BarangModel::with('stok')->orderBy('nama_barang', 'asc')->get();
        return view('barang_masuk.create', ['breadcrumb' => $breadcrumb, 'barang' => $barang]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_barangMasuk' => 'required|date',
            'keterangan' => 'required|string',
            'items' => 'required|string',
        ]);

        $items = json_decode($request->items, true);
        $barangMasuk = BarangMasukModel::create([
            'tanggal_barangMasuk' => $request->tanggal_barangMasuk,
            'keterangan' => $request->keterangan,
        ]);
        foreach ($items as $item) {
            DetailBarangMasukModel::create([
                'id_barangMasuk' => $barangMasuk->id_barangMasuk,
                'id_barang' => $item['id_barang'],
                'jumlah' => $item['jumlah'],
            ]);

            // Update stok barang
            $barang = BarangModel::find($item['id_barang']);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah = (int)$barang->stok->jumlah + (int)$item['jumlah'];
                $barang->stok->save();
            }
        }

        return redirect('/barang_masuk')->with('success', 'Data berhasil disimpan.');
    }
}
