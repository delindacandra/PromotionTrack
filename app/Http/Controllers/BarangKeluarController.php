<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
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
                $btn = '<a href="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar . '/detail') . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar) . '">'
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
            'title' => 'Form Barang Keluar',
            'list' => ['Barang Keluar', 'Form Barang Keluar']
        ];
        $barang = BarangModel::with('stok')->orderBy('nama_barang', 'asc')->get();
        $fungsi = FungsiModel::all();
        return view('barang_keluar.create', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'fungsi' => $fungsi]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|string',
            'id_fungsi' => 'required|integer',
            'keperluan' => 'required|string',
            'keterangan' => 'required|string',
            'tanggal_barangKeluar' => 'required|date'
        ]);

        $items = json_decode($request->items, true);
        $barangKeluar = BarangKeluarModel::create([
            'tanggal_barangKeluar' => $request->tanggal_barangKeluar,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
            'id_fungsi' => $request->id_fungsi,
        ]);

        foreach ($items as $item) {
            DetailBarangKeluarModel::create([
                'id_barangKeluar' => $barangKeluar->id_barangKeluar,
                'id_barang' => $item['id_barang'],
                'jumlah' => $item['jumlah'],
            ]);
            $barang = BarangModel::find($item['id_barang']);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah = (int)$barang->stok->jumlah - (int)$item['jumlah'];
                $barang->stok->save();
            }
        }
        return redirect('/barang_keluar')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Informasi Barang Keluar',
            'list' => ['Barang Keluar', 'Detail Barang Keluar']
        ];

        $barangKeluar = BarangKeluarModel::with('fungsi')->find($id);
        $detailBarangKeluar = DetailBarangKeluarModel::with('barang')->where('id_barangKeluar', $id)->get();
        return view('barang_keluar.show', ['breadcrumb' => $breadcrumb, 'barangKeluar' => $barangKeluar, 'detailBarangKeluar' => $detailBarangKeluar]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Edit Barang Keluar',
            'list' => ['Barang Keluar', ' Form Edit Barang Keluar']
        ];
        $barangKeluar = BarangKeluarModel::with('detailBarangKeluar.barang')->findOrFail($id);
        $barang = $barangKeluar->detailBarangKeluar;
        $fungsi = FungsiModel::all();
        return view('/barang_keluar.edit', ['breadcrumb' => $breadcrumb, 'barangKeluar' => $barangKeluar, 'barang' => $barang, 'fungsi' => $fungsi]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'items' => 'required|string',
            'id_fungsi' => 'required|integer',
            'keperluan' => 'required|string',
            'keterangan' => 'required|string',
            'tanggal_barangKeluar' => 'required|date'
        ]);
        $items = json_decode($request->items, true);

        $barangKeluar = BarangKeluarModel::findOrFail($id);
        $barangKeluar->update([
            'tanggal_barangKeluar' => $request->tanggal_barangKeluar,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
            'id_fungsi' => $request->id_fungsi,
        ]);

        $detailBarangKeluar = DetailBarangKeluarModel::where('id_barangKeluar', $id)->get();

        foreach ($detailBarangKeluar as $oldItem) {
            $barang = BarangModel::find($oldItem->id_barang);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah += $oldItem->jumlah;
                $barang->stok->save();
            }
        }

        DetailBarangKeluarModel::where('id_barangKeluar', $id)->delete();

        foreach ($items as $item) {
            DetailBarangKeluarModel::create([
                'id_barangKeluar' => $barangKeluar->id_barangKeluar,
                'id_barang' => $item['id_barang'],
                'jumlah' => $item['jumlah'],
            ]);
            $barang = BarangModel::find($item['id_barang']);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah -= $item['jumlah'];
                $barang->stok->save();
            }
        }
        return redirect('/barang_keluar')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $check = BarangKeluarModel::find($id);
        if (!$check) {
            return redirect('/barang_keluar')->with('error', 'Data tidak ditemukan.');
        }
        try {
            // Stok akan ditambah data pembaruan
            $items = DetailBarangKeluarModel::where('id_barangKeluar', $id)->get();

            foreach ($items as $iten) {
                $barang = BarangModel::find($iten->id_barang);
                if ($barang && $barang->stok) {
                    $barang->stok->jumlah += $iten->jumlah;
                    $barang->stok->save();
                }
            }
            DetailBarangKeluarModel::where('id_barangKeluar', $id)->delete();
            BarangKeluarModel::destroy($id);
            return redirect('/barang_keluar')->with('success', 'Data berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang_keluar')->with('error', 'Data gagal dihapus. Pastikan data tidak digunakan di tempat lain.');
        }
    }
}
