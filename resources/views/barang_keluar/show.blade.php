@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title"> Detail Barang Keluar</div>
        </div>
        <div class="card-body">
            @empty($barangKeluar)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <!-- Tabel list barang keluar -->
                <table class="table table-bordered  mb-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="barang-list">
                        @foreach ($detailBarangKeluar as $detail)
                            <tr data-id="{{ $detail->id_barang }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->barang->nama_barang }}</td>
                                <td>{{ $detail->jumlah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Informasi barang keluar -->
                <div class="mt-4 space-y-2 px-2 pb-2">
                    <div class="flex mb-1">
                        <span class="w-50 me-3" style="font-weight: bold">Fungsi</span>
                        <span>: {{ $barangKeluar->fungsi->nama_fungsi }}</span>
                    </div>
                    <div class="flex mb-1">
                        <span class="w-50 me-3" style="font-weight: bold">Keperluan</span>
                        <span>: {{ $barangKeluar->keperluan }}</span>
                    </div>
                    <div class="flex mb-1">
                        <span class="w-50 me-3" style="font-weight: bold">Keterangan</span>
                        <span>: {{ $barangKeluar->keterangan }}</span>
                    </div>
                    <div class="flex mb-1">
                        <span class="w-50 me-3" style="font-weight: bold">Tanggal Barang Keluar</span>
                        <span>: {{ $barangKeluar->tanggal_barangKeluar->format('d-m-Y') }}</span>
                    </div>
                </div>
            @endempty
        </div>
        <div class="card-footer">
            <a class="btn btn-default border-primary float-end" href="{{ url('barang_keluar') }}">Kembali</a>
        </div>
        </form>
    </div>
@endsection

@push('js')
@endpush
