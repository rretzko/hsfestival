<?php

namespace App\Http\Livewire\Payment;

use App\Models\Event;
use App\Models\Payment;
use App\Models\Paymenttype;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Payment $payment;

    public array $listsForFields = [];

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->payment->save();

        return redirect()->route('admin.payments.index');
    }

    protected function rules(): array
    {
        return [
            'payment.event_id' => [
                'integer',
                'exists:events,id',
                'required',
            ],
            'payment.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'payment.paymenttype_id' => [
                'integer',
                'exists:paymenttypes,id',
                'required',
            ],
            'payment.amount' => [
                'numeric',
                'required',
            ],
            'payment.payment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'payment.payment_number' => [
                'string',
                'nullable',
            ],
            'payment.comments' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['event']       = Event::pluck('name', 'id')->toArray();
        $this->listsForFields['user']        = User::pluck('name', 'id')->toArray();
        $this->listsForFields['paymenttype'] = Paymenttype::pluck('descr', 'id')->toArray();
    }
}
