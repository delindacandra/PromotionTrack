<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data Barang',
            'list' => ['Data Barang', 'List']
        ];
        return view('barang.index', ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $barangs = BarangModel::with('stok')->orderBy('nama_barang', 'asc');

        if ($request->id_barang) {
            $barangs->where('id_barang', $request->id_barang);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->addColumn('stok', function ($barang) {
                return $barang->stok ? $barang->stok->jumlah : 'N/A';
            })
            ->addColumn('gambar', function ($barang) {
                return basename($barang->gambar);
            })
            ->addColumn('aksi', function ($barang) {
                $btn  = '<a href="' . url('/barang/' . $barang->id_barang . '/detail') . '" class="btn btn-info btn-sm me-1">Detail</a>';
                $btn .= '<a href="' . url('/barang/' . $barang->id_barang . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->id_barang) . '">'
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
            'title' => 'Barang Baru',
            'list' => ['Data Barang', 'Form Barang Baru']
        ];

        return view('barang.create', ['breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|unique:data_barang,nama_barang',
            'vendor' => 'nullable|string',
            'gambar' => 'nullable|mimes:png,jpg,jpeg',
            'jumlah' => 'required|integer',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $fileName = date('Y-m-d') . '-' . $image->getClientOriginalName();
            $path = 'barang/' . $fileName;
            Storage::disk('public')->put($path, file_get_contents($image));
        }
        $barang = BarangModel::create([
            'nama_barang' => $request->nama_barang,
            'vendor' => $request->vendor,
            'gambar' => $path,
        ]);

        StokModel::create([
            'id_barang' => $barang->id_barang,
            'jumlah' => $request->jumlah,
        ]);
        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');
    }
}
