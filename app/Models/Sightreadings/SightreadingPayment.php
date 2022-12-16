<?php

namespace App\Models\Sightreadings;

use App\Models\School;
use App\Models\Sightreading;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class SightreadingPayment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['amount','school_id','vendor_id','user_id'];
    protected $with = ['school','sightreading','user'];

    public function recordIPNPayment(array $dto): void
    {Log::info('***** Got to: '.__FUNCTION__);
        $user = User::find($dto['user_id']);

        $payment = SightreadingPayment::create(
            [
                'user_id' => $user->id,
                'school_id' => $user->school->id,
                'vendor_id' => $dto['vendor_id'],
                'amount' => $dto['amount'],
            ],
        );

        if($payment->id){
            Log::info('***** Sightreading Payment made for: '.$payment->user_id);
        }else{
            Log::info('@@@@@ Sightreading Payment NOT made for: '.$payment->user_id);
        }
    }
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
