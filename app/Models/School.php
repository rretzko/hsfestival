<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'schools';

    public $orderable = [
        'id',
        'user.name',
        'name',
        'address_1',
        'address_2',
        'city',
        'state_abbr',
        'postal_code',
    ];

    public $filterable = [
        'id',
        'user.name',
        'name',
        'address_1',
        'address_2',
        'city',
        'state_abbr',
        'postal_code',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'address_1',
        'address_2',
        'city',
        'state_abbr',
        'postal_code',
    ];

    public function adjudications()
    {
        return $this->hasMany(Adjudication::class);
    }

    public function getShortnameAttribute()
    {
        $abbrs = [
            'Central High School' => 'CHS',
            'Memorial High School' => 'MHS',
            'Regional High School' => 'RHS',
            'High School' => 'HS',
        ];

        $str = $this->name;

        foreach($abbrs AS $long => $abbr){

            $str = str_replace($long, $abbr, $str);
        }

        return $str;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
