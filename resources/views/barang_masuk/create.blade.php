@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row gy-4">
                <!-- Kolom Tabel (kiri) -->
                <div class="col-12 col-lg-6">

                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Data Barang</div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-2 col-form-label">Cari</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="searchBar"
                                        placeholder="Masukkan nama barang">
                                </div>
                            </div>

                            <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                <table class="table table-bordered table-sm" id="table-barang">
                                    <thead class="table-light">
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
                                                <td>
                                                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar"
                                                        height="40px">
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-primary btn-sm tambah-barang"
                                                        data-id="{{ $barang->id_barang }}"
                                                        data-nama="{{ $barang->nama_barang }}"
                                                        data-stok="{{ $barang->stok->jumlah ?? 0 }}">
                                                        <i class="bi bi-plus"></i>
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
                <div class="col-12 col-lg-6">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Form Barang Masuk</div>
                        </div>
                        <div class="card-body">
                            <form id="form_barangMasuk" method="POST" action="{{ url('barang_masuk') }}">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" id="table-barangMasuk">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="barang-list"></tbody>
                                    </table>
                                </div>

                                <input type="hidden" name="items" id="items">

                                <div class="mb-3 mt-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" />
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_barangMasuk" class="form-label">Tanggal Barang Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_barangMasuk"
                                        name="tanggal_barangMasuk" />
                                </div>

                                <div class="mt-4 d-flex justify-content-start gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Submit
                                    </button>
                                    <a class="btn btn-outline-primary" href="{{ url('barang_masuk') }}">
                                        <i class="bi bi-arrow-left me-1"></i> Kembali
                                    </a>
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

            // Menambahkan barang ke tabel barang masuk
            $(document).on('click', '.tambah-barang', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var stok = $(this).data('stok');

                var existingRow = $('#table-barangMasuk tbody tr[data-id="' + id + '"]');
                if (existingRow.length > 0) {
                    var inputJumlah = existingRow.find('input.jumlah');
                    var newJumlah = parseInt(inputJumlah.val()) + 1;
                    inputJumlah.val(newJumlah);
                } else {
                    $('#table-barangMasuk tbody').append(`
                        <tr data-id="${id}">
                            <td>${$('#table-barangMasuk tbody tr').length + 1}</td>
                            <td class="nama">${nama}</td>
                            <td class="stok">${stok}</td>
                            <td><input type="number" class="form-control form-control-sm jumlah" value="1" min="1"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="bi bi-trash"></i></button></td>
                        </tr>
                    `);
                }
                updateHiddenItems();
            });

            // Update data saat jumlah diubah
            $('#table-barangMasuk').on('input', 'input.jumlah', function() {
                updateHiddenItems();
            });

            // Mengupdate nomor urut setiap kali baris dihapus
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
                updateHiddenItems();
            });

            function updateRowNumbers() {
                $('#table-barangMasuk tbody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            function updateHiddenItems() {
                var items = [];
                $('#table-barangMasuk tbody tr').each(function() {
                    var id = $(this).data('id');
                    var jumlah = $(this).find('input.jumlah').val();
                    items.push({
                        id_barang: id,
                        jumlah: jumlah
                    });
                });
                $('#items').val(JSON.stringify(items));
            }
        });
    </script>
@endpush
