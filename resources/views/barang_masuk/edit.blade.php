@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-3">
                    <div class="card-header py-2">
                        <h5 class="text-center fw-bold mb-0">Form Barang Masuk</h5>
                    </div>
                    <div class="card-body">
                        <form id="form_barangMasuk" method="POST"
                            action="{{ url('barang_masuk/' . $barangMasuk->id_barangMasuk) }}">
                            @csrf
                            @method('PUT')
                            <table class="table table-bordered" id="table-barangMasuk">
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
                                    @foreach ($barang as $detail)
                                        <tr data-id="{{ $detail->id_barang }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->barang->nama_barang }}</td>
                                            <td>{{ optional($detail->barang->stok)->jumlah ?? 0 }}</td>
                                            <td><input type="number" name="jumlah[{{ $detail->id_barang }}]"
                                                    class="form-control" min="1"
                                                    value="{{ old('jumlah.' . $detail->id_barang, $detail->jumlah) }}"></td>
                                            <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="items" id="items">
                            <div class="mb-3 mt-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="{{ old('keterangan', $barangMasuk->keterangan) }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_barangMasuk" class="form-label">Tanggal Barang Masuk</label>
                                <input type="date" class="form-control" id="tanggal_barangMasuk"
                                    name="tanggal_barangMasuk"
                                    value="{{ old('tanggal_barangMasuk', $barangMasuk->tanggal_barangMasuk) }}" required />
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-default border-primary" href="{{ url('barang_masuk') }}">Kembali</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            function updateHiddenItems() {
                var items = [];
                $('#table-barangMasuk tbody tr').each(function() {
                    var id = $(this).data('id');
                    var jumlah = $(this).find('input[name^="jumlah"]').val();
                    if (id && jumlah && !isNaN(jumlah)) {
                        items.push({
                            id_barang: id,
                            jumlah: jumlah
                        });
                    }
                });
                $('#items').val(JSON.stringify(items));
            }

            // Update hidden items setiap kali ada perubahan di input jumlah
            $(document).on('input', 'input[name^="jumlah"]', function() {
                updateHiddenItems();
            });

            // Mengupdate nomor urut setiap kali baris dihapus
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateHiddenItems();
            });

            $('#form_barangMasuk').on('submit', function() {
                updateHiddenItems(); // Pastikan data hidden diperbarui saat form disubmit
            });

            $('#submit').on('click', function() {
                const keterangan = $('#keterangan').val();
                const tanggal = $('#tanggal').val();

                if (!keterangan || !tanggal) {
                    alert("Keterangan dan Tanggal wajib diisi!");
                    return;
                }
                $('#form_barangMasuk').submit();
            });
        });
    </script>
@endpush
