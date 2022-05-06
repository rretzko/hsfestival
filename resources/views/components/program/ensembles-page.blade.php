@props([
    'event',
    'ensembles',
])

<x-program.page-header />

<section style="display: flex; flex-direction: column; padding-bottom: 0.5rem; margin-bottom: 1rem;">

    @forelse($ensembles AS $venueid => $ensemblevenueassignments)

         <div style="border-top: 1px solid black; border-bottom: 1px solid black; background-color: rgba(0,0,0,0.1); padding-left: 0.5rem; margin-bottom: 0.5rem;">
            {{ \App\Models\Venue::find($venueid)->startDateDMdy }}: <b>{{\App\Models\Venue::find($venueid)->name}}</b>
         </div>

        @forelse($ensemblevenueassignments AS $assignment)
            <div style=" padding-bottom: 0.5rem; margin-bottom: 1rem;">
                <style>
                    .ensemble-table{border-collapse: collapse;}
                    .pagebreak{page-break-after: always;}
                </style>
                <table class="ensemble-table" style="width: 100%; background-color: transparent;">
                    <tbody>
                    <tr>
                        <td style="width: 20%; text-align: left;"></td>
                        <td style="width: 60%; text-align: center; font-size: 1.25rem; font-weight: bold;">
                            {{ $assignment->ensemble->name }}
                        </td>
                        <td style="width: 20%; text-align: right; font-size: 0.8rem;">{{ $assignment->timeslot->descr }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            {{ $assignment->ensemble->school->name }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            {{ $assignment->ensemble->conductor }}
                        </td>
                    </tr>
                    </tbody>
                </table>

                <style>
                    .repertoire-table{border-collapse: collapse; margin-top: 0.5rem;}
                    .repertoire-table tr{border: 1px solid lightgrey;}
                </style>
                <table class="repertoire-table" style="width: 100%;">
                    <tbody>
                    @forelse($assignment->ensemble->repertoire AS $repkey => $rep)
                        <tr style="margin-bottom: 0.5rem;background-color: @if(!($repkey % 2)) rgba(0,0,0,0.1) @endif">
                            <td style="width: 50%; vertical-align: top; padding-left: 0.5rem;">{{ $rep->title }}</td>
                            <td style="width: 50%; text-align: right; padding-right: 0.5rem;">{!! $rep->artistsBlock !!}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" style="text-align: center;">No repertoire found</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        @empty
            No ensembles found
        @endforelse

        <div class="pagebreak"></div>

    @empty
        No venues found
    @endforelse

</section>
