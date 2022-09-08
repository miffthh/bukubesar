@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Tambah Data Perolehan Proyek</h3>
        <hr>

        <h6>Tambah Data Perolehan Proyek</h6>
    </div>
    <div class="row">
        <div class="container mt-1">
            <div class="card">
                <div class="card-body">

                    <form action="/insertdatapproyek" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div>                            
                            <div class="form-group">
                                <label class="form-label" for="kode_akun">Kode Akun</label>
                                <select class="form-control select2 form-select" style="width: 100%;" name="kode_akun"
                                    id="kode_akun">
                                    <option selected>Pilih Kode Akun</option>
                                    @foreach ($ak as $pp)
                                        <option value="{{ $pp->kode_akun }}">{{ $pp->kode_akun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div align="fluid">
                                <label for="exampleInputEmail1" class="mt-3">Transaksi</label>
                                <input type="text" name="transaksi" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div>                                
                                <div class="form-group">
                                    <label class="form-label" for="kode_proyek">Kode Proyek</label>
                                    <select class="form-control select2 form-select" style="width: 100%;" name="kode_proyek"
                                        id="kode_proyek">
                                        <option selected>Pilih Kode Proyek</option>
                                        @foreach ($kp as $pp)
                                            <option value="{{ $pp->kode_proyek }}">{{ $pp->kode_proyek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div align="fluid">
                                    <label for="exampleInputEmail1" class="mt-3">Biaya Proyek</label>
                                    <input type="text" name="biaya_proyek" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
