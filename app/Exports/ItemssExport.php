<?php

namespace App\Exports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemssExport implements FromQuery, WithMapping, WithHeadings, WithStyles
{
    use Exportable;

    public function __construct($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Items::query()->where('category_id', $this->category_id);
    }

    public function map($items): array
    {
        return [
            $items->name,
            $items->price,
            $items->category->name
        ];
    }
    public function headings(): array
    {
        return [
            ['', ''],
            ['', 'Second row'],
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('B2:D3');
        $sheet->mergeCells('E2:G2');
        $sheet->mergeCells('E3:G3');
        $sheet->mergeCells('H2:X3');
        $sheet->mergeCells('Y2:Z2');
        $sheet->mergeCells('Y3:Z3');
    }
}
