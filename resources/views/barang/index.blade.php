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

    <div id="imageModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gambar Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Gambar Barang">
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
                    data: "vendor.nama_vendor",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "gambar",
                    render: function(data, type, row) {
                        return '<img class="zoomable" src="{{ asset('storage/barang/') }}/' +
                            row.gambar +
                            '" alt="Gambar Barang" height="50">';
                    },
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
            $(document).on('click', '.zoomable', function() {
                if (window.matchMedia('(hover: none)').matches) {
                    $(this).toggleClass('clicked');
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
                transform: scale(5);
            }
        }

        /* Efek klik untuk mobile */
        @media (hover: none) {
            .zoomable.clicked {
                transform: scale(5);
            }
        }
    </style>
@endpush
