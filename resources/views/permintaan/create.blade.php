@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="card card-primary card-outline mb-4 p-3">
            <div class="card-header py-2">
                <h5 class="card-title">Form Pengajuan Barang Promosi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('pemohon') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_users" value="{{ auth()->user()->id }}">
                    <div class="mb-3 mt-3">
                        <label for="fungsi" class="form-label">Fungsi</label>
                        <input type="text" class="form-control w-100" value="{{ $fungsi }}" readonly>
                        <input type="hidden" name="id_fungsi" value="{{ $id_fungsi }}">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="sa" class="form-label">Sales Area</label>
                        <input type="text" class="form-control w-100" value="{{ $sales_area }}" readonly>
                        <input type="hidden" name="id_sa" value="{{ $id_sa }}">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="id_skala" class="form-label">Skala Kegiatan</label>
                        <select class="form-select form-select-sm w-100" id="id_skala" name="id_skala" required>
                            <option value="">- Pilih Skala -</option>
                            @foreach ($skala as $i)
                                <option value="{{ $i->id_skala }}">{{ $i->skala_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control w-100" id="jumlah" name="jumlah" required />
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <input type="text" class="form-control w-100" id="keperluan" name="keperluan" required />
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control w-100" id="keterangan" name="keterangan" required />
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="dokumen" class="form-label">Dokumen Pendukung</label>
                        <input type="file" class="form-control w-100" id="dokumen" name="dokumen" required />
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_diperlukan" class="form-label">Tanggal Diperlukan</label>
                        <input type="date" class="form-control w-100" id="tanggal_diperlukan" name="tanggal_diperlukan"
                            required />
                    </div>
                    <div class="mt-4 d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Submit
                        </button>
                        <a class="btn btn-outline-primary" href="{{ url('beranda') }}">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script></script>
@endpush
