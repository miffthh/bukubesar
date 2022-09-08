<?php

namespace App\Exports;

use App\Models\Pproyek;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PproyekExport implements FromView, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    
    private $pp;

    public function __construct()
    {
        $this->pp = Pproyek::all();
    }


    public function view(): View
    {
        return view('pproyek-excel', [
            'pp' => $this->pp
            // $sheet->mergeCells('A1:E1');
        ]);
    }
    // public function collection()
    // {
    //     // $pp = DB::table('pproyek')
    //     // ->join('akun','akun.id',)
    //     return Pproyek::all();
    // }

    public function headings(): array
    {
        return [
            'No', 'Tanggal', 'Kode Akun', 'Transaksi', 'Kode Proyek', 'Biaya Proyek', 'Created at', 'Updated at'
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
