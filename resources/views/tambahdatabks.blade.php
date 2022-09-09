@extends('layout.template')

@section('container')
    <div class="container">
        <h3>Halaman Tambah Data Buku Kas Harian</h3>
        <hr>

        <h6>Tambah Data Buku Kas Harian</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/insertdatabks" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Perkiraan</label>
                        <input type="text" name="perkiraan" class="form-control" id="perkiraan"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <div align="fluid">
                        <label for="exampleInputEmail1" class="mt-3">Reff</label>
                        <input type="text" name="reff" class="form-control" id="reff"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label type="text" id="" class="mt-3">Kode Akun</label>
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
                        <input type="text" name="debit" class="form-control" id="debit"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <div align="fluid">
                            <label for="exampleInputEmail1" class="mt-3">Kredit</label>
                            <input type="text" name="kredit" class="form-control" id="kredit"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label type="text" id="kode_proyek" class="mt-3">Kode Proyek</label>
                        </div>
                        <div class="form-group">
                            <select class="form-select" style="width: 100%;" name="kode_proyek" id="kode_proyek">
                                <option selected>-- Pilih --</option>
                                @foreach ($kp as $bk)
                                    <option value="{{ $bk->kode_proyek }}">{{ $bk->kode_proyek }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label type="text" id="" class="mt-3">Nama Perkiraan</label>
                            <input type="text" class="form-control" name="nama_perkiraan" id="nama_perkiraan" readonly />
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label type="text" id="" class="mt-3">Nama Group</label>
                            <input type="text" class="form-control" name="nama_group" id="nama_group" readonly />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3"> <i class="bi bi-save2"></i> Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('append-script')
    <script>
        var obj = [{
                nama_perkiraan: '',
                nama_group: '',
            },

            @foreach ($ak as $row)
                {
                    nama_perkiraan: '{{ $row->nama_perkiraan }}',
                    nama_group: '{{ $row->nama_group }}',

                },
            @endforeach
        ]

        $(function() {
            setValue();
            $('#kode_akun').on('change', function() {
                setValue();
            });
        });

        function setValue() {
            var idx = $('#kode_akun')[0].selectedIndex;
            $('#nama_perkiraan').val(obj[idx].nama_perkiraan);
            $('#nama_group').val(obj[idx].nama_group);
        }
    </script>
@endpush
