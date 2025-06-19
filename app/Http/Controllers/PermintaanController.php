<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\DetailBarangKeluarModel;
use App\Models\PermintaanModel;
use App\Models\SAModel;
use App\Models\SkalaKegiatanModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermintaanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Permintaan Barang',
            'list' => [' Daftar Permintaan']
        ];
        $users = UsersModel::with('fungsi')->get();
        $skala = SkalaKegiatanModel::all();
        return view('permintaan.index', ['breadcrumb' => $breadcrumb, 'skala' => $skala, 'users' => $users]);
    }

    public function list(Request $request)
    {
        $permintaan = PermintaanModel::with('users.fungsi', 'skala')
            ->where('status', '!=', 'selesai')
            ->orderBy('created_at', 'desc');

        if ($request->filter_skala) {
            $permintaan->where('id_skala', $request->filter_skala);
        }

        return DataTables::of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '';
                if (userHasAccess('permintaan', 'show')) {
                    $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/detail') . '" class="btn btn-info btn-sm me-1">Detail</a>';
                }
                if ($row->status === 'selesai') {
                    $btn .= '<button class="btn btn-success btn-sm me-1" disabled>Selesai</button>';
                } elseif (userHasAccess('permintaan', 'proses')) {
                    $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/proses') . '" class="btn btn-warning btn-sm me-1">Proses</a>';
                }
                if (userHasAccess('permintaan', 'destroy')) {
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/permintaan/' . $row->id_permintaan) . '">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                }

                return $btn;
            })
            ->editColumn('dokumen', function ($row) {
                return $row->dokumen
                    ? '<a href="' . asset('storage/' . $row->dokumen) . '" target="_blank">Lihat</a>'
                    : '-';
            })
            ->rawColumns(['aksi', 'dokumen'])
            ->make(true);
    }


    public function show($id)
    {
        $permintaan = PermintaanModel::with('users', 'skala')->findOrFail($id);
        $breadcrumb = (object)[
            'title' => 'Permintaan Barang',
            'list' => ['Permintaan', 'Info']
        ];
        return view('permintaan.show', ['breadcrumb' => $breadcrumb, 'permintaan' => $permintaan]);
    }

    public function proses($id)
    {
        $barang = BarangModel::all();
        $permintaan = PermintaanModel::with('users', 'skala')->findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Permintaan Barang',
            'list' => ['Permintaan', 'Proses']
        ];
        return view('permintaan.proses', ['breadcrumb' => $breadcrumb, 'permintaan' => $permintaan, 'barang' => $barang]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|string',
            'tanggal_barangKeluar' => 'required|date',
            'id_permintaan' => 'required|exists:permintaan,id_permintaan',
        ]);
        $items = json_decode($request->items, true);

        $name = session('name');
        $email = Auth::check() ? Auth::user()->email : 'guest@example.com';
        $info_email = explode('@', $email)[0];
        $createdby = "{$name}|{$info_email}";

        $permintaan = PermintaanModel::with('users.fungsi', 'skala')->findOrFail($request->id_permintaan);
        $barangKeluar = BarangKeluarModel::create([
            'tanggal_barangKeluar' => $request->tanggal_barangKeluar,
            'keterangan' => $permintaan->keterangan,
            'keperluan' => $permintaan->keperluan,
            'id_fungsi' => $permintaan->users->fungsi->id_fungsi,
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

        $permintaan->status = 'selesai';
        $permintaan->save();

        return redirect('/barang_keluar')->with('success', 'Permintaan berhasil dibuat.');
    }

    public function riwayat()
    {
        $breadcrumb = (object)[
            'title' => 'Riwayat Permintaan',
            'list' => ['Riwayat']
        ];
        $sales_area = SAModel::all();
        return view('permintaan.riwayat', ['breadcrumb' => $breadcrumb, 'sales_area' => $sales_area]);
    }

    public function riwayat_list(Request $request)
    {
        $permintaan = PermintaanModel::with('users.fungsi', 'users.sales_area', 'skala')->orderBy('created_at', 'desc');

        if ($request->id_sa) {
            $permintaan->where('id_sa', $request->id_sa);
        }

        return DataTables::of($permintaan)
            ->addIndexColumn()
            ->addColumn('skala_kegiatan', function ($row) {
                return $row->skala->skala_kegiatan ?? '-';
            })
            ->editColumn('dokumen', function ($row) {
                return $row->dokumen
                    ? '<a href="' . asset('storage/' . $row->dokumen) . '" target="_blank">Lihat</a>'
                    : '-';
            })
            ->editColumn('status', function ($row) {
                $warna = match (strtolower($row->status)) {
                    'diproses' => 'warning',
                    'ditolak' => 'danger',
                    'selesai' => 'success',
                    default => 'primary',
                };

                return '<span class="badge bg-' . $warna . ' text-uppercase px-2 py-1">' . ucfirst($row->status ?? 'Menunggu') . '</span>';
            })
            ->rawColumns(['dokumen', 'status'])
            ->make(true);
    }
}
