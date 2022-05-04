@props([
    'event',
])

<x-program.page-header />

<section style="display: flex; flex-direction: column; border-bottom: 1px solid black;padding-bottom: 0.5rem; margin-bottom: 1rem;">
    <div style="font-weight: bold; text-align: center;">The {{ $event->year_of }}</div>
    <div style="font-size: 4rem; font-weight: bold; text-align: center;">NJACDA</div>
    <div style="font-size: 2rem; font-weight: bold; text-align: center;">High School</div>
    <div style="font-size: 4rem; font-weight: bold; text-align: center;">Choral Festival</div>

    <div style="margin-top: 4rem;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; text-align: center; font-weight: bold; font-size: 1.5rem;">
                    May 24, 26, 27, 2022<br />
                    Rutgers University
                </td>
                <td style="width: 50%; text-align:center; font-weight: bold; font-size: 1.5rem;">
                    May 25, 2022<br />
                    Rowan University
                </td>
            </tr>
        </table>
    </div>
</section>

<section>
    Co-Sponsors?
</section>
