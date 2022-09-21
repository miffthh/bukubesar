@extends('layout.template')

@section('container')
    <div class="container">
        <h3>Halaman Tambah Data Perolehan Proyek</h3>
        <hr>

        <h6>Tambah Data Perolehan Proyek</h6>
    </div>
    <div class="card">
        <div class="card-body">

            <form action="/insertdatapproyek" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div>
                    <div class="form-group">
                        <label class="form-label" for="kode_akun">Kode Akun</label>
                        <select class="form-select" style="width: 100%;" name="kode_akun" id="kode_akun" required>
                            <option selected>-- Pilih --</option>
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
                            aria-describedby="emailHelp" required>
                    </div>
                    <div>
                        <div class="form-group">
                            <label class="form-label" for="kode_proyek">Kode Proyek</label>
                            <select class="form-select" style="width: 100%;" name="kode_proyek" id="kode_proyek" required>
                                <option selected>-- Pilih --</option>
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
                                aria-describedby="emailHelp" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
            </form>
        </div>
    </div>
@endsection
