<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11pt;
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
    <h4 align="center">BUKU KAS HARIAN <br>
        PT. SAVANA MADANI TEKNOLOGI</h4>
    <table id="customers">
        <tr>
            <th>No</th>
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
        </tr>
        @php
            $no = 1;
            $total = 0;
            $total_debit = 0;
            $total_kredit = 0;
            $balance = 0;
        @endphp
        @foreach ($bk as $row)
            <tr align="center">
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
            <th colspan="5"><strong>Total</strong></th>
            {{-- <th class="text-center"><strong> Total </strong></th> --}}
            <th><strong><?= 'Rp. ' . number_format($total_debit, 0, ',', '.') ?></strong></th>
            <th><strong><?= 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?></strong></th>
            {{-- <th class="text-center">Rp. {{ $total }}</th> --}}
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>

    <br>
    <br>
    <p style="font-size:21px" align="right">Staff Penanggung Jawab</p>
    <br>
    {{-- <br> --}}
    <p style="font-size:20px" align="right"><b>{{ Auth::user()->name }}</b></p>
</body>

</html>
