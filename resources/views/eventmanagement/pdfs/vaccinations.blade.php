<style>
    .pagebreak{page-break-after: always;}
</style>
<div>
    <x-vaccinations.title-page :event="$event"/>

    <div class="pagebreak"></div>

    <style>
        caption{background-color: rgba(0,0,0,0.1); font-weight: bold; border:1px solid darkgrey; margin-bottom: 1rem;}
        .vaccinations-table{border-collapse: collapse; margin: auto; min-width: 70%;}
        .vaccinations-table td,th{border: 1px solid black; padding: 0 0.25rem;}
    </style>
    @forelse($vaccinationtables AS $table)

        {!! $table !!}

        <div class="pagebreak"></div>

    @empty
        No vaccinations found
    @endforelse

</div>
