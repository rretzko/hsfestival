<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'events';

    public $orderable = [
        'id',
        'name',
        'short_name',
        'start_datetime',
        'end_datetime',
    ];

    public $filterable = [
        'id',
        'name',
        'short_name',
        'start_datetime',
        'end_datetime',
    ];

    protected $fillable = [
        'name',
        'short_name',
        'event_type',
        'start_datetime',
        'end_datetime',
    ];

    protected $dates = [
        'start_datetime',
        'end_datetime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @deprecated 2022-06-21 replaced with CurrentEvent object
     * @return mixed
     */
    public static function currentEvent()
    {
        return Event::where('start_datetime', '<=', Carbon::now())
            ->where('end_datetime', '>=', Carbon::now())
            ->first();
    }

    public function adjudications()
    {
        return $this->hasMany(Adjudication::class);
    }

    public function adjudicators()
    {
        return $this->belongsToMany(Adjudicator::class);
    }

    public function getStartDatetimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setStartDatetimeAttribute($value)
    {
        $this->attributes['start_datetime'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndDatetimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEndDatetimeAttribute($value)
    {
        $this->attributes['end_datetime'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }


    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
