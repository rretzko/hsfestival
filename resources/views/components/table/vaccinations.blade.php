@props([
    'vaccinations',
])
<style>
    table{background-color: white;border-collapse: collapse;}
    td,th{border: 1px solid black; padding: 0 0.25rem; color: black;}
</style>
<table>
    <thead>
    <tr>
        <th>###</th>
        <th>Name</th>
        <th>Status</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($vaccinations AS $vaccination)
        <tr>
            <td class="text-right text-sm text-blueGray-600" >{{ $loop->iteration }}</td>
            <td>{{ $vaccination->fullnameAlpha }}</td>
            <td>{{ $vaccination->vaccinationtype->descr }}</td>
            <th>
                <a href="{{ route('user.covid19status.edit',$vaccination) }}" style="color: blue;">
                    <button style="background-color: rgba(0,0,0,0.1); color: black; padding: 0 0.25rem;font-size: small; border-radius: 0.5rem; margin: 0.25rem 0;">
                        Edit
                    </button>
                </a>
            </th>
            <td>
                <a href="{{ route('user.covid19status.remove', $vaccination) }}">
                    <button style="background-color: rgba(255,0,0,0.1); color: darkred; padding: 0 0.25rem;font-size: small; border-radius: 0.5rem; margin: 0.25rem 0;">
                        Remove
                    </button>
                </a>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">No Vaccinations found</td></tr>
    @endforelse
    </tbody>
</table>
