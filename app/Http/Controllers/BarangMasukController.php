<?php

namespace App\Http\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\DetailBarangMasukModel;
use App\Models\StokModel;
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
        $barangMasuks = DetailBarangMasukModel::with('barang_masuk', 'barang')->orderByDesc('id_barangMasuk')->get();

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

            $barang = BarangModel::find($item['id_barang']);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah = (int)$barang->stok->jumlah + (int)$item['jumlah'];
                $barang->stok->save();
            }
        }

        return redirect('/barang_masuk')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Edit Barang Masuk',
            'list' => ['Barang Masuk', 'Edit Barang Masuk']
        ];
        $barangMasuk = BarangMasukModel::with('detailBarangMasuk.barang')->findOrFail($id);
        $barang = $barangMasuk->detailBarangMasuk;
        return view('barang_masuk.edit', ['breadcrumb' => $breadcrumb, 'barangMasuk' => $barangMasuk, 'barang' => $barang]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_barangMasuk' => 'required|date',
            'keterangan' => 'required|string',
            'items' => 'required|string',
        ]);

        $items = json_decode($request->items, true);

        $barangMasuk = BarangMasukModel::findOrFail($id);
        $barangMasuk->update([
            'tanggal_barangMasuk' => $request->tanggal_barangMasuk,
            'keterangan' => $request->keterangan,
        ]);

        $detailBarangMasuk = DetailBarangMasukModel::where('id_barangMasuk', $id)->get();

        foreach ($detailBarangMasuk as $oldDetail) {
            $barang = BarangModel::find($oldDetail->id_barang);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah -= $oldDetail->jumlah;
                $barang->stok->save();
            }
        }

        DetailBarangMasukModel::where('id_barangMasuk', $id)->delete();

        foreach ($items as $item) {
            DetailBarangMasukModel::create([
                'id_barangMasuk' => $barangMasuk->id_barangMasuk,
                'id_barang' => $item['id_barang'],
                'jumlah' => $item['jumlah'],
            ]);

            $barang = BarangModel::find($item['id_barang']);
            if ($barang && $barang->stok) {
                $barang->stok->jumlah += $item['jumlah'];
                $barang->stok->save();
            }
        }

        return redirect('/barang_masuk')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $check = BarangMasukModel::find($id);
        if (!$check) {
            return redirect('/barang_masuk')->with('error', 'Data tidak ditemukan.');
        }
        try {
            // Stok akan dikurangi data pembaruan
            $details = DetailBarangMasukModel::where('id_barangMasuk', $id)->get();

            foreach ($details as $detail) {
                $barang = BarangModel::find($detail->id_barang);
                if ($barang && $barang->stok) {
                    $barang->stok->jumlah -= $detail->jumlah;
                    $barang->stok->save();
                }
            }
            DetailBarangMasukModel::where('id_barangMasuk', $id)->delete();
            BarangMasukModel::destroy($id);
            return redirect('/barang_masuk')->with('success', 'Data berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang_masuk')->with('error', 'Data gagal dihapus. Pastikan data tidak digunakan di tempat lain.');
        }
    }
}
