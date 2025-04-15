@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card p-3">
                <div class="row align-items-center">
                    <div class="col"></div>
                    <div class="col-auto d-flex gap-2">
                        <a class="btn btn-sm btn-primary" href="{{ url('barang/create') }}">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table_barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Vendor</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barang').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('barang/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.id_barang = $('#id_barang').val();
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama_barang",
                    className: "",
                    orderable: false,
                    searchable: true
                }, {
                    data: "stok",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "vendor",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "gambar",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });
            $('#id_barang').on('change', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
