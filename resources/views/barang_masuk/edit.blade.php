@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Form Edit Barang Masuk</div>
        </div>
        <div class="card-body">
            <form id="form_barangMasuk" method="POST" action="{{ url('barang_masuk/' . $barangMasuk->id_barang_masuk) }}">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-barangMasuk">
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
                            @foreach ($barang as $detail)
                                <tr data-id="{{ $detail->id_barang }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->barang->nama_barang }}</td>
                                    <td>{{ optional($detail->barang->stok)->jumlah ?? 0 }}</td>
                                    <td><input type="number" name="jumlah[{{ $detail->id_barang }}]" class="form-control"
                                            min="1"
                                            value="{{ old('jumlah.' . $detail->id_barang, $detail->jumlah) }}">
                                    </td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <input type="hidden" name="items" id="items">
                
                <div class="mb-3 mt-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                        value="{{ old('keterangan', $barangMasuk->keterangan) }}" required />
                </div>
                <div class="mb-3">
                    <label for="tanggal_barang_masuk" class="form-label">Tanggal Barang Masuk</label>
                    <input type="date" class="form-control" id="tanggal_barang_masuk" name="tanggal_barang_masuk"
                        value="{{ old('tanggal_barang_masuk', $barangMasuk->tanggal_barang_masuk) }}" required />
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
