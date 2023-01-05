@props([
    'payments'
])
<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="flex pr-4" style="justify-content: end; font-size: 0.8rem;">
            <a href="{{ route('eventmanagement.payments.export') }}">CSV</a>
        </div>
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-white">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">###</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">School</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Payment Number</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <!-- Odd row -->
                @forelse($payments AS $payment)
                    <tr class="@if($loop->odd) bg-blueGray-200 @endif">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $loop->iteration }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $payment->lastUpdateDateMmmDdYyyy() }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $payment->user->name }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $payment->school->name }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            ${{ number_format($payment->amount, 2) }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $payment->payment_number }}
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="{{ route('eventmanagement.sightreadings.payments.edit',['sightreadingPayment' => $payment]) }}"
                               class="">
                                <button class="bg-indigo-500 px-2 rounded-full ">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="{{ route('eventmanagement.sightreadings.payments.remove',['sightreadingPayment' => $payment]) }}"
                               class="">
                                <button class="bg-red-500 px-2 rounded-full ">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-black text-center">No payments found</td></tr>
                @endforelse
                <!-- More people... -->
                </tbody>
            </table>
        </div>
    </div>
</div>
