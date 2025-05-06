@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card p-3">
                <div class="row align-items-center">
                    <div class="col"></div>
                    <div class="col-auto d-flex gap-2">
                        <a class="btn btn-sm btn-primary" href="{{ url('pengguna/create') }}">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table_users">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Level</th>
                                    <th>Sales Area</th>
                                    <th>Fungsi</th>
                                    <th>Email</th>
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
            var dataUsers = $('#table_users').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('pengguna/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.id_users = $('#id_users').val();
                        d._token = "{{ csrf_token() }}";
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "level.nama_level",
                    className: "",
                    orderable: false,
                    searchable: true
                }, {
                    data: "sales_area.nama_sa",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "fungsi.nama_fungsi",
                    className: "",
                    orderable: false,
                    searchable: false
                },{
                    data: "email",
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
            $('#id_users').on('change', function() {
                dataUsers.ajax.reload();
            });
        });
    </script>
@endpush

@push('js')
@endpush
