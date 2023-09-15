<?php

namespace App\Exports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ItemssExport implements FromQuery, WithMapping, WithHeadings
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
            'Name',
            'Price',
            'Category',
        ];
    }
}
