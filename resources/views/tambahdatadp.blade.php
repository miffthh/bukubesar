@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Tambah Data Proyek</h3>
        <hr>

        <h6>Tambah Data Proyek</h6>
    </div>

    <div class="row container">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <form action="/insertdatadp" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <div align="fluid">
                                <label for="exampleInputEmail1" class="mt-3">Kode Proyek</label>
                                <input type="text" name="kode_proyek" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="mt-3">Nama Proyek</label>
                            <input type="text" name="nama_proyek" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="mt-3">Lokasi Proyek</label>
                            <input type="text" name="lokasi_proyek" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
