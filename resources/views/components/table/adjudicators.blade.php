@props([
    'adjudicators',
    'currentevent',
])
<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-white">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">###</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">From</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Include</span>
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Remove</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <!-- Odd row -->
                @forelse($adjudicators AS $adjudicator)
                    <tr class="@if($loop->odd) bg-blueGray-200 @endif">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $loop->iteration }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $adjudicator->fullNameAlpha }}
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            {{ $adjudicator->from }}
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="{{ route('eventmanagement.adjudicators.edit',['adjudicator' => $adjudicator]) }}"
                               class="">
                                <button class="bg-indigo-500 px-2 rounded-full ">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            @if($adjudicator->events->contains($currentevent))
                                <span class="text-black">&#10004;</span>
                            @else
                                <a href="{{ route('eventmanagement.adjudicators.attach',['adjudicator' => $adjudicator]) }}"
                                   class="">
                                    <button class="bg-green-500 px-2 rounded-full ">
                                        Include
                                    </button>
                                </a>
                            @endif
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="{{ route('eventmanagement.adjudicators.remove',['adjudicator' => $adjudicator]) }}"
                               class="">
                                <button class="bg-red-500 px-2 rounded-full ">
                                    Remove
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No adjudicators found</td></tr>
                @endforelse
                <!-- More people... -->
                </tbody>
            </table>
        </div>
    </div>
</div>
