@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card p-3">
                <div class="card-header d-flex align-items-center gap-2 flex-wrap">
                    <label for="filter_sa" class="form-label mb-0">Filter:</label>
                    <select class="form-select form-select-sm w-auto" id="filter_sa" name="filter_sa">
                        <option value="">-- Sales Area --</option>
                        @foreach ($sales_area as $sa)
                            <option value="{{ $sa->id_sa }}">{{ $sa->nama_sa }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="table_riwayat">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Sales Area</th>
                                <th>Fungsi</th>
                                <th>Skala Kegiatan</th>
                                <th>Jumlah</th>
                                <th>Keperluan</th>
                                <th>Dokumen</th>
                                <th>Tanggal</th>
                                <th>Status</th>
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

            let useRole = "{{ Auth::user()->id_level }}";
            let ajaxUrl = "";

            if (useRole == 1 || useRole == 2) {
                ajaxUrl = "{{ url('permintaan/riwayat_list') }}";
            } else {
                ajaxUrl = "{{ url('pemohon/riwayat_list') }}";
            }


            var dataRiwayat = $('#table_riwayat').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": ajaxUrl,
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.filter_sa = $('#filter_sa').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "users.sales_area.nama_sa",
                    className: "",
                    orderable: true,
                    searchable: false
                }, {
                    data: "users.fungsi.nama_fungsi",
                    className: "",
                    orderable: false,
                    searchable: true
                }, {
                    data: "skala.skala_kegiatan",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "jumlah",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "keperluan",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "dokumen",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "tanggal_diperlukan",
                    className: "",
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        if (!data) return '';
                        let parts = data.split('-');
                        return `${parts[2].substring(0,2)}-${parts[1]}-${parts[0]}`;
                    }
                }, {
                    data: "status",
                    className: "",
                    orderable: false,
                    searchable: false
                }],
            });
            $('#filter_sa').on('click', function() {
                dataRiwayat.ajax.reload();
            });
        });
    </script>
@endpush
