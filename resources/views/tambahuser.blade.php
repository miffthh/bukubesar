@extends('layout.template')

@section('container')
    <div class="container">
        <h3>Halaman Tambah Data User</h3>
        <hr>
        <h6>Tambah Data User</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/tambahdatauser" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="floatingInput">NIP</label>
                    <input type="text" class="form-control" name="nidn" id="floatingInput" placeholder="nidn" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="floatingInput">Name</label>
                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name" required>
                </div>
                <div class="mb-3">
                    <label for="floatingInput">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                        <option>-- Pilih --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="floatingInput">Email</label>
                    <input type="email" class="form-control" name="email" id="floatingInput"
                        placeholder="name@example.com" required>
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="floatingPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="Password" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="floatingInput">Level</label>
                    <select name="role" class="form-select" aria-label="Default select example" required>
                        <option>-- Pilih --</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                    <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
            </form>
        </div>
    </div>
@endsection
