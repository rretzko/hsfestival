<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlaquesExport implements FromArray, WithHeadings
{
    private $dto;

    public function __construct(array $dto)
    {
        $this->dto = $dto;
    }
    public function array(): array
    {
        return $this->dto;
    }

    public function headings(): array
    {
        return [
          '###',
          'school',
          'ensemble',
          'conductor',
        ];
    }
}
