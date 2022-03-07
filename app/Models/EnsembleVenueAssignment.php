<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnsembleVenueAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['ensemble_id','timeslot', 'venue_id'];
}
