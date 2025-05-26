<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data Barang',
            'list' => ['Daftar Barang']
        ];
        return view('barang.index', ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $barangs = BarangModel::with('stok', 'vendor')->orderBy('nama_barang', 'asc');

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
                $btn = '';
                if (userHasAccess('barang', 'show')) {
                    $btn  .= '<a href="' . url('/barang/' . $barang->id_barang) . '" class="btn btn-info btn-sm me-1">Detail</a>';
                }
                if (userHasAccess('barang', 'edit')) {
                    $btn .= '<a href="' . url('/barang/' . $barang->id_barang . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                }
                if (userHasAccess('barang', 'destroy')) {
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->id_barang) . '">'
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
        $vendor = VendorModel::all();

        $breadcrumb = (object)[
            'title' => 'Tambah Barang Baru',
            'list' => ['Data Barang', 'Tambah']
        ];

        return view('barang.create', ['breadcrumb' => $breadcrumb, 'vendor' => $vendor]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|unique:data_barang,nama_barang',
            'vendor' => 'nullable|string',
            'vendor_baru' => 'nullable|string',
            'gambar' => 'nullable|mimes:png,jpg,jpeg',
            'jumlah' => 'required|integer',
        ]);

        $idVendor = $request->vendor;
        if ($idVendor === '__new') {
            $vendorBaru = VendorModel::create([
                'nama_vendor' => $request->vendor_baru
            ]);
            $idVendor = $vendorBaru->id_vendor;
        }

        $path = null;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $fileName = date('Y-m-d') . '-' . $image->getClientOriginalName();
            $path = 'barang/' . $fileName;
            Storage::disk('public')->put($path, file_get_contents($image));
        }
        $barang = BarangModel::create([
            'nama_barang' => $request->nama_barang,
            'id_vendor' => $idVendor,
            'gambar' => $path,
        ]);

        StokModel::create([
            'id_barang' => $barang->id_barang,
            'jumlah' => $request->jumlah,
        ]);
        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $barang = BarangModel::with('stok', 'vendor')->find($id);

        $breadcrumb = (object) [
            'title' => 'Informasi Data Barang',
            'list' => ['Data Barang', 'Info']
        ];

        return view('barang.show', ['breadcrumb' => $breadcrumb, 'barang' => $barang]);
    }

    public function edit(string $id)
    {
        $barang = BarangModel::find($id);
        $vendor = VendorModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Barang',
            'list' => ['Data Barang', 'Edit']
        ];

        return view('barang.edit', ['breadcrumb' => $breadcrumb, 'barang' => $barang, 'vendor' => $vendor]);
    }

    public function update(Request $request, string $id_barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|unique:data_barang,nama_barang,' . $id_barang . ',id_barang',
            'vendor' => 'nullable|string',
            'vendor_baru' => 'nullable|string',
            'jumlah' => 'required|integer',
            'gambar' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        $barang = BarangModel::find($id_barang);

        $idVendor = $request->vendor;
        if ($idVendor === '__new') {
            $vendorBaru = VendorModel::create([
                'nama_vendor' => $request->vendor_baru
            ]);
            $idVendor = $vendorBaru->id_vendor;
        }

        $path = null;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $fileName = date('Y-m-d') . '-' . $image->getClientOriginalName();
            $path = 'barang/' . $fileName;
            Storage::disk('public')->put($path, file_get_contents($image));

            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $barang->gambar = $path;
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'id_vendor' => $idVendor,
            'gambar' => $barang->gambar ?? null,
        ]);

        StokModel::updateOrCreate(
            ['id_barang' => $id_barang],
            ['jumlah' => $request->jumlah]
        );

        return redirect('/barang')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = BarangModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }
        try {
            if ($check->gambar) {
                Storage::disk('public')->delete($check->gambar);
            }
            StokModel::where('id_barang', $id)->delete();
            BarangModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
