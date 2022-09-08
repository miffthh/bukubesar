@extends('layout.template')

@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body mt-3">
                <h3>Halaman Buku Kas Harian</h3>
                <hr>
                <h6>Data Buku Kas Harian</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            @if (auth()->user()->role == 'Admin')
                <a href="/tambahdatabks" class="btn btn-primary mb-3">Tambah Data</a>
            @endif
            <a href="/exporrtpdf" target="_blank" class="btn btn-info mb-3">Export PDF </a>
            <a href="/cetakkform" class="btn btn-info mb-3 ">Export PDF Per Tgl </a>
            <a href="/exporrtexcel" target="_blank" class="btn btn-info mb-3">Export Excel </a>
            <a href="/bks" class="btn btn-info mb-3">Refresh</a>
            <div class="container row col-lg-6 md-4 ms-auto">
                <form action="/periodee" method="get" class="d-flex">
                    <input type="date" name="tgl_mulai" class="form-control datpicker mb-2 ">
                    <input type="date" name="tgl_selesai" class="form-control datepicker ms-2 mb-2 ">
                    <button type="submit" name="filter_tgl" class="btn btn-success ms-2 mb-2 ">Filter</button>
                </form>
            </div>
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
                                $total_debit = 0;
                                $total_kredit = 0;
                            @endphp
                            @foreach ($bk as $index => $row)
                                <tr align="center">
                                    <th scope="row">{{ $index + $bk->firstItem() }}</th>
                                    <th>{{ $row->tanggal }}</th>
                                    <th>{{ $row->perkiraan }} </th>
                                    <th>{{ $row->reff }}</th>
                                    <th>{{ $row->kode_akun }}</th>
                                    <th><?= 'Rp. ' . number_format($row->debit, 0, ',', '.') ?></th>
                                    <th><?= 'Rp. ' . number_format($row->kredit, 0, ',', '.') ?></th>
                                    @php
                                        $debit = $row['debit'];
                                        $kredit = $row['kredit'];
                                    @endphp
                                    <th><?= 'Rp. ' . number_format($row->balance, 0, ',', '.') ?></th>
                                    <th>{{ $row->kode_proyek }}</th>
                                    <th>{{ $row->nama_perkiraan }}</th>
                                    <th>{{ $row->nama_group }}</th>
                                    <?php
                                    // $total += $balance;
                                    $total_debit += $debit;
                                    $total_kredit += $kredit;
                                    ?>
                                    @if (auth()->user()->role == 'Admin')
                                        <th>
                                            <a href="{{ url('tampilkandatabks/' . $row->id) }}"
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
                            {{-- <th class="text-center">Rp. {{ $total }}</th> --}}
                            <th>
                            <th>
                            <th>
                            <th>
                            <th>

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



            {{-- <script type="text/javascript">
    function isi_otomatis(){
        var nim = $("#id").val();
        $.ajax({
            url: 'ajax.php',
            data:"id="+id ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#tanggal').val(obj.tanggal);
            $('#perkiraan').val(obj.perkiraan);
            $('#reff').val(obj.reff);
            $('#kode_akun').val(obj.kode_akun);
            $('#debit').val(obj.debit);
            $('#kredit').val(obj.kredit);
            $('#balance').val(obj.balance);
            $('#kode_proyek').val(obj.kode_proyek);
            $('#nama_perkiraan').val(obj.nama_perkiraan);
            $('#nama_group').val(obj.nama_group);
        });
    }
</script> --}}

            {{-- <script type="text/javascript">
    $('.cari').select2({
      placeholder: 'Cari...',
      ajax: {
        url: '/cari',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.email,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });
  
  </script> --}}
            {{-- <script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        
      $("input[name='id']").keypress(function(e){
         
         if(e.which == 13){
           e.preventDefault();
           var id = $(this).val();
           var url = "{{ url('/tampilkandatabks') }}"+'-'+id;
     
           $.ajax({
             type:'get',
             dataType:'json',
             url:url,
             success:function(data){
               console.log(data);
             
             }
           });
         }
       })
    })  
</script> --}}
        @endpush
