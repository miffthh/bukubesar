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
                <th align="center">No</th>
                <th align="center">Tanggal</th>
                <th align="center">Kode ACC</th>
                <th align="center">Transaksi</th>
                <th align="center">Marketing Proyek</th>
                <th align="center">Biaya</th>
            </tr>
        </thead>
        @php
        $no = 1;
            $total = 0;
        @endphp
        @foreach ($bm as $row)
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->kode_akun }}</td>
                <td>{{ $row->transaksi }}</td>
                <th>{{ $row->marketing_proyek }}</th>
                <td><?= 'Rp. ' . number_format($row->biaya, 0, ',', '.') ?></td>
                @php
                    $total += $row['biaya'];
                @endphp                
            <tr>
                <th align="center" colspan="5"><strong>Total</strong></th>
                <th class="text-center"><strong><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></strong></th>
            </tr>
        @endforeach
        <tr>

        </tr>
    </table>

</body>

</html>
