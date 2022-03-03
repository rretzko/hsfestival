<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['building', 'end', 'event_id','name','shortname', 'start'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * @return string Day-of-week, Month day, Year ex. Tuesday, February 14, 2022
     */
    public function getStartDateDmdyAttribute()
    {
        return Carbon::parse($this->start)->format('l, M d, Y');
    }

    /**
     * @return string Month day, Year ex. February 14, 2022
     */
    public function getStartDateMdyAttribute()
    {
        return Carbon::parse($this->start)->format('M d, Y');
    }
}