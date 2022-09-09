@extends('layout.template')

@section('container')
    <div class="container mt-3">

        <h3>Halaman Edit Data Biaya Marketing</h3>
        <hr>

        <h6>Edit Data Biaya Marketing</h6>

    </div>
    <div class="card">
        <div class="card-body">
            <form action="/updatedatabm/{{ $bm->id }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('tanggal', $bm->tanggal) }}">
                </div>
                <div>
                    <div class="form-group">
                        <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                    </div>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%;" name="kode_akun" id="kode_akun">
                            <option selected>{{ old('kode_akun', $bm->kode_akun) }}</option>
                            @foreach ($ak as $bmk)
                                <option value="{{ $bmk->kode_akun }}">{{ $bmk->kode_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Transaksi</label>
                    <input type="text" name="transaksi" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('transaksi', $bm->transaksi) }}">
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="mt-3">Marketing Proyek</label>
                    <input type="text" name="marketing_proyek" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('marketing_proyek', $bm->marketing_proyek) }}">
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="">Biaya</label>
                    <input type="text" name="biaya" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('biaya', $bm->biaya) }}">
                </div>
                <button type="submit" class="btn btn-success mt-3"><i class="bi bi-upload"></i> Update</button>
            </form>
        </div>
    @endsection
