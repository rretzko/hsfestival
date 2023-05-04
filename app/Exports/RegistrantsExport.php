<?php

namespace App\Exports;

use App\Models\CurrentEvent;
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
        return CurrentEvent::users();
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'cell phone',
            'school',
            'first venue',
            'first date',
            'second venue',
            'second date',
            'third venue',
            'third date',
            'fourth venue',
            'fourth date',
            'permissions',
            //'plaque',
            'ensembles#',
            'ensembles'
        ];
    }

    /**
     * @param $registrant //User model
     * @return array
     */
    public function map($registrant): array
    {
        $ensembles = [];
        foreach($registrant->ensembles AS $ensemble){
            $ensembles[] = $ensemble->name;
        }

        sort($ensembles);

        $a = [
            $registrant->name,
            $registrant->email,
            $registrant->phones->where('phonetype_id',1)->first() ? $registrant->phones->where('phonetype_id',1)->first()->formatPhone() : '',
            $registrant->school->name,
            $registrant->currentFirstChoiceVenue ? $registrant->currentFirstChoiceVenue->venue->shortname : 'None found',
            $registrant->currentFirstChoiceVenue ? $registrant->currentFirstChoiceVenue->venue->startDateMdy : 'None found',
            $registrant->currentSecondChoiceVenue ? $registrant->currentSecondChoiceVenue->venue->shortname : 'None found',
            $registrant->currentSecondChoiceVenue ? $registrant->currentSecondChoiceVenue->venue->startDateMdy : 'None found',
            $registrant->currentThirdChoiceVenue ? $registrant->currentThirdChoiceVenue->venue->shortname : 'None found',
            $registrant->currentThirdChoiceVenue ? $registrant->currentThirdChoiceVenue->venue->startDateMdy : 'None found',
            $registrant->currentFourthChoiceVenue ? $registrant->currentFourthChoiceVenue->venue->shortname : 'None found',
            $registrant->currentFourthChoiceVenue ? $registrant->currentFourthChoiceVenue->venue->startDateMdy : 'None found',
            $registrant->userOptionPermission ? 'Y' : 'N',
            //$registrant->userOptionPlaque ? 'Y' : 'N',
            $registrant->ensembleCount,
        ];

        return array_merge($a, $ensembles);
    }
}
