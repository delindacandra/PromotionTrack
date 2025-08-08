<?php

namespace App\Http\Controllers;

use App\Mail\TolakPermintaanMail;
use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\DetailBarangKeluarModel;
use App\Models\PermintaanModel;
use App\Models\SAModel;
use App\Models\SkalaKegiatanModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            ->whereNotIn('status', ['selesai', 'ditolak'])
            ->when(auth()->user()->level->nama_level === 'Admin', function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('id_skala', 2)
                        ->orWhere('status', 'diproses');
                });
            })
            ->orderBy('created_at', 'desc');

        if ($request->filter_skala) {
            $permintaan->where('id_skala', $request->filter_skala);
        }

        return DataTables::of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '';

                if ($row->status === 'diajukan') {
                    if ($row->id_skala == 2) {
                        if (userHasAccess('permintaan', 'proses')) {
                            $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/proses') . '" class="btn btn-warning btn-sm me-1">Proses</a>';
                        }
                    } else {
                        $btn .= '<button class="btn btn-success btn-sm me-1 btn-setuju" data-id="' . $row->id_permintaan . '">Setuju</button>';
                        $btn .= '<button class="btn btn-danger btn-sm me-1 btn-tolak" data-id="' . $row->id_permintaan . '">Tolak</button>';
                    }
                } elseif ($row->status === 'diproses') {
                    if (userHasAccess('permintaan', 'proses')) {
                        $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/proses') . '" class="btn btn-warning btn-sm me-1">Proses</a>';
                    }
                } elseif ($row->status === 'selesai') {
                    $btn .= '<button class="btn btn-success btn-sm me-1" disabled>Selesai</button>';
                }

                if (userHasAccess('permintaan', 'show')) {
                    $btn .= '<a href="' . url('/permintaan/' . $row->id_permintaan . '/detail') . '" class="btn btn-info btn-sm me-1">Detail</a>';
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
        $barang = BarangModel::with('stok')->whereNull('deletedby')->orderBy('nama_barang', 'asc')->get();
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
            'tanggal_barang_keluar' => 'required|date',
            'id_permintaan' => 'required|exists:permintaan,id_permintaan',
        ]);
        $items = json_decode($request->items, true);

        // Validasi stok sebelum menyimpan data
        foreach ($items as $item) {
            $barang = BarangModel::find($item['id_barang']);
            if (!$barang || !$barang->stok || $barang->stok->jumlah < $item['jumlah']) {
                return redirect()->back()->withInput()->withErrors([
                    'items' => 'Stok barang tidak mencukupi untuk barang: ' . ($barang->nama_barang ?? 'Tidak Diketahui')
                ]);
            }
        }
        
        $name = session('name');
        $email = Auth::check() ? Auth::user()->email : 'guest@example.com';
        $info_email = explode('@', $email)[0];
        $createdby = "{$name}|{$info_email}";

        $permintaan = PermintaanModel::with('users.fungsi', 'users.sales_area', 'skala')->findOrFail($request->id_permintaan);
        $barangKeluar = BarangKeluarModel::create([
            'tanggal_barang_keluar' => $request->tanggal_barang_keluar,
            'keterangan' => $permintaan->keterangan,
            'keperluan' => $permintaan->keperluan,
            'id_fungsi' => $permintaan->users->fungsi->id_fungsi,
            'id_sa' => $permintaan->users->sales_area->id_sa,
            'createdby' => $createdby,
        ]);

        foreach ($items as $item) {
            DetailBarangKeluarModel::create([
                'id_barang_keluar' => $barangKeluar->id_barang_keluar,
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
        $permintaan = PermintaanModel::with('users.fungsi', 'users.sales_area', 'skala')
            ->orderBy('created_at', 'desc');

        if ($request->filter_sa) {
            $permintaan->whereHas('users', function ($query) use ($request) {
                $query->where('id_sa', $request->filter_sa);
            });
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

    public function setuju($id)
    {
        $permintaan = PermintaanModel::findOrFail($id);
        if ($permintaan->status === 'diajukan') {
            $permintaan->status = 'diproses';
            $permintaan->save();
            return response()->json(['success' => true, 'message' => 'Permintaan disetujui.']);
        }
        return response()->json(['success' => false, 'message' => 'Aksi tidak valid.']);
    }

    public function tolak(Request $request, $id)
    {
        $permintaan = PermintaanModel::with('users.fungsi', 'users.sales_area')->findOrFail($id);
        $permintaan->status = 'ditolak';
        $permintaan->save();

        if ($permintaan->users && $permintaan->users->email) {
            $fungsi = $permintaan->users->fungsi->nama_fungsi ?? 'Fungsi Tidak Diketahui';
            $SA = $permintaan->users->sales_area->nama_sa ?? 'Wilayah Tidak Diketahui';

            Mail::to($permintaan->users->email)->send(new TolakPermintaanMail($fungsi, $SA));
        }

        return response()->json(['message' => 'Permintaan ditolak dan email telah dikirim.']);
    }
}
