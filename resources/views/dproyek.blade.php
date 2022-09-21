@extends('layout.template')

@section('container')
    <div class="card">
        <div class="card-body mt-3">
            <h3>Halaman Data Proyek</h3>
            <hr>
            <h6>Data Proyek</h6>
        </div>
    </div>
    <div class="container">
        @if (auth()->user()->role == 'Admin')
            <a href="/tambahdatadp" class="btn btn-primary btn-sm mb-3"><i class="bi bi-folder-plus"></i> Tambah Data</a>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="table-info" id="records">
                        <tr align="center">
                            <th cscope="row"> No</th>
                            <th>Kode Proyek</th>
                            <th>Nama Proyek</th>
                            <th>User/Lokasi Proyek</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($dp as $row)
                            <tr align="center">
                                <td>{{ $row->id  }}</td>
                                <td>{{ $row->kode_proyek }}</td>
                                <td>{{ $row->nama_proyek }}</td>
                                <td>{{ $row->lokasi_proyek }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
