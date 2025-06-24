@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Detail Permintaan Barang</div>
        </div>

        <div class="card-body">
            @empty($permintaan)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>Fungsi</th>
                        <td>{{ $permintaan->users->fungsi->nama_fungsi }}</td>
                    </tr>
                    <tr>
                        <th>Sales Area</th>
                        <td>{{ $permintaan->users->sales_area->nama_sa }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $permintaan->users->email }}</td>
                    </tr>
                    <tr>
                        <th>Skala Kegiatan</th>
                        <td>{{ $permintaan->skala->skala_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Keperluan</th>
                        <td>{{ $permintaan->keperluan }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $permintaan->keterangan }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $permintaan->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Diperlukan</th>
                        <td>{{ $permintaan->tanggal_diperlukan ? $permintaan->tanggal_diperlukan->format('d-m-Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span
                                class="badge
                                @if ($permintaan->status == 'diproses') bg-warning 
                                @elseif($permintaan->status == 'ditolak') bg-danger
                                @elseif($permintaan->status == 'selesai') bg-success
                                @else bg-primary @endif
                                text-uppercase px-3 py-1">
                                {{ $permintaan->status }}
                            </span></td>
                    </tr>
                    <tr>
                        <th>Dokumen Pendukung</th>
                        <td>
                            @if ($permintaan->dokumen)
                                <a href="{{ asset('storage/' . $permintaan->dokumen) }}" target="_blank">Lihat Dokumen</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                </table>
            @endempty
        </div>

        <div class="me-3 mb-3">
            <a class="btn btn-outline-primary float-end" href="{{ url('permintaan') }}">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

    </div>
@endsection
