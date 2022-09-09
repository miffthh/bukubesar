<?php

namespace App\Exports;

use App\Models\Bbbadm;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BbadmExport implements FromView, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // use Exportable;
    private $bb;

    public function __construct()
    {
        $this->bb = Bbbadm::all();
    }


    public function view(): View
    {
        return view('bbbadm-excel', [
            'bb' => $this->bb
        ]);
    }

    public function headings(): array
    {
        return [
            'No', 'Tanggal', 'Nama Perkiraan', 'Reff', 'Kode Akun', 'Debit', 'Kredit', 'Balance'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        
        return [
            
            // Style the first row as bold text.
            5    => ['font' => ['bold' => true]],

            '1:3'  => ['alignment' => ['horizontal' =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,]],

            '23'  => ['alignment' => ['horizontal' =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,]],
            
            
            // Styling a specific cell by coordinate.
            // '2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}
