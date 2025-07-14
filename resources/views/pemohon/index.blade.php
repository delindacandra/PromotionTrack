@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-primary mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Tata Cara Pengajuan Permintaan</strong>
                </div>
                <div class="card-body">
                    <p>Untuk melakukan permintaan barang promosi, silakan ikuti langkah-langkah berikut:</p>
                    <ol>
                        <li>Baca informasi persyaratan dan barang yang tersedia di bawah ini.</li>
                        <li>Pastikan dokumen pendukung telah disiapkan (dalam format PDF).</li>
                        <li>Klik tombol <strong>"Ajukan Permintaan"</strong> di bagian bawah halaman ini.</li>
                        <li>Isi form pengajuan secara lengkap dan benar.</li>
                        <li>Tunggu proses verifikasi dan persetujuan dari Koordinator Gudang.</li>
                    </ol>
                </div>
            </div>

            <div class="card border-warning mb-4">
                <div class="card-header bg-warning text-dark">
                    <strong>Panduan Pengisian Form</strong>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Fungsi:</strong> Akan terisi otomatis sesuai unit kerja Anda.</li>
                        <li><strong>Sales Area:</strong> Akan terisi otomatis sesuai wilayah kerja.</li>
                        <li><strong>Skala Kegiatan:</strong> Pilih berdasarkan cakupan kegiatan:
                            <em>Skala Kecil</em> (dalam satu fungsi atau lintas divisi) atau
                            <em>Skala Besar</em> (melibatkan pihak luar).
                        </li>
                        <li><strong>Jumlah:</strong> Masukkan jumlah barang promosi yang dibutuhkan secara realistis.</li>
                        <li><strong>Keperluan:</strong> Jelaskan secara singkat tujuan penggunaan barang (misalnya:
                            “Sosialisasi program keamanan kerja”).</li>
                        <li><strong>Keterangan:</strong> Tambahkan informasi tambahan jika ada (misalnya lokasi kegiatan,
                            target audiens, dsb).</li>
                        <li><strong>Dokumen Pendukung:</strong> Wajib unggah minimal 1 dokumen (PDF). Salah satu dari surat
                            permohonan, rundown, atau proposal kegiatan.</li>
                        <li><strong>Tanggal Diperlukan:</strong> Tanggal kegiatan dimulai atau tanggal barang harus sudah
                            tersedia.</li>
                    </ul>
                    <p>Pastikan semua data diisi dengan benar sebelum menekan tombol <strong>Submit</strong>.</p>
                </div>
            </div>


            <div class="card border-secondary mb-4">
                <div class="card-header bg-secondary text-white">
                    <strong>Dokumen Pendukung</strong>
                </div>
                <div class="card-body">
                    <p>Sebelum mengisi form, siapkan minimal salah satu dari dokumen berikut:</p>
                    <ul>
                        <li>Surat permohonan resmi dari fungsi atau unit kerja</li>
                        <li>Rundown atau proposal kegiatan</li>
                        <li>Dokumen pendukung lain yang relevan (jika ada)</li>
                    </ul>
                    <p>Dokumen dapat diunggah dalam format <strong>PDF</strong>.</p>
                </div>
            </div>


            {{-- Tombol Ajukan --}}
            <div class="text-end">
                <a href="{{ url('/permintaan/create') }}" class="btn btn-success btn-lg">
                    Ajukan Permintaan
                </a>
            </div>
        </div>
    </div>
@endsection
