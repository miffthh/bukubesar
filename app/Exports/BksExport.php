<?php

namespace App\Exports;

use App\Models\Bks;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class BksExport implements FromView, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Bks::all();
    // }

    use Exportable;
    private $bk;

    public function __construct()
    {
        $this->bk = Bks::all();
    }


    public function view(): View
    {
        return view('bks-excel', [
            'bk' => $this->bk
            // $sheet->mergeCells('A1:E1');
        ]);
    }
    public function headings(): array
    {
        return [
            'No', 'Tanggal', 'Perkiraan', 'Reff', 'Kode Akun', 'Debit', 'Kredit', 'Balance', 'Kode Proyek', 'Nama Perkiraan', 'Nama Group', 'Created at', 'Updated at'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            4    => ['font' => ['bold' => true]],


            // // Styling a specific cell by coordinate.
            // '2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}
