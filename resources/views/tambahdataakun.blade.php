@extends('layout.dashboard')

@section('container')
<div class="container mt-3">
        <h2>Halaman Tambah Akun</h2><hr>
    <h5>Tambah Data Akun</h5>
</div>
<div class="row container">
<div class="">
    <div class="card">
        <div class="cardbody">
            <form action="/insertakun" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <div align="fluid">
                  <label for="exampleInputEmail1" class="form-label mt-3">Kode Akun</label>
                  <input type="text" name="kode_akun"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                
                </div>
            </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label mt-3">Nama Akun</label>
                    <input type="text" name="nama_akun" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>


</div>

@endsection
