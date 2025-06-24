@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Form Edit Data Barang</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/barang/' . $barang->id_barang) }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}

                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            value="{{ old('nama_barang', $barang->nama_barang) }}">
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="vendor" class="form-label">Vendor</label>
                        <select class="form-control" id="vendor" name="vendor">
                            <option value="">- Pilih Vendor -</option>
                            @foreach ($vendor as $i)
                                <option value="{{ $i->id_vendor }}"
                                    {{ old('vendor', $barang->id_vendor) == $i->id_vendor ? 'selected' : '' }}>
                                    {{ $i->nama_vendor }}
                                </option>
                            @endforeach
                            <option value="__new">+ Tambah Vendor Baru</option>
                        </select>
                        <input type="text" class="form-control mt-2" id="vendor_baru" name="vendor_baru"
                            placeholder="Nama Vendor Baru" style="display: none;" />
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if ($barang->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang"
                                    style="max-width: 150px;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" min="0" name="jumlah"
                            value="{{ old('jumlah', $barang->stok->jumlah ?? 0) }}">
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Submit
                    </button>
                    <a class="btn btn-outline-primary" href="{{ url('barang') }}">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.getElementById('vendor').addEventListener('change', function() {
            const newVendorInput = document.getElementById('vendor_baru');
            if (this.value === '__new') {
                newVendorInput.style.display = 'block';
            } else {
                newVendorInput.style.display = 'none';
                newVendorInput.value = '';
            }
        });
    </script>
@endpush
