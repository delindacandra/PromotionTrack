@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Form Input Barang Baru</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('barang') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required />
                    @error('nama_barang')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-9">
                    <label for="vendor" class="form-label">Vendor</label>
                    <select class="form-select" id="vendor" name="vendor">
                        <option value="">- Pilih Vendor -</option>
                        @foreach ($vendor as $i)
                            <option value="{{ $i->id_vendor }}">{{ $i->nama_vendor }}</option>
                        @endforeach
                        <option value="__new"> + Tambah Vendor Baru</option>
                    </select>
                    <input type="text" class="form-control mt-2" id="vendor_baru" name="vendor_baru"
                        placeholder="Nama Vendor Baru" style="display: none;" />
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" />
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" min="0" name="jumlah" required />
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
