@extends('layout.dashboard')

@section('container')
<div class="container mt-3">
        <h2>Halaman Akun</h2><hr>
    <h5>Data Akun</h5>
</div>

<button type="button" class="btn btn-primary container-auto">Tambah Data</button>

<table class="table">
    <thead class="table-info">
    <tr align="center">
        <th> No</th>
        <th>Kode ACC</th>
        <th>Nama Akun</th>
    </tr>
    </thead>
    <tbody class="table table-success table-striped">
    </tbody>
</table>

@endsection
