<?php

namespace App\Models\Sightreadings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceDue extends Model
{
    use HasFactory;

    private $balance_due;
    private $user_id;

    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;

        $this->init();
    }

    public function balanceDue(): float
    {
        return $this->balance_due;
    }

/** END OF PUBLIC FUNCTIONS **************************************************/

    private function init(): void
    {
        $per_pdf = 50; //price per pdf
        $pdf_count = SightreadingOrder::where('user_id', $this->user_id)->count();
        $due = ($pdf_count * $per_pdf);
        $paid = SightreadingPayment::where('user_id', $this->user_id)->sum('amount');
        $this->balance_due = ($due - $paid);
    }
}
