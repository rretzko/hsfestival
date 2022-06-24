<?php

namespace App\Services;


use App\Models\Adjudication;
use App\Models\School;

class AdjudicationsTable
{
    private $adjudications;
    private $headers;
    private $ids;
    private $school;
    private $table;

    public function __construct(School $school)
    {
        $this->school = $school;
        $this->init();
    }

    public function table()
    {
        return $this->table;
    }

/** END OF PUBLIC FUNCTIONS **************************************************/

    private function buildTable(): string
    {
        $str = '<table>';
        $str .= '<thead>';
        $str .= $this->headers();
        $str .= '</thead>
                <tbody>';
        $str .= $this->rows();
        $str .= '</tbody>
                </table>';

        return $str;
    }

    private function ensembleHeader($adjudication) : string
    {
        $str = '';

        if(empty($this->ids[$adjudication->event_id]) || (! in_array($adjudication->ensemble_id, $this->ids[$adjudication->event_id]))) {

            $this->ids[$adjudication->event_id][] = $adjudication->ensemble_id;
            $str .= '<tr class="ensembleHeader ">'
                . '<th></th>'
                . '<th colspan="'.(count($this->headers) - 1).'" class="text-left">'
                .  $adjudication->ensemble->name
                . '</th></tr>';
        }

        return $str;
    }

    /**
     * Prime $ids array keys with event_id
     * Return event header if event_id is not included in $ids
     * @param $adjudication
     * @return string
     */
    private function eventHeader($adjudication) : string
    {
        $str = '';

        if(empty($this->ids) || (! array_key_exists($adjudication->event_id, $this->ids))) {

            $this->ids[$adjudication->event_id] = [];
            $str .= '<tr class="eventHeader"><th colspan="'.count($this->headers).'">' . $adjudication->event->name . '</th></tr>';
        }

        return $str;
    }

    private function headers() : string
    {
        $str = '<tr>';

        foreach($this->headers AS $header){

            $str .='<th>'.$header.'</th>';
        }

        $str .= '</tr>';

        return $str;
    }

    private function init()
    {
        $this->adjudications = Adjudication::where('school_id', $this->school->id)
            ->orderByDesc('event_id')
            ->orderBy('ensemble_id')
            ->orderBy('adjudicator_id')
            ->get();

        $this->headers = ['###','Adjudicator','Player'];

        $this->ids = [];

        $this->table = $this->styles();

        $this->table .= $this->buildTable();
    }

    private function rows() : string
    {
        $cntr = 0;
        $ensembles = [];
        $str = '';

        foreach($this->adjudications AS $adjudication){

            $cntr++;

            $str .= $this->eventHeader($adjudication);

            $str .= $this->ensembleHeader($adjudication);

            //load $ensembles with unique ensemble_id
            if(! in_array($adjudication->ensemble_id, $ensembles)){ $ensembles[] = $adjudication->ensemble_id;}

            //alternate row shading by ensemble
            //determine row shading by count of $ensembles
            $evenodd = (count($ensembles) % 2) ? 'odd' : 'even';

            $str .= '<tr class="'.$evenodd.'">';

            $str .= '<td>'.$cntr.'</td>';
            $str .= '<td style="text-align: left;">'
                . $adjudication->adjudicator->fullNameAlpha
                . (($adjudication->part > 1) ? ' ['.$adjudication->part.']' : "")
                . '</td>';
            $str .= '<td style="padding: 0.25rem;">'.$adjudication->mp3Player.'</td>';

            $str .= '</tr>';
        }

        return $str;
    }

    private function styles() : string
    {
        $str = '<style>';

        $str .= 'table{background-color: white; border-collapse: collapse; color: black; margin: auto; }';
        $str .= 'td,th{color: black; text-align: center; border: 1px solid black; padding: 0 0.25rem;}';
        $str .= '.ensembleHeader{background-color: rgba(0,0,0,0.1);}';
        $str .= '.even{background-color: rgba(0,255,0,0.1);}';
        $str .= '.eventHeader, .eventHeader th{background-color: black; color: white;}';

        $str .= '</style>';

        return $str;
    }
}
