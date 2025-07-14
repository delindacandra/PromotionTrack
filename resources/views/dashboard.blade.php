@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <small>
                "Barang promosi ini disiapkan khusus untuk mendukung kegiatan promosi. Produk-produk
                ini mencakup berbagai jenis merchandise yang menampilkan logo dan desain ikonik Pertamina,
                bertujuan untuk meningkatkan kesadaran merek dan loyalitas pelanggan."
            </small>
        </div>

        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-3">
                {{-- Total Barang Promosi --}}
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1">Total Barang Promosi</h5>
                                <h1 class="mb-0">
                                    {{ $totalBarang }} <span class="fs-6 fw-normal">jenis</span>
                                </h1>
                            </div>
                            <div class="icon-circle bg-primary bg-opacity-25 text-primary ms-auto me-2">
                                <i class="bi bi-box"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Permintaan --}}
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1">Total Permintaan Barang</h5>
                                <h1 class="mb-0">
                                    {{ $totalPermintaan }} <span class="fs-6 fw-normal">permintaan</span>
                                </h1>
                            </div>
                            <div class="icon-circle bg-success bg-opacity-25 text-success ms-auto me-2">
                                <i class="bi bi-truck"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Barang Masuk --}}
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1">Penambahan Stok</h5>
                                <h1 class="mb-0">
                                    {{ $totalBarangMasuk }} <span class="fs-6 fw-normal">kali</span>
                                </h1>
                            </div>
                            <div class="icon-circle bg-info bg-opacity-25 text-info ms-auto me-2">
                                <i class="bi bi-plus-square"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Barang Keluar --}}
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1">Jumlah Barang Keluar</h5>
                                <h1 class="mb-0">
                                    {{ $totalBarangKeluar }} <span class="fs-6 fw-normal">pcs</span>
                                </h1>
                            </div>
                            <div class="icon-circle bg-info bg-opacity-25 text-info ms-auto me-2">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grafik --}}
            <div class="row mt-3">
                {{-- Grafik Slow Moving --}}
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Slow Moving Items</span>
                            <form method="GET" action="{{ url('/dashboard') }}">
                                <select name="slow_range" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="3" {{ request('slow_range') == 3 ? 'selected' : '' }}>3 Bulan</option>
                                    <option value="6" {{ request('slow_range', 6) == 6 ? 'selected' : '' }}>6 Bulan</option>
                                    <option value="12" {{ request('slow_range') == 12 ? 'selected' : '' }}>1 Tahun</option>
                                </select>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-responsive">
                                {!! $slowMoving->container() !!}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Grafik Fast Moving --}}
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Fast Moving Items</span>
                            <form method="GET" action="{{ url('/dashboard') }}">
                                <input type="hidden" name="slow_range" value="{{ request('slow_range', 6) }}">
                                <select name="fast_range" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="3" {{ request('fast_range') == 3 ? 'selected' : '' }}>3 Bulan</option>
                                    <option value="6" {{ request('fast_range', 6) == 6 ? 'selected' : '' }}>6 Bulan</option>
                                    <option value="12" {{ request('fast_range') == 12 ? 'selected' : '' }}>1 Tahun</option>
                                </select>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="chart chart-responsive">
                                {!! $fastMoving->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .chart-responsive {
            position: relative;
            width: 100%;
            height: auto;
        }

        .chart-responsive canvas {
            width: 100% !important;
            height: auto !important;
        }

        .form-select-sm {
            width: auto;
        }

        .icon-circle {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1rem;
        }
    </style>
@endpush

@push('js')
    <script src="{{ $slowMoving->cdn() }}"></script>
    {!! $slowMoving->script() !!}

    <script src="{{ $fastMoving->cdn() }}"></script>
    {!! $fastMoving->script() !!}
@endpush
