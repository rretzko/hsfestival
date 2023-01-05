<?php

namespace App\Exports;

use App\Models\Sightreadings\SightreadingPayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SightreadingPaymentsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SightreadingPayment::all();
    }

    public function headings(): array
    {
        return [
            'teacher',
            'school',
            'amount',
            'payment number'
        ];
    }

    public function map($sightreadingPayment): array
    {
        return [
          $sightreadingPayment->userName(),
          $sightreadingPayment->schoolName(),
          $sightreadingPayment->amount,
          $sightreadingPayment->vendor_id,
        ];
    }
}
