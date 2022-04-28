<?php

namespace App\Imports;

use App\Models\Event;
use App\Models\Vaccination;
use App\Models\Vaccinationtype;
use Maatwebsite\Excel\Concerns\ToModel;

class VaccinationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $eventid = Event::currentEvent()->id;
        $schoolid = auth()->user()->school->id;
        $vaccinationtypeid = $this->vaccinationTypeId($row[2]);

        if($vaccinationtypeid) {
            return new Vaccination([
                'event_id' => $eventid,
                'school_id' => $schoolid,
                'first' => $row[0],
                'last' => $row[1],
                'vaccinationtype_id' => $vaccinationtypeid,
            ]);
        }
    }

    private function vaccinationTypeId($descr)
    {
        if(Vaccinationtype::where('descr', '=', $descr)->exists()) {

            return Vaccinationtype::where('descr', '=', $descr)->first()->id;
        }

        return false;
    }
}
