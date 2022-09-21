@extends('layout.template')

@section('container')
        <div class="card">
            <div class="card-body mt-3">
                <h3>Halaman Biaya Marketing</h3>
                <hr>
                <h6>Data Biaya Marketing</h6>
            </div>
        </div>        
        <div class="container">
            @if (auth()->user()->role == 'Admin')
                <a href="/tambahdatabm" class="btn btn-primary btn-sm"><i class="bi bi-folder-plus"></i> Tambah Data</a>
            @endif
            <a href="/exporttpdf" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-pdf"></i> Export PDF
            </a>
            <a href="/cetakform" class="btn btn-warning btn-sm"><i class="bi bi-box-arrow-in-up-right"></i> Export PDF Per Tgl </a>
            <a href="/exporttexcel" target="_blank" class="btn btn-success btn-sm"><i class="bi bi-file-excel"></i> Export
                Excel </a>
            <a href="/bmarketing" class="btn btn-info btn-sm"><i class="bi bi-arrow-repeat"></i> Refresh</a>
            {{-- <a href="/indeex" class="btn btn-info btn-sm"><i class="bi bi-arrow-repeat"></i> To Form</a> --}}
            
            <!-- Filter Tanggal -->
        {{-- <div class="container container col-lg-8 md-4 mt-3">
            <form action="/periodeee" method="get" class="d-flex">
                <label for="tgl_mulai">From</label>
                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control datepicker ms-2">
                <label for="tgl_selesai" class="ms-4"> To</label>
                <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control datepicker ms-2">

                <button type="submit" name="filter_tgl" class="btn btn-success btn-sm datpicker ms-2"><i
                        class="bi bi-printer"></i> Filter</button>
            </form>
        </div> --}}
        <!-- Filter Tanggal -->

            <!-- Search Data -->
            <div class="row g-3 align-items-center d-flex flex-row-reverse mb-3">
                <div class="col-auto">
                    <form action="/bmarketing" method="get">
                        <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-search"></i></span>
                        <input type="search"  class="form-control" name="search" id="exampleFormControlInput1"
                            placeholder="Ketik kode akun">
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
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kode Akun</th>
                                <th>Transaksi</th>
                                <th>Marketing Proyek</th>
                                <th>Biaya</th>
                                @if (auth()->user()->role == 'Admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>                            
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $total = 0;
                            @endphp
                            @foreach ($bm as $index => $row)
                                <tr align="center">
                                    <td scope="row">{{ $index + $bm->firstItem() }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->kode_akun }}</td>
                                    <td>{{ $row->transaksi }}</td>
                                    <td>{{ $row->marketing_proyek }}</td>
                                    <td><?= 'Rp. ' . number_format($row->biaya, 0, ',', '.') ?></td>
                                    <?php
                                    $total += $row['biaya'];
                                    ?>
                                    @if (auth()->user()->role == 'Admin')
                                        <td>
                                            <a href="{{ url('tampilkandatabm/' . $row->id) }}"
                                                class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete"
                                                data-id="{{ $row->id }}"><i class="bi bi-trash3"></i> Hapus</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            <th colspan="5" class="text-center"><strong>Total</strong></th>
                            <th class="text-center"><b><?= 'Rp. ' . number_format($total_biaya, 0, ',', '.') ?></b></th>
                            <th></th>
                        </tbody>
                    </table>
                    <div class="pull-right mt-3">
                        {{ $bm->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('append-script')
    {{-- Hapus Biaya Marketing --}}
    <script>
        $('.delete').click(function() {
            var bmarketingid = $(this).attr('data-id');
            swal({
                    title: "Apakah Yakin ?",
                    text: "Data dengan id " + bmarketingid + " akan dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/hapus/" + bmarketingid + ""
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
