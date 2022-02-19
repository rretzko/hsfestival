<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrantsExport implements FromCollection, WithHeadings, WithMapping
{
    private $registrants;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::excludeBots();
    }

    public function headings(): array
    {
        return [
            'name',
            'school',
            'first venue',
            'first date',
            'permissions',
            'plaque',
            'ensembles',
        ];
    }

    public function map($registrant): array
    {
        return [
            $registrant->name,
            $registrant->school->name,
            $registrant->currentFirstChoiceVenue->venue->shortname,
            $registrant->currentFirstChoiceVenue->venue->startDateMdy,
            $registrant->userOptionPermission ? 'Y' : 'N',
            $registrant->userOptionPlaque ? 'Y' : 'N',
            $registrant->ensembleCount,
        ];
    }
}
