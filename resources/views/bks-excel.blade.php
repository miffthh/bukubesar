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
        <tr>
            <th colspan="11" rowspan="2"><strong>BUKU KAS HARIAN <br>
                    PT. SAVANA MADANI TEKNOLOGI</strong></th>
        </tr>
        <tr>
        </tr>
        <tr></tr>
        <tr>
            <th align="center">No</th>
            <th align="center">Tanggal</th>
            <th align="center">Perkiraan</th>
            <th align="center">Reff</th>
            <th align="center">Kode Akun</th>
            <th align="center">Debit</th>
            <th align="center">Kredit</th>
            <th align="center">Balance</th>
            <th align="center">Kode Proyek</th>
            <th align="center">Nama Perkiraan</th>
            <th align="center">Group</th>
        </tr>
        @php
            $no = 1;
            $total = 0;
            $total_debit = 0;
            $total_kredit = 0;
            $balance = 0;
        @endphp
        @foreach ($bk as $row)
            <tr>
                <td scope="row">{{ $no++ }}</td>
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
                <?php
                $total += $balance;
                $total_debit += $debit;
                $total_kredit += $kredit;
                ?>

            </tr>
        @endforeach
        <tr>
            <th align="center" colspan="5"><strong>Total</strong></th>
            {{-- <th class="text-center"><strong> Total </strong></th> --}}
            <th><strong><?= 'Rp. ' . number_format($total_debit, 0, ',', '.') ?></strong></th>
            <th><strong><?= 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?></strong></th>
            {{-- <th class="text-center">Rp. {{ $total }}</th> --}}
            <th></th>

        </tr>

    </table>

</body>

</html>
