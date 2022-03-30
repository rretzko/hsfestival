<?php

namespace App\Exports;

use App\Models\Event;
use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PaymentsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payment::where('event_id', Event::currentEvent()->id)
            ->orderByDesc('payment_date')
            ->get();
    }

    public function headings(): array
    {
        return [
            'date',
            'name',
            'type',
            'amount',
            'number',
            'comments',
            'created_at',
            'updated_at',
        ];
    }

    public function map($payment): array
    {
        return [
            $payment->payment_date,
            \App\Models\User::find($payment->user_id)->name,
            \App\Models\Paymenttype::find($payment->paymenttype_id)->descr,
            number_format($payment->amount, 2),
            $payment->payment_number,
            $payment->comments,
            $payment->created_at,
            $payment->updated_at,
        ];
    }
}
