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

    <h4 align="center">REKAPITULASI BUKU BESAR <br>
        BIAYA MARKETING PROYEK <br>
        PT. SAVANA MADANI TEKNOLOGI</h4>

    <table id="customers">
        <thead class="table-info">
            <tr align="center">
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
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->kode_akun }}</td>
                <td>{{ $row->transaksi }}</td>
                <td>{{ $row->marketing_proyek }}</td>
                <td><?= 'Rp. ' . number_format($row->biaya, 0, ',', '.') ?></td>
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
