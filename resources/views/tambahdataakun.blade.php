@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Tambah Akun</h3>
        <hr>
        <h6>Tambah Data Akun</h6>
    </div>
    <div class="row container">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <form action="/insertakun" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <div align="fluid">
                                <label for="exampleInputEmail1" class="mt-3">Kode Akun</label>
                                <input type="text" name="kode_akun"
                                    class="form-control @error('kode_akun') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('kode_akun') }}" autofocus>
                                @error('kode_akun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="mt-3">Nama Perkiraan</label>
                            <input type="text" name="nama_perkiraan"
                                class="form-control @error('nama_perkiraan') is-invalid @enderror" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('nama_perkiraan') }}" autofocus>
                            @error('nama_perkiraan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="mt-3">Nama Group</label>
                            <input type="text" name="nama_group"
                                class="form-control @error('nama_group') is-invalid @enderror" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('nama_group') }}" autofocus>
                            @error('nama_group')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
