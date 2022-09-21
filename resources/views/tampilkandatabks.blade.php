@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Tambah Data Buku Kas Harian</h3>
        <hr>

        <h6>Tambah Data Buku Kas Harian</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/updatedatabks/{{ $bk->id }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('tanggal', $bk->tanggal) }}">
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Perkiraan</label>
                        <input type="text" name="perkiraan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('perkiraan', $bk->perkiraan) }}">
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Reff</label>
                        <input type="text" name="reff" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('reff', $bk->reff) }}">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label type="text" id="kode_akun" class="mt-3">Kode Akun</label>
                    </div>
                    <div class="form-group">
                        <select class="form-select" style="width: 100%;" name="kode_akun" id="">
                            <option selected>{{ old('kode_akun', $bk->kode_akun) }}</option>
                            @foreach ($ak as $bkk)
                                <option value="{{ $bkk->kode_akun }}">{{ $bkk->kode_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Debit</label>
                        <input type="text" name="debit" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('debit', $bk->debit) }}">
                    </div>
                    <div class="mb-3">
                        <div align="fluid">
                            <label for="exampleInputEmail1" class="mt-3">Kredit</label>
                            <input type="text" name="kredit" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('kredit', $bk->kredit) }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label type="text" id="kode_proyek" class="mt-3">Kode Proyek</label>
                        </div>
                        <div class="form-group">
                            <select class="form-select" style="width: 100%;" name="kode_proyek" id="kode_proyek">
                                <option selected>{{ old('kode_proyek', $bk->kode_proyek) }}</option>
                                @foreach ($kp as $bkk)
                                    <option value="{{ $bkk->kode_proyek }}">{{ $bkk->kode_proyek }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label type="text" id="" class="mt-3">Nama Perkiraan</label>
                            <input type="text" class="form-control" name="nama_perkiraan" id="nama_perkiraan"
                                value="{{ old('nama_perkiraan', $bk->nama_perkiraan) }}" readonly />
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label type="text" id="" class="mt-3">Nama Group</label>
                            <input type="text" class="form-control" name="nama_group" id="nama_group"
                                value="{{ old('nama_group', $bk->nama_group) }}" readonly />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3"><i class="bi bi-upload"></i> Update</button>
            </form>

        </div>
    </div>
@endsection
