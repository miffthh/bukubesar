@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Tambah Data User</h3>
        <hr>
        <h6>Tambah Data User</h6>
    </div>

    <div class="row">
        <div class="container mt-1">
            <div class="card">
                <div class="card-body">
                    <form action="/tambahdatauser" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="floatingInput">NIDN</label>
                            <input type="text" class="form-control" name="nidn" id="floatingInput" placeholder="nidn">
                        </div>
                        <div class="mb-3">
                            <label for="floatingInput">Name</label>
                            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name">
                        </div>
                        <div class="mb-3">
                            <label for="floatingInput">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                                <option>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="floatingInput">Email</label>
                            <input type="email" class="form-control" name="email" id="floatingInput"
                                placeholder="name@example.com">
                            @error('email')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                placeholder="Password">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="floatingInput">Level</label>
                            <select name="role" class="form-select" aria-label="Default select example">
                                <option>-- Pilih --</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            <p class="mt-5 mb-3 text-muted">&copy; Samalogi 2022</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
