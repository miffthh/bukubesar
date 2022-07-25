@extends('layout.dashboard')

@section('container')
<div class="container mt-3">
        <h2>Halaman Akun</h2><hr>
    <h5>Data Akun</h5>
</div>
<div class="row">
    <div class="container mt-1">
<a href="/tambahakun" class="btn btn-primary mb-4">Tambah Data</a>
<div class="card">
    <div class="cardbody">
<table class="table">
    <thead class="table-info">    
    <tr align="center">
        <th scope=""> # </th>
        <th>Kode Akun</th>
        <th>Nama Akun</th>
    </tr> 
        
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr align="center">
            <th> {{ $row->no }}</th>
            <th>{{ $row->kode_akun }}</th>
            <th>{{ $row->nama_akun }}</th>
        </tr> 
        @endforeach
    </tbody>
</table>
</div>
</div>
    </div>
</div>

@endsection
