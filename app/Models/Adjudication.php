<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Adjudication extends Model
{
    use HasFactory;

    protected $fillable = [
        'adjudicator_id',
        'ensemble_id',
        'event_id',
        'part',
        'path',
        'school_id',
    ];

    public function adjudicator()
    {
        return $this->belongsTo(Adjudicator::class);
    }

    public function ensemble()
    {
        return $this->belongsTo(Ensemble::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getMp3PlayerAttribute()
    {
        $src = Storage::disk('spaces')->url($this->path);

        $str = '<audio controls style="border: 1px solid black; border-radius: 1.5rem;">';
        $str .= '<source src="'.$src.'" type="audio/mpeg" >';
        $str .= 'Your browser does not support the audio element';
        $str .= '</audio>';

        return $str;
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
