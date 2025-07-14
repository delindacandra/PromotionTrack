@extends('layouts.template')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="card p-3">
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <label for="filter_skala" class="form-label mb-0">Filter:</label>
                        <select class="form-select form-select-sm w-auto flex-grow-1" id="filter_skala" name="filter_skala">
                            <option value="">-- Skala Kegiatan --</option>
                            @foreach ($skala as $sk)
                                <option value="{{ $sk->id_skala }}">{{ $sk->skala_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="table_permintaan">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Pemohon</th>
                                <th>Skala Kegiatan</th>
                                <th>Keperluan</th>
                                <th>Dokumen</th>
                                <th>Jumlah</th>
                                <th>Tanggal Diperlukan</th>
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
            var dataPermintaan = $('#table_permintaan').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    "url": "{{ url('permintaan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.filter_skala = $('#filter_skala').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "users.fungsi.nama_fungsi",
                    className: "",
                    orderable: false,
                    searchable: true,
                }, {
                    data: "skala.skala_kegiatan",
                    className: "",
                    orderable: false,
                    searchable: false,
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
                    data: "jumlah",
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
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }],
            });
            $('#filter_skala').on('change', function() {
                dataPermintaan.ajax.reload();
            });
            // Tombol Setuju
            $('#table_permintaan').on('click', '.btn-setuju', function() {
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menyetujui permintaan ini?')) {
                    $.ajax({
                        url: "{{ url('/permintaan') }}/" + id + "/setuju",
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            if (res.success) {
                                $('#table_permintaan').DataTable().ajax.reload(null, false);
                                alert(res.message);
                            } else {
                                alert(res.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                }
            });

            //Tombol Tolak
            $('#table_permintaan').on('click', '.btn-tolak', function() {
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menolak permintaan ini?')) {
                    $.ajax({
                        url: "{{ url('/permintaan') }}/" + id + "/tolak",
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            if (res.success) {
                                $('#table_permintaan').DataTable().ajax.reload(null, false);
                                alert(res.message);
                            } else {
                                alert(res.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                }
            });

        });
    </script>
@endpush
