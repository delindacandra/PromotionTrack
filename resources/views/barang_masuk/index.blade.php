@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card p-3">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <label for="start_date" class="mb-0 fw-bold">Start Date:</label>
                        <input type="date" id="start_date" class="form-control form-control-sm" style="width: 120px;">

                        <label for="end_date" class="mb-0 ms-2 fw-bold">End Date:</label>
                        <input type="date" id="end_date" class="form-control form-control-sm" style="width: 120px;">

                        <button id="filter_date" class="btn btn-sm btn-secondary ms-2">Filter</button>
                    </div>

                    <div class="d-flex align-items-center gap-2 mt-2 mt-md-0 ms-auto">
                        <a href="{{ url('barang_masuk/create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="table_barangMasuk">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Vendor</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barangMasuk').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('barang_masuk/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "barang_masuk.tanggal_barangMasuk",
                    className: "",
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        if (!data) return '';
                        let parts = data.split('-'); 
                        return `${parts[2].substring(0,2)}-${parts[1]}-${parts[0]}`;
                    }
                }, {
                    data: "barang.nama_barang",
                    className: "",
                    orderable: false,
                    searchable: true
                }, {
                    data: "barang.vendor",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "jumlah",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "barang_masuk.keterangan",
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
            $('#filter_date').on('click', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
