@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row gy-4">

                <!-- Kolom Tabel (kiri) -->
                <div class="col-12 col-lg-6">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Daftar Barang</div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row align-items-center">
                                <label class="col-2 col-form-label">Cari</label>
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
                                                <td><img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar"
                                                        height="40px" class="zoomable"></td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm tambah-barang"
                                                        data-id="{{ $barang->id_barang }}"
                                                        data-nama="{{ $barang->nama_barang }}"
                                                        data-stok="{{ $barang->stok->jumlah ?? 0 }}">
                                                        <i class="bi bi-dash"></i>
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
                            <div class="card-title">Form Barang Keluar</div>
                        </div>
                        <div class="card-body">
                            <form id="form_barangKeluar" method="POST" action="{{ url('barang_keluar') }}">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" id="table-barangKeluar">
                                        <thead class="table-light">
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
                                </div>

                                <input type="hidden" name="items" id="items">

                                <div class="col-9">
                                    <label for="id_fungsi" class="form-label">Fungsi</label>
                                    <select class="form-control" id="id_fungsi" name="id_fungsi" required>
                                        <option value="">- Pilih Fungsi -</option>
                                        @foreach ($fungsi as $i)
                                            <option value="{{ $i->id_fungsi }}">{{ $i->nama_fungsi }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="keperluan" class="form-label">Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" required />
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required />
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_barangKeluar" class="form-label">Tanggal Barang
                                        Keluar</label>
                                    <input type="date" class="form-control" id="tanggal_barangKeluar"
                                        name="tanggal_barangKeluar" required />
                                </div>

                                <div class="mt-4 d-flex justify-content-start gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Submit
                                    </button>
                                    <a class="btn btn-outline-primary" href="{{ url('barang_keluar') }}">
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

            // Menambahkan barang ke tabel barang keluar
            $(document).on('click', '.tambah-barang', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var stok = $(this).data('stok');
                var jumlah = $(this).data('jumlah');

                var existingRow = $('#table-barangKeluar tbody tr[data-id="' + id + '"]');
                if (existingRow.length > 0) {
                    var inputJumlah = existingRow.find('input.jumlah');
                    var newJumlah = parseInt(inputJumlah.val()) + 1;
                    inputJumlah.val(newJumlah);
                } else {
                    $('#table-barangKeluar tbody').append(
                        `<tr data-id="${id}">
                    <td>${$('#table-barangKeluar tbody tr').length + 1}</td>
                    <td class="nama">${nama}</td>
                    <td class="stok">${stok}</td>
                    <td><input type="number" class="form-control jumlah" value="1" min="1"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="bi bi-trash"></i></button></td></tr>`
                    );
                }
                updateHiddenItems();
            });

            // Update data saat jumlah diubah
            $('#table-barangKeluar').on('input', 'input.jumlah', function() {
                updateHiddenItems();
            });

            function updateHiddenItems() {
                var items = [];
                $('#table-barangKeluar tbody tr').each(function() {
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
                $('#table-barangKeluar tbody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            $('#form_barangKeluar').on('submit', function(e) {
                let valid = true;
                $('#table-barangKeluar tbody tr').each(function() {
                    let stok = parseInt($(this).find('.stok').text());
                    let jumlah = parseInt($(this).find('input.jumlah').val());

                    if (jumlah > stok) {
                        alert('Terdapat jumlah barang yang melebihi stok!');
                        valid = false;
                        return false;
                    }
                });

                if ($('#table-barangKeluar tbody tr').length === 0) {
                    alert('Silakan pilih setidaknya satu barang.');
                    e.preventDefault();
                    return;
                }

                if (!valid) {
                    e.preventDefault();
                }
            });

        });
    </script>
@endpush
@push('css')
    <style>
        .zoomable {
            transition: transform 0.3s ease;
            cursor: zoom-in;
            z-index: 1000;
            position: relative;
        }

        /* Efek hover untuk desktop */
        @media (hover: hover) {
            .zoomable:hover {
                z-index: 10000;
                transform: scale(5);
            }
        }

        /* Efek klik untuk mobile */
        @media (hover: none) {
            .zoomable.clicked {
                z-index: 10000;
                transform: scale(5);
            }
        }
    </style>
@endpush
