<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Report::select('id', 'result', 'date')
        ->orderBy('date', 'desc')
        ->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'result',
            'tanggal'
        ];
    }
}
