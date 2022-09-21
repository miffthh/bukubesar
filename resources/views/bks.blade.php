@extends('layout.template')

@section('container')
    <div class="card">
        <div class="card-body mt-3">
            <h3>Halaman Buku Kas Harian</h3>
            <hr>
            <h6>Data Buku Kas Harian</h6>
        </div>
    </div>
    <div class="container">
        @if (auth()->user()->role == 'Admin')
            <a href="/tambahdatabks" class="btn btn-primary btn-sm"><i class="bi bi-folder-plus"></i> Tambah Data</a>
        @endif
        <a href="/exporrtpdf" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-pdf"></i> Export PDF
        </a>
        <a href="/cetakkform" class="btn btn-warning btn-sm"><i class="bi bi-box-arrow-in-up-right"></i> Export PDF Per Tgl
        </a>
        <a href="/exporrtexcel" target="_blank" class="btn btn-success btn-sm"><i class="bi bi-file-excel"></i> Export Excel
        </a>
        <a href="/bks" class="btn btn-info btn-sm"><i class="bi bi-arrow-repeat"></i>Refresh</a>

        <!-- Search Data -->
        <div class="row g-3 align-items-center d-flex flex-row-reverse mb-3">
            <div class="col-auto">
                <form action="/bks" method="get">
                    <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" name="search" id="exampleFormControlInput1"
                        placeholder="Ketik perkiraan">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Search Data -->

    <div class="card">
        <div class="card-body">
            <table class="table table-sm">
                <thead class="table-info" id="records">
                    <tr align="center">
                        <th cscope="row"> No</th>
                        <th>Tanggal</th>
                        <th>Perkiraan</th>
                        <th>Reff</th>
                        <th>Kode Akun</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Balance</th>
                        <th>Kode Proyek</th>
                        <th>Nama Perkiraan</th>
                        <th>Group</th>
                        @if (auth()->user()->role == 'Admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $total = 0;
                    @endphp
                    @foreach ($bk as $index => $row)
                        <tr align="center">
                            <td scope="row">{{ $index + $bk->firstItem() }}</td>
                            <td>{{ $row->tanggal }}</td>
                            <td>{{ $row->perkiraan }} </td>
                            <td>{{ $row->reff }}</td>
                            <td>{{ $row->kode_akun }}</td>
                            <td><?= 'Rp. ' . number_format($row->debit, 0, ',', '.') ?></td>
                            <td><?= 'Rp. ' . number_format($row->kredit, 0, ',', '.') ?></td>
                            @php
                                $debit = $row['debit'];
                                $kredit = $row['kredit'];
                            @endphp
                            <td><?= 'Rp. ' . number_format($row->balance, 0, ',', '.') ?></td>
                            <td>{{ $row->kode_proyek }}</td>
                            <td>{{ $row->nama_perkiraan }}</td>
                            <td>{{ $row->nama_group }}</td>
                            
                            @if (auth()->user()->role == 'Admin')
                                <td>
                                    <a href="{{ url('tampilkandatabks/' . $row->id) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}"><i
                                            class="bi bi-trash3"></i> Hapus</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    <th colspan="5" class="text-center"><strong>Total</strong></th>
                    {{-- <th class="text-center">Total</th> --}}
                    <th class="text-center"><?= 'Rp. ' . number_format($total_debit, 0, ',', '.') ?></th>
                    <th class="text-center"><?= 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?></th>
                    {{-- <td class="text-center">Rp. {{ $total }}</td> --}}
                    <td>
                    <td>
                    <td>
                    <td>
                    <td>
                </tbody>
            </table>
            <div class="pull-right mt-3">
                {{ $bk->links() }}
            </div>
        </div>
    </div>
@endsection

@push('append-script')
    {{-- Hapus Buku Kas Harian --}}
    <script>
        $('.delete').click(function() {
            var bksid = $(this).attr('data-id');
            swal({
                    title: "Apakah Yakin ?",
                    text: "Data dengan id " + bksid + " akan dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletee/" + bksid + ""
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
