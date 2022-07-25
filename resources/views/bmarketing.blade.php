@extends('layout.dashboard')

@section('container')
<div class="container mt-3">
        <h2>Halaman Biaya Marketing</h2><hr>
    
    <h5>Data Biaya Marketing</h5>
</div>
<table class="table">
    <thead class="table-info">
    <tr align="center">
        <th> No</th>
        <th>Tanggal</th>
        <th>Kode ACC</th>
        <th>Transaksi</th>
        <th>Kode Proyek</th>
        <th>Nama Proyek</th>
        <th>Total</th>
        
    </tr>
    </tr>
    </thead>
    <tbody class="table table-success table-striped">
    </tbody>
</table>

@endsection