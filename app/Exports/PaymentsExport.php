<?php

namespace App\Exports;

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
        return Payment::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'amount',
            'type',
            'number',
            'date',
            'comments',
            'created_at',
            'updated_at',
        ];
    }

    public function map($payment): array
    {
        return [
            $payment->id,
            \App\Models\User::find($payment->user_id)->name,
            number_format($payment->amount, 2),
            \App\Models\Paymenttype::find($payment->paymenttype_id)->descr,
            $payment->payment_number,
            $payment->payment_date,
            $payment->comments,
            $payment->created_at,
            $payment->updated_at,
        ];
    }
}
