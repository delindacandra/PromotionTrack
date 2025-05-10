@extends('layouts.template')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Data Pengguna</div>
        </div>
        <div class="card-body">
            @empty($users)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>Level</th>
                        <td>{{ $users->level->nama_level }}</td>
                    </tr>
                    <tr>
                        <th>Sales Area</th>
                        <td>{{ $users->sales_area->nama_sa }}</td>
                    </tr>
                    <tr>
                        <th>Fungsi</th>
                        <td>{{ $users->fungsi->nama_fungsi }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $users->email }}</td>
                    </tr>
                </table>
            @endempty
        </div>
        <div class="card-footer">
            <a class="btn btn-default border-primary float-end" href="{{ url('pengguna') }}">Kembali</a>
        </div>
        </form>
    </div>
@endsection
