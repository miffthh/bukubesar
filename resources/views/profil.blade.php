@extends('layout.template')

@section('container')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h1> Halaman Edit Profil </h1>
                <hr class="my-0" />
                <div class="card-body">
                    <form action="/updatedataprofil/{{ Auth::user()->id }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input class="form-control" type="text" id="nidn" name="nidn"
                                    value="{{ Auth::user()->nidn }}" readonly />
                                @error('nidn')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ Auth::user()->name }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="select2 form-select">
                                    @php
                                        $val = old('jenis_kelamin', Auth::user()->jenis_kelamin);
                                    @endphp
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{ $val == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $val == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ Auth::user()->email }}" placeholder="john.doe@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" />
                                <label class="mt-1"><i>*Jika tidak ingin mengubah Password maka kosongkan saja.<i></label>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
