<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'first','last','school_id', 'vaccinationtype_id'];

    public function getFullnameAlphaAttribute()
    {
        return $this->last.', '.$this->first;
    }

    public function vaccinationtype()
    {
        return $this->belongsTo(Vaccinationtype::class);
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
