<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
