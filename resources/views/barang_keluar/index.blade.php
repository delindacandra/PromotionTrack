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
                        <a href="{{ url('barang_keluar/create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="table_barangKeluar">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Keperluan</th>
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
            var dataBarang = $('#table_barangKeluar').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('barang_keluar/list') }}",
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
                    data: "barang_keluar.tanggal_barangKeluar",
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
                    data: "barang_keluar.keperluan",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "jumlah",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "barang_keluar.keterangan",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }],

                drawCallback: function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    var rowspanMap = {};
                    var nomor = 1;

                    api.column(1, {
                        page: 'current'
                    }).data().each(function(data, i) {
                        var id = api.row(i).data().id_barangKeluar;

                        if (id === last) {
                            $(rows).eq(i).find('td:eq(0)').css('display', 'none'); // No
                            $(rows).eq(i).find('td:eq(1)').css('display', 'none'); // Tanggal
                            $(rows).eq(i).find('td:eq(3)').css('display', 'none'); // Keperluan
                            $(rows).eq(i).find('td:eq(5)').css('display', 'none'); // Keterangan
                            $(rows).eq(i).find('td:eq(6)').css('display', 'none'); // Aksi
                        } else {
                            var rowspanCount = api.rows(function(idx, d) {
                                return d.id_barangKeluar === id;
                            }).count();

                            $(rows).eq(i).find('td:eq(0)').html(nomor); // No
                            $(rows).eq(i).find('td:eq(0)').attr('rowspan', rowspanCount);
                            $(rows).eq(i).find('td:eq(1)').attr('rowspan',
                                rowspanCount); // Tanggal
                            $(rows).eq(i).find('td:eq(3)').attr('rowspan',
                                rowspanCount); // Keperluan
                            $(rows).eq(i).find('td:eq(5)').attr('rowspan',
                                rowspanCount); // Keterangan
                            $(rows).eq(i).find('td:eq(6)').attr('rowspan',
                                rowspanCount); // Aksi

                            nomor++;
                        }
                        last = id;
                    });
                }
            });
            $('#filter_date').on('click', function() {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
