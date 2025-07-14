@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Detail Data Barang</div>
        </div>
        <div class="card-body">
            @empty($barang)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>Nama barang</th>
                        <td>{{ $barang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th>Vendor</th>
                        <td>{{ $barang->vendor ? $barang->vendor->nama_vendor : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Stok barang</th>
                        <td>{{ $barang->stok ? $barang->stok->jumlah : '0' }}</td>
                    </tr>
                    <tr>
                        <th>Gambar barang</th>
                        <td>
                            @if ($barang->gambar)
                                <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar barang" class="img-fluid"
                                    width="150px">
                            @else
                                <span class="text-danger">Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Perubahan stok terakhir</th>
                        <td>{{ $barang->stok && $barang->stok->updated_at
                            ? $barang->stok->updated_at->format('d-m-Y')
                            : 'Belum ada perubahan' }}
                        </td>
                    </tr>
                </table>
            @endempty
        </div>
        <div class="me-3 mb-3">
            <a class="btn btn-outline-primary float-end" href="{{ url('barang') }}">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
        </form>
    </div>
@endsection

@push('js')
@endpush
