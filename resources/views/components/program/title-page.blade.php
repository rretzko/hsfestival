@props([
    'event',
])

<x-program.page-header />

<section style="display: flex; flex-direction: column; border-bottom: 1px solid black; border-top: 1px solid black; padding-bottom: 0.5rem; padding-top: 1rem; margin-bottom: 4rem; margin-top: 1rem;">
    <div style="font-weight: bold; text-align: center;">The {{ $event->year_of }}</div>
    <div style="font-size: 4rem; font-weight: bold; text-align: center;">NJACDA</div>
    <div style="font-size: 2rem; font-weight: bold; text-align: center;">High School</div>
    <div style="font-size: 4rem; font-weight: bold; text-align: center;">Choral Festival</div>

    <div style="margin-top: 4rem; margin-bottom: 2rem;">
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

<section style="width: 100%;">

    <header style="text-align: center; font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
        Co-sponsored by:
    </header>
    <table id="cosponsors-table" style="text-align: center; font-size: 1.3rem;">
        <tbody>
        <tr>
            <td style="width: 33%; vertical-align: top;">
                <header style="font-weight: bold;">
                    Mason Gross School of the Arts
                </header>
                <div>Nicholas Auditorium</div>
                <div>Rutgers University</div>
                <div>Dr. Patrick Gardner, Host</div>
                <div>Dr. Brandon Williams, Host</div>
            </td>
            <td style="width: 34%; vertical-align: top;">
                <header style="font-weight: bold;">
                    American Choral Directors Association
                </header>
                <div>
                    New Jersey Chapter
                </div>
                <div>
                    Dr. John Wilson, Coordinator
                </div>
                <div>
                    Mr. Michael McCormick, Coordinator
                </div>
            </td>
            <td style="vertical-align: top;">
                <header style="font-weight: bold;">
                    Rowan University
                </header>
                <div>Dr. Chris Thomas, Host</div>
            </td>
        </tr>
        </tbody>
    </table>

</section>
