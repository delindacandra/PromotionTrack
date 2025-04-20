@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Input data barang baru</div>
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
                        <td>{{ $barang->vendor }}</td>
                    </tr>
                    <tr>
                        <th>Stok barang</th>
                        <td>{{ $barang->stok->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Gambar barang</th>
                        <td>{{ $barang->gambar }}</td>
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
        <div class="card-footer">
            <a class="btn btn-default border-primary float-end" href="{{ url('barang') }}">Kembali</a>
        </div>
        </form>
    </div>
@endsection

@push('js')
@endpush
