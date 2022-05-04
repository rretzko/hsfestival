<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnsembleVenueAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['ensemble_id','timeslot_id', 'venue_id'];

    protected $with = ['ensemble','timeslot', 'venue'];

    public function ensemble()
    {
        return $this->belongsTo(Ensemble::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
