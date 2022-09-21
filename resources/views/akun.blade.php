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
                            <th cscope="row"> No</th>
                            <th>Kode Akun</th>
                            <th>Nama Perkiraan</th>
                            <th>Nama Group</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr align="center">
                                <td scope="row">{{ $no++ }}</td>
                                <td>{{ $row->kode_akun }}</td>
                                <td>{{ $row->nama_perkiraan }}</td>
                                <td>{{ $row->nama_group }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
