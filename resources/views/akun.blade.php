@extends('layout.template')

@section('container')
    <div class="card">
        <div class="card-body mt-3">
            <h3>Halaman Akun</h3>
            <hr>
            <h6>Data Akun</h6>
        </div>
    </div>
    <div class="container">
        @if (auth()->user()->role == 'Admin')
            <a href="/tambahakun" class="btn btn-primary btn-sm mb-3"><i class="bi bi-folder-plus"></i> Tambah Data</a>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="table-info" id="records">
                        <tr align="center">
                            <th>Kode Akun</th>
                            <th>Nama Perkiraan</th>
                            <th>Nama Group</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr align="center">
                                <th>{{ $row->kode_akun }}</th>
                                <th>{{ $row->nama_perkiraan }}</th>
                                <th>{{ $row->nama_group }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
