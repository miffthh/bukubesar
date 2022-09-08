@extends('layout.template')

@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body mt-3">
                <h3>Halaman Perolehan Proyek</h3>
                <hr>

                <h6>Data Perolehan Proyek</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            @if (auth()->user()->role == 'Admin')
                <a href="/tambahdatapproyek" class="btn btn-primary mb-3">Tambah Data </a>
            @endif
            <a href="/exportpdf" target="_blank" class="btn btn-info mb-3">Export PDF </a>
            <a href="/cetakkkkform" class="btn btn-info mb-3">Export PDF Per Tgl </a>
            <a href="/exportexcel" target="_blank" class="btn btn-info mb-3">Export Excel </a>
            <a href="/pproyek" class="btn btn-info mb-3">Refresh</a>
            <br>
            <div class="container row col-lg-6 md-4 ms-auto">
                <form action="/periodes" method="get" class="d-flex">
                    @csrf
                    <input type="date" name="tgl_mulai" class="form-control datepicker mb-2 ">
                    <input type="date" name="tgl_selesai" class="form-control datepicker ms-2 mb-2 ">
                    <button type="submit" name="filter_tgl" id="filter_tgl"
                        class="btn btn-success ms-2 mb-2 ">Filter</button>
                </form>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="table-info" id="records">
                            <tr align="center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kode Akun</th>
                                <th>Transaksi</th>
                                <th>Kode Proyek</th>
                                <th>Biaya Proyek</th>
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

                            @foreach ($pp as $index => $row)
                                <tr align="center">
                                    <th scope="row">{{ $index + $pp->firstItem() }}</th>
                                    <th>{{ $row->tanggal }}</th>
                                    <th>{{ $row->akun->kode_akun }}</th>
                                    <th>{{ $row->transaksi }}</th>
                                    <th>{{ $row->dproyek->kode_proyek }}</th>
                                    <th><?= 'Rp. ' . number_format($row->biaya_proyek, 0, ',', '.') ?></th>                                    
                                    <?php
                                    $total += $row['biaya_proyek'];
                                    ?>
                                    @if (auth()->user()->role == 'Admin')
                                        <th>
                                            <a href="{{ url('tampilkandatapproyek/' . $row->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete"
                                                data-id="{{ $row->id }}">Hapus</a>
                                        </th>
                                    @endif
                                </tr>
                            @endforeach
                            <th colspan="5" class="text-center"><strong>Total</strong></th>
                            <th class="text-center"><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></th>
                            <th></th>
                </div>
                </tbody>
                </table>
                <div class="pull-right mt-3">
                    {{ $pp->links() }}
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
            var pproyekid = $(this).attr('data-id');
            swal({
                    title: "Apakah Yakin ?",
                    text: "Data dengan id " + pproyekid + " akan dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleted/" + pproyekid + ""
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
