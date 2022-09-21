@extends('layout.template')

@section('container')
    <div class="container">
        <h3>Halaman Tambah Data Biaya Marketing</h3>
        <hr>

        <h6>Tambah Data Biaya Marketing</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/insertdatabm" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div>
                    <div class="form-group">
                        <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                    </div>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%;" name="kode_akun" id="kode_akun" required>
                            <option selected>-- Pilih --</option>
                            @foreach ($ak as $bm)
                                <option value="{{ $bm->kode_akun }}">{{ $bm->kode_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Transaksi</label>
                    <input type="text" name="transaksi" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Marketing Proyek</label>
                    <input type="text" name="marketing_proyek" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Biaya</label>
                    <input type="text" name="biaya" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
            </form>
        </div>
    </div>
@endsection
