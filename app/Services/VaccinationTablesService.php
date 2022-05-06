<?php

namespace App\Services;

use App\Models\Event;
use App\Models\School;
use \App\Models\Vaccination;

class VaccinationTablesService
{
    private $event;
    private $eventid;
    private $rows;
    private $schools;
    private $tables;
    private $vaccinations;

    public function __construct(Event $event)
    {
        $this->event = $event;
        $this->eventid = $event->id;
        $this->rows = [];
        $this->schools = [];
        $this->tables = [];
        $this->vaccinations = collect();

        $this->init();
    }

    public function tables(): array
    {
        return $this->tables;
    }

    /** END OF PUBLIC FUNCTIONS +++++++++++++++++++++++++++++++++++++++++++*/

    private function columnHeaders() : string
    {
        $str = '<tr>';

        $str .= '<th>###</th>';
        $str .= '<th>Name</th>';
        $str .= '<th>Status</th>';

        $str .= '</tr>';

        return $str;
    }

    private function init()
    {
        $this->isolateSchools();

        $this->makeTables();
    }

    private function isolateSchools()
    {
        foreach(School::orderBy('name')->get() AS $school){

            $vaccinations = Vaccination::where('school_id', $school->id)
                ->where('event_id', $this->eventid)
                ->orderBy('last')
                ->orderBy('first')
                ->get();

            if($vaccinations->count()){

                $this->tables[] = $this->makeTable($vaccinations);
            }
        }
    }

    private function makeTable($vaccinations): string
    {
        $str = '<table class="vaccinations-table">';

        $str .= '<caption>'.$vaccinations[0]->school->name.'</caption>';

        $str .= $this->columnHeaders();

        $str .= $this->tableRows($vaccinations);

        $str .= '</table>';

        return $str;
    }

    private function makeTables()
    {
        //early exit
        if(! count($this->schools)){ return false;}

        foreach($this->schools AS $vaccinations){

            $this->tables[] .= $this->makeTable($vaccinations);
        }
    }

    private function tableRows($vaccinations): string
    {
           $str = '';

           foreach($vaccinations AS $key => $vaccination)
           {
               if($key && (! ($key % 45))){

                   $str .= '</table>';

                   $str .= '<div class="pagebreak"></div>';

                   $str .= '<table class="vaccinations-table">';

                   $str .= '<caption>'.$vaccinations[0]->school->name.' (con\'t) </caption>';

                   $str .= $this->columnHeaders();
               }

               //highlight every fifth row
               $backgroundcolor = (($key + 1) % 5)
                    ? 'white'
                    : 'rgba(0,255,0,0.1)';

               $str .= '<tr style="background-color: '.$backgroundcolor.';">';

               $str .= '<td>'.($key + 1).'</td>';
               $str .= '<td>'.$vaccination->fullnameAlpha.'</td>';
               $str .= '<td>'.$vaccination->vaccinationtype->descr.'</td>';

               $str .= '</tr>';
           }

           return $str;
    }

}
