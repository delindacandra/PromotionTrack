@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Input data barang baru</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/barang/' . $barang->id_barang) }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf {!! method_field('PUT') !!}
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                        value="{{ old('nama_barang', $barang->nama_barang) }}">
                </div>
                <div class="col-9">
                    <label for="vendor" class="form-label">Vendor</label>
                    <select class="form-control" id="vendor" name="vendor">
                        <option value="">- Pilih Vendor -</option>
                        @foreach ($vendor as $i)
                            <option value="{{ $i->id_vendor }}">{{ $i->nama_vendor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <div class="col-9">
                        @if ($barang->gambar)
                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang"
                                style="max-width: 150px;">
                            <br>
                        @endif
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" min="0" name="jumlah"
                        value="{{ old('jumlah', $barang->stok->jumlah ?? 0) }}">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-default border-primary" href="{{ url('barang') }}">Kembali</a>
                </div>
            </form>
        </div>

    </div>
@endsection

@push('js')
@endpush
