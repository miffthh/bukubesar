@extends('layout.template')

@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body mt-3">
                <h3>Halaman Biaya Administrasi & Umum</h3>
                <hr>
                <h6>Data Buku Besar Biaya Administrasi & Umum</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            @if (auth()->user()->role == 'Admin')
                <a href="/tambahdatabbbadm" class="btn btn-primary mb-3">Tambah Data</a>
            @endif
            <a href="/expoortpdf" target="_blank" class="btn btn-info mb-3">Export PDF</a>
            <a href="/cetakkkform" class="btn btn-info mb-3">Export PDF Per Tgl </a>
            <a href="/expoortexcel" target="_blank" class="btn btn-info mb-3">Export Excel</a>
            <a href="/bbbadm" class="btn btn-info mb-3">Refresh</a>
            <div class="container row col-lg-6 md-4 ms-auto">
                <form action="/periode" method="get" class="d-flex">
                    <input type="date" name="tgl_mulai" class="form-control datepicker mb-2 ">
                    <input type="date" name="tgl_selesai" class="form-control datepicker ms-2 mb-2 ">
                    <button type="submit" name="filter_tgl" class="btn btn-success ms-2 mb-2 ">Filter</button>
                </form>
            </div>
            <div class="card"> 
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="table-info" id="records">
                            <tr align="center">
                                <th> No</th>
                                <th>Tanggal</th>
                                <th>Nama Perkiraan</th>
                                <th>Reff</th>
                                <th>Kode ACC</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Balance</th>
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
                                $debit = 0;
                                $kredit = 0;
                                $total_debit = 0;
                                $total_kredit = 0;
                            @endphp
                            @foreach ($bb as $index => $row)
                                <tr align="center">
                                    <th scope="row">{{ $bb->firstItem() }}</th>
                                    <th>{{ $row->tanggal }}</th>
                                    <th>{{ $row->nama_perkiraan }} </th>
                                    <th>{{ $row->reff }}</th>,
                                    <th>{{ $row->kode_akun }}</th>
                                    <th><?= 'Rp. ' . number_format($row->debit, 0, ',', '.') ?></th>
                                    <th><?= 'Rp. ' . number_format($row->kredit, 0, ',', '.') ?></th>
                                    @php
                                        $debit = $row['debit'];
                                        $kredit = $row['kredit'];
                                    @endphp
                                    <th><?= 'Rp. ' . number_format($row->balance, 0, ',', '.') ?></th>

                                    <?php
                                    $total_debit += $debit;
                                    $total_kredit += $kredit;
                                    ?>
                                    @if (auth()->user()->role == 'Admin')
                                        <th>
                                            <a href="{{ url('tampilkandatabbbadm/' . $row->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete"
                                                data-id="{{ $row->id }}">Hapus</a>
                                        </th>
                                    @endif
                                </tr>
                            @endforeach
                            <th colspan="5" class="text-center"><strong>Total</strong></th>
                            {{-- <th class="text-center">Total</th> --}}
                            <th class="text-center"><?= 'Rp. ' . number_format($total_debit, 0, ',', '.') ?></th>
                            <th class="text-center"><?= 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?></th>
                        </tbody>
                    </table>
                    <div class="pull-right mt-3">
                        {{ $bb->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('append-script')
    {{-- Hapus Perolehan Proyek --}}
    <script>
        $('.delete').click(function() {
            var bbbadmid = $(this).attr('data-id');
            swal({
                    title: "Apakah Yakin ?",
                    text: "Data dengan id " + bbbadmid + " akan dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleteee/" + bbbadmid + ""
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
