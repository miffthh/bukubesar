<?php

namespace App\Exports;

use App\Models\Bmarketing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BmarketingExport implements FromView, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    
    private $bm;

    public function __construct()
    {
        $this->bm = Bmarketing::all();
    }


    public function view(): View
    {
        return view('bmarketing-excel', [
            'bm' => $this->bm
            // $sheet->mergeCells('A1:E1');
        ]);
    }

    public function headings(): array
    {
        return [
            'No', 'Tanggal', 'Kode Akun', 'Transaksi', 'Kode Proyek', 'Marketing Proyek', 'Biaya', 'Created at', 'Updated at'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            5    => ['font' => ['bold' => true]],


            // // Styling a specific cell by coordinate.
            // '2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}
