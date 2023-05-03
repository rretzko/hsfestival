@props([
    'plaques'
])
<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="flex pr-4 space-x-2" style="justify-content: end; font-size: 0.8rem;">
            <a href="{{ route('eventmanagement.sightreadings.orders.export') }}">CSV</a>
            <a href="{{ route('eventmanagement.sightreading.orders.pdf') }}">PDF</a>
        </div>
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-white">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">###</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">School Name</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Ensemble Name</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Conductor</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <!-- Odd row -->
                @forelse($plaques AS $plaque)
                    <tr class="@if($loop->odd) bg-blueGray-200 @endif">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $loop->iteration }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $plaque['schoolName'] }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $plaque['ensembleName'] }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $plaque['conductor'] }}
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
