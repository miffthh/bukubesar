@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Edit Biaya Administrasi & Umum</h3>
        <hr>

        <h6>Edit Data Buku Besar Biaya Administrasi & Umum</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/updatedatabbbadm/{{ $bb->id }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('tanggal', $bb->tanggal) }}">
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Nama Perkiraan</label>
                        <input type="text" name="nama_perkiraan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('nama_perkiraan', $bb->nama_perkiraan) }}">
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Reff</label>
                        <input type="text" name="reff" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('reff', $bb->reff) }}">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                    </div>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%;" name="kode_akun" id="kode_akun">
                            <option selected>{{ old('kode_akun', $bb->kode_akun) }}</option>
                            @foreach ($ak as $bka)
                                <option value="{{ $bka->kode_akun }}">{{ $bka->kode_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Debit</label>
                        <input type="text" name="debit" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('debit', $bb->debit) }}">
                    </div>
                    <div class="mb-3">
                        <div align="fluid">
                            <label for="exampleInputEmail1" class="mt-3">Kredit</label>
                            <input type="text" name="kredit" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('kredit', $bb->kredit) }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3"><i class="bi bi-upload"></i> Update</button>
            </form>
        </div>
    </div>
@endsection
