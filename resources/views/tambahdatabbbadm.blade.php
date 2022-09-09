@extends('layout.template')

@section('container')
    <div class="container">
        <h3>Halaman Biaya Administrasi & Umum</h3>
        <hr>

        <h6>Data Buku Besar Biaya Administrasi & Umum</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/insertdatabbbadm" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Nama Perkiraan</label>
                        <input type="text" name="nama_perkiraan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Reff</label>
                        <input type="text" name="reff" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                    </div>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%;" name="kode_akun" id="kode_akun">
                            <option selected>-- Pilih --</option>
                            @foreach ($ak as $bk)
                                <option value="{{ $bk->kode_akun }}">{{ $bk->kode_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Debit</label>
                        <input type="text" name="debit" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <div align="fluid">
                            <label for="exampleInputEmail1" class="mt-3">Kredit</label>
                            <input type="text" name="kredit" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
            </form>
        </div>
    </div>
@endsection
