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
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Perkiraan</th>
            <th>Reff</th>
            <th>Kode Akun</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Balance</th>
        </tr>
        @php
            $no = 1;
            $total = 0;
            $total_debit = 0;
            $total_kredit = 0;
            $balance = 0;
        @endphp
        @foreach ($bb as $row)
            <tr align="center">
                <th scope="row">{{ $no++ }}</th>
                <th>{{ $row->tanggal }}</th>
                <th>{{ $row->nama_perkiraan }} </th>
                <th>{{ $row->reff }}</th>
                <th>{{ $row->kode_akun }}</th>
                <th><?= 'Rp. ' . number_format($row->debit, 0, ',', '.') ?></th>
                <th><?= 'Rp. ' . number_format($row->kredit, 0, ',', '.') ?></th>
                @php
                    $debit = $row['debit'];
                    $kredit = $row['kredit'];
                    $balance = $balance + $row['debit'] - $row['kredit'];
                @endphp
                <th><?= 'Rp. ' . number_format($balance, 0, ',', '.') ?></th>                
                @php
                $total += $balance;
                $total_debit += $debit;
                $total_kredit += $kredit;
                @endphp
            </tr>
        @endforeach        
        <tr>
            <th colspan="5"><strong>Total</strong></th>            
            <th><strong><?= 'Rp. ' . number_format($total_debit, 0, ',', '.') ?></strong></th>
            <th><strong><?= 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?></strong></th>            
            <th></th>            
        </tr>
    </table>
</body>
</html>