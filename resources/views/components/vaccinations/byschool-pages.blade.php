@props([
    'event',
    'vaccinations',
])

<x-program.page-header />

<section style="display: flex; flex-direction: column; padding-bottom: 0.5rem; margin-bottom: 1rem;">

    @forelse($vaccinations AS $vaccination)

         <div style="border-top: 1px solid black; border-bottom: 1px solid black; background-color: rgba(0,0,0,0.1); padding-left: 0.5rem; margin-bottom: 0.5rem;">
            <b>School Name</b>
         </div>

            <style>
                .repertoire-table{border-collapse: collapse; margin-top: 0.5rem;}
                .repertoire-table tr{border: 1px solid lightgrey;}
            </style>
            <table class="repertoire-table" style="width: 100%;">
                <tbody>

                    <tr style="margin-bottom: 0.5rem;background-color: @if(!($loop->iteration % 2)) rgba(0,0,0,0.1) @endif">
                        <td style="width: 50%; vertical-align: top; padding-left: 0.5rem;">{{ $loop->iteration }}</td>
                        <td style="width: 50%; text-align: right; padding-right: 0.5rem;">{{ $vaccination->first }}</td>
                    </tr>

                </tbody>
            </table>
            </div>

        <div class="pagebreak"></div>

    @empty
        No vaccinations found
    @endforelse

</section>
