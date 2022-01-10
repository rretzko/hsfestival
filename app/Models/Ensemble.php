<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ensemble extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'ensembles';

    public $filterable = [
        'id',
        'user.name',
        'school.name',
        'event.name',
        'name',
        'conductor',
        'ensembletype.descr',
    ];

    public $orderable = [
        'id',
        'user.name',
        'school.name',
        'event.name',
        'name',
        'conductor',
        'ensembletype.descr',
        'auditioned',
    ];

    protected $casts = [
        'auditioned' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'school_id',
        'event_id',
        'name',
        'conductor',
        'ensembletype_id',
        'auditioned',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ensembletype()
    {
        return $this->belongsTo(Ensembletype::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
