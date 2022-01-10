<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'phones';

    public $orderable = [
        'id',
        'user.name',
        'phonetype.descr',
        'phone',
    ];

    public $filterable = [
        'id',
        'user.name',
        'phonetype.descr',
        'phone',
    ];

    protected $fillable = [
        'user_id',
        'phonetype_id',
        'phone',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phonetype()
    {
        return $this->belongsTo(Phonetype::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
