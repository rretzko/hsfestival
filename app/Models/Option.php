<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'options';

    public $orderable = [
        'id',
        'optiontype.descr',
        'descr',
        'label_default',
        'label_alternate',
    ];

    public $filterable = [
        'id',
        'optiontype.descr',
        'descr',
        'label_default',
        'label_alternate',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'optiontype_id',
        'descr',
        'label_default',
        'label_alternate',
    ];

    public function optiontype()
    {
        return $this->belongsTo(Optiontype::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
