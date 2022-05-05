<style>
    .pagebreak{page-break-after: always;}
</style>
<div>
    <x-program.title-page :event="$event"/>

    <div class="pagebreak"></div>

    <x-program.ensembles-page :event="$event" :ensembles="$ensembles" />

    <div class="pagebreak"></div>

    <x-program.performance-adjudicator-pages />
</div>
