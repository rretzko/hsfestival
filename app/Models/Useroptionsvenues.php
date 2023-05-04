<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useroptionsvenues extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'preference', 'user_id', 'venue_id'];

    protected $table = 'useroptionsvenues';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getPreferenceDescrAttribute()
    {
        $descr = [
          'Cannot participate on this date',
          'First Choice',
          'Second Choice',
          'Third Choice',
          'Fourth Choice',
        ];

        return $descr[$this->preference];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
