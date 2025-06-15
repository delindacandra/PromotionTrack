@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Kolom Tabel (kiri) -->
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="card-header py-2">
                            <h5 class="text-center fw-bold mb-0">Daftar Barang</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-3">
                                <label class="col-2 control-label col-form-label">Cari</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="searchBar"
                                        placeholder="Masukkan nama barang">
                                </div>
                            </div>
                            <div style="max-height: 500px; overflow-y: auto;">
                                <table class="table table-bordered" id="table-barang">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $barang)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $barang->nama_barang }}</td>
                                                <td>{{ optional($barang->stok)->jumlah ?? 0 }}</td>
                                                <td><img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar"
                                                        width="50px"></td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary btn-sm tambah-barang"
                                                        data-id="{{ $barang->id_barang }}"
                                                        data-nama="{{ $barang->nama_barang }}"
                                                        data-stok="{{ $barang->stok->jumlah ?? 0 }}">
                                                        <i class="bi bi-arrow-right-square"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Form (kanan) -->
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="card-header py-2">
                            <h5 class="text-center fw-bold mb-0">Form Permintaan Barang</h5>
                        </div>
                        <div class="card-body">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p><strong>Sales Area:</strong> {{ $permintaan->users->sales_area->nama_sa ?? '-' }}</p>
                                    <p><strong>Fungsi:</strong> {{ $permintaan->users->fungsi->nama_fungsi ?? '-' }}</p>
                                    <p><strong>Email:</strong> {{ $permintaan->users->email ?? '-' }}</p>
                                    <p><strong>Skala Kegiatan:</strong> {{ $permintaan->skala->skala_kegiatan }}</p>
                                    <p><strong>Jumlah:</strong> {{ $permintaan->jumlah }}</p>
                                    <p><strong>Keperluan:</strong> {{ $permintaan->keperluan }}</p>
                                    <p><strong>Keterangan:</strong> {{ $permintaan->keterangan }}</p>
                                    <p><strong>Tanggal Diperlukan:</strong>
                                        {{ $permintaan->tanggal_diperlukan->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <form id="form_permintaan" method="POST" action="{{ url('barang_keluar') }}">
                                @csrf
                                <table class="table table-bordered" id="table-permintaan">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="barang-list">
                                    </tbody>
                                </table>
                                <input type="hidden" name="id_permintaan" value="{{ $permintaan->id_permintaan }}">
                                <input type="hidden" name="items" id="items">
                                <div class="mb-3 mt-3">
                                    <div class="mb-3">
                                        <label for="tanggal_barangKeluar" class="form-label">Tanggal Barang Keluar</label>
                                        <input type="date" class="form-control" id="tanggal_barangKeluar"
                                            name="tanggal_barangKeluar" />
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-default border-primary"
                                            href="{{ url('permintaan') }}">Kembali</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            // SearchBar
            $('#searchBar').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $("#table-barang tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Menambahkan barang ke tabel barang keluar
            $(document).on('click', '.tambah-barang', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var stok = $(this).data('stok');
                var jumlah = $(this).data('jumlah');

                var existingRow = $('#table-permintaan tbody tr[data-id="' + id + '"]');
                if (existingRow.length > 0) {
                    var inputJumlah = existingRow.find('input.jumlah');
                    var newJumlah = parseInt(inputJumlah.val()) + 1;
                    inputJumlah.val(newJumlah);
                } else {
                    $('#table-permintaan tbody').append(
                        `<tr data-id="${id}">
                    <td>${$('#table-permintaan tbody tr').length + 1}</td>
                    <td class="nama">${nama}</td>
                    <td class="stok">${stok}</td>
                    <td><input type="number" class="form-control jumlah" value="1" min="1"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="bi bi-trash"></i></button></td></tr>`
                    );
                }
                updateHiddenItems();
            });

            // Update data saat jumlah diubah
            $('#table-permintaan').on('input', 'input.jumlah', function() {
                updateHiddenItems();
            });

            function updateHiddenItems() {
                var items = [];
                $('#table-permintaan tbody tr').each(function() {
                    var id = $(this).data('id');
                    var jumlah = $(this).find('input.jumlah').val();
                    items.push({
                        id_barang: id,
                        jumlah: jumlah
                    });
                });
                $('#items').val(JSON.stringify(items));
            }

            // Mengupdate nomor urut setiap kali baris dihapus
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
                updateHiddenItems();
            });

            function updateRowNumbers() {
                $('#table-permintaan tbody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            $('#form_permintaan').on('submit', function(e) {
                let valid = true;
                $('#table-permintaan tbody tr').each(function() {
                    let stok = parseInt($(this).find('.stok').text());
                    let jumlah = parseInt($(this).find('input.jumlah').val());

                    if (jumlah > stok) {
                        alert('Terdapat jumlah barang yang melebihi stok!');
                        valid = false;
                        return false;
                    }
                });

                if ($('#table-permintaan tbody tr').length === 0) {
                    alert('Silakan pilih setidaknya satu barang.');
                    e.preventDefault();
                    return;
                }
            });

        });
    </script>
@endpush
