@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Edit data pengguna</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/pengguna/' . $users->id_users) }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf {!! method_field('PUT') !!}
                <div class="row">
                    <div class="col-5">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select" id="level" name="level">
                            <option value="">- Pilih level -</option>
                            @foreach ($level as $i)
                                <option value="{{ $i->id_level }}"
                                    {{ old('level', $users->id_level) == $i->id_level ? 'selected' : '' }}>
                                    {{ $i->nama_level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="sa" class="form-label">Sales Area</label>
                        <select class="form-select" id="sa" name="sa">
                            <option valuef="">- Pilih sa -</option>
                            @foreach ($sa as $i)
                                <option value="{{ $i->id_sa }}"
                                    {{ old('sa', $users->id_sa) == $i->id_sa ? 'selected' : '' }}>
                                    {{ $i->nama_sa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="fungsi" class="form-label">Fungsi</label>
                        <select class="form-select" id="fungsi" name="fungsi">
                            <option value="">- Pilih fungsi -</option>
                            @foreach ($fungsi as $i)
                                <option value="{{ $i->id_fungsi }}"
                                    {{ old('fungsi', $users->id_fungsi) == $i->id_fungsi ? 'selected' : '' }}>
                                    {{ $i->nama_fungsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $users->email) }}" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="masukkan password baru">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword"
                                style="cursor: pointer;">
                                <i class="bi bi-eye-slash" id="iconToggle"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
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

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('togglePassword');
            const icon = document.getElementById('iconToggle');
            const password = document.getElementById('password');

            toggleButton.addEventListener('click', function() {
                const isPassword = password.type === 'password';
                password.type = isPassword ? 'text' : 'password';

                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        });
    </script>
@endsection
