
@extends('layout.dashboard')



@section('container')

<div class="container mt-4"> 

    
        <h2 class=" ">Welcome to Dashboard Buku Besar PT. Samalogi</h2><hr>
        <h5 class=" ">Data Perolehan Proyek</h5>
        <button type="button" class="btn btn-primary btn-sm">Tambah Data</button>
    </div>

    <table class="table mt-2">
        <thead class="table-info">
        <tr align="center">
            <th> No</th>
            <th>Tanggal</th>
            <th>Kode AKun</th>
            <th>Transaksi</th>
            <th>Kode Proyek</th>
            <th>Nama Proyek</th>
            <th>DST</th>
            <th>Total</th>
        </tr>
        </tr>
        </thead>
        <tbody class="table table-success table-striped">
        </tbody>
    </table>
    

</div>

@endsection

