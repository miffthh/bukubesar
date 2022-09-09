@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <h3>Halaman Edit Data User</h3>
        <hr>
        <h6>Edit Data User</h6>
    </div>    
        <div class="card">
            <div class="card-body">
                <form action="/updatedatauser/{{ $user->id }}" method="post">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="floatingInput">NIDN</label>
                        <input type="text" class="form-control" name="nidn" id="floatingInput" placeholder="nidn"
                            value="{{ old('nidn', $user->nidn) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Name</label>
                        <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name"
                            value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option>{{ old('jenis_kelamin', $user->jenis_kelamin) }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Email</label>
                        <input type="email" class="form-control" name="email" id="floatingInput"
                            placeholder="name@example.com" value="{{ old('email', $user->email) }}">

                    </div>
                    <div class="">
                        <label for="floatingPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password" value="{{ old('password', $user->password) }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="floatingInput">Level</label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option>{{ old('role', $user->role) }}</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                        </select>
                        <button type="submit" class="btn btn-success mt-3"> <i class="bi bi-upload"></i> Update</button>
                </form>
            </div>
        </div>    
@endsection
