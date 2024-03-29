<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Payment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'payments';

    public $orderable = [
        'id',
        'event.name',
        'user.name',
        'paymenttype.descr',
        'amount',
        'payment_date',
        'payment_number',
        'comments',
    ];

    public $filterable = [
        'id',
        'event.name',
        'user.name',
        'paymenttype.descr',
        'amount',
        'payment_date',
        'payment_number',
        'comments',
    ];

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'user_id',
        'paymenttype_id',
        'amount',
        'payment_date',
        'payment_number',
        'comments',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymenttype()
    {
        return $this->belongsTo(Paymenttype::class);
    }

    public function getPaymentDateMmmDdYyyyAttribute()
    {
        return $this->payment_date ? Carbon::parse($this->payment_date)->format('M d,Y') : null;
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function recordIPNPayment(array $dto)
    {
        $payment = Payment::create(
            [
                'user_id' => $dto['user_id'],
                'event_id' => $dto['event_id'],
                'paymenttype_id' => $dto['paymenttype_id'],
                'vendor_id' => $dto['vendor_id'],
                'amount' => $dto['amount'],
                'updated_by' => 368,
            ],
        );

        if($payment->id){
            Log::info('***** Payment made for: '.$payment->user_id);
        }else{
            Log::info('@@@@@ Payment NOT made for: '.$payment->user_id);
        }
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
