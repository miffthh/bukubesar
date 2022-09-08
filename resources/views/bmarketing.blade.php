@extends('layout.template
')

@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body mt-3">
                <h3>Halaman Biaya Marketing</h3>
                <hr>
                <h6>Data Biaya Marketing</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            @if (auth()->user()->role == 'Admin')
                <a href="/tambahdatabm" class="btn btn-primary mb-3">Tambah Data</a>
            @endif
            <a href="/exporttpdf" target="_blank" class="btn btn-info mb-3">Export PDF </a>
            <a href="/cetakform" class="btn btn-info mb-3">Export PDF Per Tgl </a>
            <a href="/exporttexcel" target="_blank" class="btn btn-info mb-3">Export Excel </a>
            <a href="/bmarketing" class="btn btn-info mb-3">Refresh</a>            
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="table-info" id="records">
                            <tr align="center">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kode ACC</th>
                                <th>Transaksi</th>
                                <th>Marketing Proyek</th>
                                <th>Biaya</th>
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
                            @foreach ($bm as $index => $row)
                                <tr align="center">
                                    <th scope="row">{{ $index + $bm->firstItem() }}</th>
                                    <th>{{ $row->tanggal }}</th>
                                    <th>{{ $row->kode_akun }}</th>
                                    <th>{{ $row->transaksi }}</th>
                                    <th>{{ $row->marketing_proyek }}</th>
                                    <th><?= 'Rp. ' . number_format($row->biaya, 0, ',', '.') ?></th>
                                    <?php
                                    $total += $row['biaya'];
                                    ?>
                                    @if (auth()->user()->role == 'Admin')
                                        <th>
                                            <a href="{{ url('tampilkandatabm/' . $row->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete"
                                                data-id="{{ $row->id }}">Hapus</a>
                                        </th>
                                    @endif
                                </tr>
                            @endforeach
                            <th colspan="5" class="text-center"><strong>Total</strong></th>
                            <th class="text-center"><b><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></b></th>
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
