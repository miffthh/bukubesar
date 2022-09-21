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
            border: 1px solid rgb(19, 18, 18);
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
            color: black;
        }
    </style>
</head>

<body>
    <table id="customers">
        <tr align="center">
            <th colspan="6" rowspan="1"><strong>REKAPITULASI HARGA POKOK PODUKSI</strong></th>
        </tr>
        <tr align="center">
            <th colspan="6" rowspan="1"><strong> PEROLEHAN PROYEK</strong></th>
        </tr>
        <tr align="center">
            <th colspan="6" rowspan="1"><strong> PT. SAVANA MADANI TEKNOLOGI</strong></th>
        </tr>
        <tr></tr>
        <tr>
            <th align="center">No</th>
            <th align="center">Tanggal</th>
            <th align="center">Kode Akun</th>
            <th align="center">Transaksi</th>
            <th align="center">Kode Proyek</th>
            <th align="center">Biaya Proyek</th>
        </tr>
        @php
            $no = 1;
            $total = 0;
        @endphp
        @foreach ($pp as $row)
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->akun->kode_akun }}</td>
                <td>{{ $row->transaksi }}</td>
                <td>{{ $row->dproyek->kode_proyek }}</td>
                <td><?= 'Rp. ' . number_format($row->biaya_proyek, 0, ',', '.') ?></td>
                <?php
                $total += $row['biaya_proyek'];
                ?>

            </tr>
        @endforeach
        <tr>
            <th align="center" colspan="5"><strong>Total</strong></th>
            <th class="text-center"><strong><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></strong></th>
        </tr>
    </table>

</body>

</html>
