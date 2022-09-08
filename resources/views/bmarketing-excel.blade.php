<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid rgb(0, 0, 0);
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 11px;
            padding-bottom: 11px;
            text-align: center;
            background-color: white;
            color: rgb(0, 0, 0);
        }
    </style>
</head>

<body>

    <table id="customers">
        <thead class="table-info">        
            <tr>
                <th colspan="6" rowspan="1"><strong>REKAPITULASI BUKU BESAR</strong></th>
            </tr>
            <tr>
                <th colspan="6" rowspan="1"><strong>BIAYA MARKETING PROYEK</strong></th>                   
            </tr> 
            <tr>
                <th colspan="6" rowspan="1"><strong>PT. SAVANA MADANI TEKNOLOGI</strong></th>
            </tr>
            <tr></tr>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode ACC</th>
                <th>Transaksi</th>
                <th>Marketing Proyek</th>
                <th>Biaya</th>
            </tr>
        </thead>
        @php
            $no = 1;
            $total = 0;
        @endphp
        @foreach ($bm as $row)
            <tr align="center">
                <th scope="row">{{ $no++ }}</th>
                <th>{{ $row->tanggal }}</th>
                <th>{{ $row->kode_akun }}</th>
                <th>{{ $row->transaksi }}</th>
                <th>{{ $row->marketing_proyek }}</th>
                <th><?= 'Rp. ' . number_format($row->biaya, 0, ',', '.') ?></th>
                <?php
                $total += $row['biaya'];
                ?>
            </tr>
        @endforeach
        <tr>
            <th colspan="5"><strong>Total</strong></th>
            <th class="text-center"><strong><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></strong></th>
        </tr>
    </table>

</body>

</html>
