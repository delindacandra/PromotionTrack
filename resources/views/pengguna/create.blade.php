@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Input Data Pengguna Baru</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('pengguna') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select" id="level" name="level">
                            <option value="">- Pilih level -</option>
                            @foreach ($level as $i)
                                <option value="{{ $i->id_level }}">{{ $i->nama_level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="sa" class="form-label">Sales Area</label>
                        <select class="form-select" id="sa" name="sa">
                            <option value="">- Pilih sa -</option>
                            @foreach ($sa as $i)
                                <option value="{{ $i->id_sa }}">{{ $i->nama_sa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="fungsi" class="form-label">Fungsi</label>
                        <select class="form-select" id="fungsi" name="fungsi">
                            <option value="">- Pilih fungsi -</option>
                            @foreach ($fungsi as $i)
                                <option value="{{ $i->id_fungsi }}">{{ $i->nama_fungsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                            name="email" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
                            name="password" />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Submit
                    </button>
                    <a class="btn btn-outline-primary" href="{{ url('pengguna') }}">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
