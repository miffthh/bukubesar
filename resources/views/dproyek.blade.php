@extends('layout.template')

@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body mt-3">
                <h3>Halaman Data Proyek</h3>
                <hr>
                <h6>Data Proyek</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            @if (auth()->user()->role == 'Admin')
                <a href="/tambahdatadp" class="btn btn-primary mb-3">Tambah Data</a>
            @endif
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="table-info" id="records">
                            <tr align="center">
                                <th>Kode Proyek</th>
                                <th>Nama Proyek</th>
                                <th>User/Lokasi Proyek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dp as $row)
                                <tr align="center">
                                    <th>{{ $row->kode_proyek }}</th>
                                    <th>{{ $row->nama_proyek }}</th>
                                    <th>{{ $row->lokasi_proyek }}</th>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
