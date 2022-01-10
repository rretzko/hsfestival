<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'memberships';

    public $orderable = [
        'id',
        'user.name',
        'org',
        'expiration_date',
        'membershiptype.org',
    ];

    public $filterable = [
        'id',
        'user.name',
        'org',
        'expiration_date',
        'membershiptype.org',
    ];

    protected $fillable = [
        'user_id',
        'org',
        'expiration_date',
        'membershiptype_id',
    ];

    protected $dates = [
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExpirationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setExpirationDateAttribute($value)
    {
        $this->attributes['expiration_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function membershiptype()
    {
        return $this->belongsTo(Membership::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
