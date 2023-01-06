<style>
    .pagebreak{page-break-after: always;}
</style>
<div>
    <x-sightreadings.title-page :event="$event"/>

    <div class="pagebreak"></div>

    <style>
        caption{background-color: rgba(0,0,0,0.1); font-weight: bold; border:1px solid darkgrey; margin-bottom: 1rem;}
        .orders-table{border-collapse: collapse; margin: auto; min-width: 70%;}
        .orders-table td,th{border: 1px solid black; padding: 0 0.25rem;}
    </style>

    <table class="orders-table">
        <thead>
        <tr>
            <th>###</th>
            <th>Name</th>
            <th>School</th>
            <th>Example</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders AS $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->school->name }}</td>
                <td style="text-align: center;">{{ $order->sightreading->year_of }}</td>
                <td>{{ $order->updated_at }}</td>
            </tr>
        @empty
            <tr><td colspan="4">No sightreading orders found</td></tr>
        @endforelse

        </tbody>
    </table>

</div>
