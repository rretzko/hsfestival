<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjudicator extends Model
{
    use HasFactory;

    protected $fillable = ['first', 'from', 'last', 'title'];

    public function adjudications()
    {
        return $this->hasMany(Adjudication::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function getFullnameAlphaAttribute()
    {
        return $this->last.', '.$this->first.' ('.$this->title.')';
    }
}
