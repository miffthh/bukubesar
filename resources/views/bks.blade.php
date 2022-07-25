@extends('layout.dashboard')

@section('container')
<div class="container mt-3">
        <h2>Halaman Buku Kas Harian</h2><hr>
    
    <h5>Data Buku Kas Harian</h5>
</div>
<table class="table">
    <thead class="table-info">
    <tr align="center">
        <th> No</th>
        <th>Tanggal</th>
        <th>Nama Perkiraan</th>
        <th>Reff</th>
        <th>Kode ACC</th>
        <th>Debit</th>
        <th>Kredit</th>
        <th>Balance</th>
        <th>Kode Proyek</th>
        <th>Nama Perkiraan</th>
        <th>Kelompok Perkiraan</th>
    </tr>
    </tr>
    </thead>
    <tbody class="table table-success table-striped">
    </tbody>
</table>

@endsection