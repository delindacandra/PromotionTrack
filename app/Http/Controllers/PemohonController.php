<?php

namespace App\Http\Controllers;

use App\Models\PermintaanModel;
use App\Models\SAModel;
use App\Models\SkalaKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PemohonController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Ajukan Permintaan Barang Promosi',
            'list' => ['Beranda']
        ];
        return view('pemohon.index', ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        $user = auth()->user();
        $breadcrumb = (object)[
            'title' => 'Ajukan Permintaan',
            'list' => ['Permintaan', 'Ajukan']
        ];

        $skala = SkalaKegiatanModel::all();
        $fungsi = $user->fungsi->nama_fungsi ?? '-';
        $sales_area = $user->sales_area->nama_sa ?? '-';
        $id_fungsi = $user->id_fungsi;
        $id_sa = $user->id_sa;

        return view('permintaan.create', ['breadcrumb' => $breadcrumb, 'sales_area' => $sales_area, 'fungsi' => $fungsi, 'skala' => $skala, 'id_fungsi' => $id_fungsi, 'id_sa' => $id_sa]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_fungsi' => 'required',
            'id_sa' => 'required',
            'id_skala' => 'required',
            'jumlah' => 'required|integer|min:1',
            'keperluan' => 'required',
            'keterangan' => 'nullable',
            'dokumen' => 'nullable|file',
            'tanggal_diperlukan' => 'required|date',
        ]);

        PermintaanModel::create([
            'id_users' => Auth::id(),
            'id_fungsi' => $request->id_fungsi,
            'id_sa' => $request->id_sa,
            'id_skala' => $request->id_skala,
            'jumlah' => $request->jumlah,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'dokumen' => $request->file('dokumen') ? $request->file('dokumen')->store('dokumen', 'public') : null,
            'tanggal_diperlukan' => $request->tanggal_diperlukan,
        ]);

        return redirect('/pemohon/riwayat')->with('success', 'Permintaan berhasil diajukan');
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
        if ($request->ajax()) {
            $pemohon = PermintaanModel::where('id_users', Auth::id())
                ->with(['users.sales_area', 'users.fungsi', 'skala'])
                ->orderBy('created_at', 'desc');

            if ($request->id_sa) {
                $pemohon->where('id_sa', $request->id_sa);
            }

            return DataTables::of($pemohon)
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
}
