<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'inventories';

    public $orderable = [
        'id',
        'inventorytype.descr',
        'name',
        'price',
        'order_by',
    ];

    public $filterable = [
        'id',
        'inventorytype.descr',
        'name',
        'price',
        'order_by',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'inventorytype_id',
        'name',
        'price',
        'order_by',
    ];

    public function inventorytype()
    {
        return $this->belongsTo(Inventorytype::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
