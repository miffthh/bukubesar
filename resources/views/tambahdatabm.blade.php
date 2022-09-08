@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Tambah Data Biaya Marketing</h3>
        <hr>

        <h6>Tambah Data Biaya Marketing</h6>
    </div>
    <div class="row">
        <div class="container mt-1">
            <div class="row container">
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdatabm" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select" style="width: 100%;" name="kode_akun"
                                            id="kode_akun">
                                            <option selected>Pilih Kode Akun</option>
                                            @foreach ($ak as $bm)
                                                <option value="{{ $bm->kode_akun }}">{{ $bm->kode_akun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="mt-3">Transaksi</label>
                                    <input type="text" name="transaksi" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="mt-3">Marketing Proyek</label>
                                    <input type="text" name="marketing_proyek" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="mt-3">Biaya</label>
                                    <input type="text" name="biaya" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
