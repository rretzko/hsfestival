<?php

namespace App\Exports;

use App\Models\Sightreadings\SightreadingOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SightreadingOrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SightreadingOrder::orderByDesc('updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'teacher',
            'school',
            'example',
            'date'
        ];
    }

    public function map($sightreadingOrder): array
    {
        return [
            $sightreadingOrder->user->name,
            $sightreadingOrder->school->name,
            $sightreadingOrder->sightreading->year_of,
            $sightreadingOrder->updated_at,
        ];
    }
}
