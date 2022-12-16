<?php

namespace App\Models\Sightreadings;

use App\Models\School;
use App\Models\Sightreading;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SightreadingOrder extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['school_id','sightreading_id','user_id'];
    protected $with = ['school','sightreading','user'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function sightreading()
    {
        return $this->belongsTo(Sightreading::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
