@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Edit Data Perolehan Proyek</h3>
        <hr>

        <h6>Edit Data Perolehan Proyek</h6>
    </div>
    <div class="row">
        <div class="container mt-1">
            <div class="card">
                <div class="card-body">

                    <form action="/updatedatapproyek/{{ $pp->id }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('tanggal', $pp->tanggal) }}">
                        </div>
                        <div>
                            <div class="form-group">
                                <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                            </div>
                            <div class="form-group">
                                <select class="form-control select" style="width: 100%;" name="kode_akun" id="kode_akun">
                                    <option selected>{{ old('kode_akun', $pp->kode_akun) }}</option>
                                    @foreach ($ak as $ppk)
                                        <option value="{{ $ppk->kode_akun }}">{{ $ppk->kode_akun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div align="fluid">
                                <label for="exampleInputEmail1" class="mt-3">Transaksi</label>
                                <input type="text" name="transaksi" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('transaksi', $pp->transaksi) }}">
                            </div>
                            <div>
                                <div class="form-group">
                                    <label type="text" id="kode_proyek" class="mt-3">Kode Proyek</label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select" style="width: 100%;" name="kode_proyek"
                                        id="kode_proyek">
                                        <option selected>{{ old('kode_proyek', $pp->kode_proyek) }}</option>
                                        @foreach ($kp as $ppk)
                                            <option value="{{ $ppk->kode_proyek }}">{{ $ppk->kode_proyek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div align="fluid">
                                    <label for="exampleInputEmail1" class="mt-3">Biaya Proyek</label>
                                    <input type="text" name="biaya_proyek" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ old('biaya_proyek', $pp->biaya_proyek) }}">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
