@extends('layout.template')

@section('container')
    <div class="card">
        <div class="card-body mt-3">
            <h3>Halaman User</h3>
            <hr>
            <h6>Data User</h6>
        </div>
    </div>

    <div class="container">
        <a href="/tambahuser" class="btn btn-primary btn-sm mb-3"><i class="bi bi-folder-plus"></i> Tambah Data</a>
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="table-info" id="records">
                        <tr align="center">
                            <th cscope="row"> No</th>
                            <th>NIP</th>
                            <th>Name</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            {{-- <th>Password</th> --}}
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $row)
                            <tr align="center">
                                <td cscope="row">{{ $no++ }}</td>
                                <td>{{ $row->nidn }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->email }}</td>
                                {{-- <td>{{ $row->password }}</td> --}}
                                <td>{{ $row->role }}</td>
                                <td>
                                    <a href="{{ url('tampilkandatauser/' . $row->id) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}"><i
                                            class="bi bi-trash3"></i> Hapus</a>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('append-script')
    {{-- Hapus Perolehan Proyek --}}
    <script>
        $('.delete').click(function() {
            var userid = $(this).attr('data-id');
            swal({
                    title: "Apakah Yakin ?",
                    text: "Data dengan id " + userid + " akan dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleate/" + userid + ""
                        swal("Data berhasil dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus!");
                    }
                });

        });
    </script>
@endpush
