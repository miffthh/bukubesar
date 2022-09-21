<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <table>
        <tr>
            <th colspan="8" rowspan="1"><strong>BUKU BESAR</strong></th>
        </tr>
        <tr>
            <th colspan="8" rowspan="1"><strong>BIAYA ADMINISTRASI DAN UMUM</strong></th>
        </tr>
        <tr>
            <th colspan="8" rowspan="1"><strong>PT. SAVANA MADANI TEKNOLOGI</strong></th>
        </tr>
        <tr></tr>
        <tr>
            <th align="center">No</th>
            <th align="center">Tanggal</th>
            <th align="center">Nama Perkiraan</th>
            <th align="center">Reff</th>
            <th align="center">Kode Akun</th>
            <th align="center">Debit</th>
            <th align="center">Kredit</th>
            <th align="center">Balance</th>
        </tr>
        @php
            $no = 1;
            $total = 0;
            $total_debit = 0;
            $total_kredit = 0;
            $balance = 0;
        @endphp
        @foreach ($bb as $row)
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->nama_perkiraan }} </td>
                <td>{{ $row->reff }}</td>
                <td>{{ $row->kode_akun }}</td>
                <td><?= 'Rp. ' . number_format($row->debit, 0, ',', '.') ?></td>
                <td><?= 'Rp. ' . number_format($row->kredit, 0, ',', '.') ?></td>
                @php
                    $debit = $row['debit'];
                    $kredit = $row['kredit'];                    
                @endphp
                <td><?= 'Rp. ' . number_format($row->balance, 0, ',', '.') ?></td>
                @php
                    $total += $balance;
                    $total_debit += $debit;
                    $total_kredit += $kredit;
                @endphp
            </tr>
        @endforeach
        <tr>
            <th align="center" colspan="5"><strong>Total</strong></th>
            <th><strong><?= 'Rp. ' . number_format($total_debit, 0, ',', '.') ?></strong></th>
            <th><strong><?= 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?></strong></th>
            <th></th>
        </tr>
    </table>
</body>

</html>
