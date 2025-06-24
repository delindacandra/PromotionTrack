<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\DetailBarangKeluarModel;
use App\Models\FungsiModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Barang Keluar',
            'list' => ['Daftar Barang Keluar']
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
        return DataTables::of($barangKeluar)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barangKeluar) {
                $btn = '';
                if (userHasAccess('barang_keluar', 'cetak')) {
                    $btn = '<a href="' . url('/barang_keluar/cetak/' . $barangKeluar->id_barangKeluar) . '" class="btn btn-success btn-sm">Cetak</a> ';
                }
                if (userHasAccess('barang_keluar', 'show')) {
                    $btn .= '<a href="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar . '/detail') . '" class="btn btn-info btn-sm">Detail</a> ';
                }
                if (userHasAccess('barang_keluar', 'edit')) {
                    $btn .= '<a href="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                }
                if (userHasAccess('barang_keluar', 'destroy')) {
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang_keluar/' . $barangKeluar->id_barangKeluar) . '">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                }
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Barang Keluar',
            'list' => ['Barang Keluar', 'Tambah']
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

        $name = session('name');
        $email = Auth::check() ? Auth::user()->email : 'guest@example.com';
        $info_email = explode('@', $email)[0];
        $createdby = "{$name}|{$info_email}";

        $barangKeluar = BarangKeluarModel::create([
            'tanggal_barangKeluar' => $request->tanggal_barangKeluar,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
            'id_fungsi' => $request->id_fungsi,
            'createdby' => $createdby,
        ]);

        foreach ($items as $item) {
            DetailBarangKeluarModel::create([
                'id_barangKeluar' => $barangKeluar->id_barangKeluar,
                'id_barang' => $item['id_barang'],
                'jumlah' => $item['jumlah'],
                'createdby' => $createdby,
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
            'list' => ['Barang Keluar', 'Info']
        ];

        $barangKeluar = BarangKeluarModel::with('fungsi')->find($id);
        $detailBarangKeluar = DetailBarangKeluarModel::with('barang')->where('id_barangKeluar', $id)->get();
        return view('barang_keluar.show', ['breadcrumb' => $breadcrumb, 'barangKeluar' => $barangKeluar, 'detailBarangKeluar' => $detailBarangKeluar]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Edit Barang Keluar',
            'list' => ['Barang Keluar', 'Edit']
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

        $name = session('name');
        $email = Auth::check() ? Auth::user()->email : 'guest@example.com';
        $info_email = explode('@', $email)[0];
        $editedby = "{$name}|{$info_email}";

        $barangKeluar = BarangKeluarModel::findOrFail($id);
        $barangKeluar->update([
            'tanggal_barangKeluar' => $request->tanggal_barangKeluar,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
            'id_fungsi' => $request->id_fungsi,
            'editedby' => $editedby,
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
                'editedby' => $editedby,
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

    public function cetak($id)
    {
        $barangKeluar = BarangKeluarModel::with([
            'detailBarangKeluar',
            'fungsi',
            'permintaan.users.sales_area'
        ])->findOrFail($id);

        $pdf = PDF::loadView('barang_keluar.tanda_terima', compact('barangKeluar'));

        $filename = 'Tanda_Terima_' . Carbon::parse($barangKeluar->tanggal_barangKeluar)->format('d-m-Y') . '.pdf';

        return $pdf->download($filename);
        return view('barang_keluar.tanda_terima', compact('barangKeluar'));
    }
}
