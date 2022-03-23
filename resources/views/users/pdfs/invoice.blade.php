<div>
    <div id="headers" style="display: flex;">
        <div style="width: 50%; text-align: left;">
            <div style="font-size: 1.2rem; font-weight: bold;">NJ Americal Choral Directors Association</div>
            <div style="font-size: 1.15rem;">{{ date('Y') }} High School Choral Festival</div>
        </div>

        <div style="width: 100%; text-align: right;">
            <img class="h-8 w-auto" src="https://njacda.com/wp-content/uploads/2014/01/njacda2-300x83.png" alt="NJACDA logo">
        </div>
    </div>

    <div id="invoice_id">
        <table style="width: 100%; background-color: rgba(0,0,0,.1);">
            <tr style="padding: 0 .5rem;">
                <td style="width: 50%; text-align: left;">INVOICE: {{ $invoiceid }}</td>
                <td style="width: 50%; text-align: right;">{{ date('d-M-Y',strtotime(now())) }}</td>
            </tr>
        </table>

    </div>

    <div id="invoice_header" style="margin-top: 2rem;">
        <table style="width: 100%;">
            <tr style="border-bottom: 1px solid black;">
                <th style="text-align: left; width: 30%;">BILL TO</th>
                <th style="text-align: center; width: 30%;">SHIP TO</th>
                <th style="text-align: right; width: 40%;">INSTRUCTIONS</th>
            </tr>
            <tr style="border-top: 1px solid black;">
                <td style="text-align: left; vertical-align: top;">
                    {{ auth()->user()->name }}
                </td>
                <td style="text-align: center; vertical-align: top;">
                    Same as Bill To
                </td>
                <td style="text-align: right;">
                    For: {{ $event->name }}
                </td>
            </tr>
        </table>
    </div>

    <div id="invoice_detail" style="margin-top: 2rem;">
        <table style="width: 100%;">
            <tr style="border: 1px solid black; background-color: rgba(0,0,0,.1);">
                <th style="text-align: center; width: 15%;">QUANTITY</th>
                <th style="text-align: center; width: 45%;">DESCRIPTION</th>
                <th style="text-align: right; width: 20%;">UNIT PRICE</th>
                <th style="text-align: right; width: 20%;padding-right: 0.25rem;">TOTAL</th>
            </tr>
            @foreach(auth()->user()->ensembles AS $ensemble)
                <tr style="border-top: 1px solid black;">
                    <td style="text-align: center; vertical-align: top;">
                        1
                    </td>
                    <td style="text-align: center; vertical-align: top;">
                        {{ $ensemble->name }}
                    </td>
                    <td style="text-align: right;">
                        ${{ number_format((auth()->user()->paymentDue / auth()->user()->ensembles->count()), 2) }}
                    </td>
                    <td style="text-align: right;">
                        ${{ number_format((auth()->user()->paymentDue / auth()->user()->ensembles->count()), 2) }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div id="invoice_totals" style="margin-top: 2rem;">
        <table style="width: 100%;">

                <tr style="border-top: 1px solid black;">
                    <td style="text-align: right; vertical-align: top; width: 80%;">
                        Total Due:
                    </td>
                    <td style="text-align: right; vertical-align: top; width: 20%;">
                        ${{ number_format(auth()->user()->paymentDue, 2) }}
                    </td>
                </tr>
                <tr style="border-top: 1px solid black;">
                    <td style="text-align: right; vertical-align: top;">
                        Total Paid:
                    </td>
                    <td style="text-align: right; vertical-align: top;">
                        ${{ number_format(auth()->user()->paymentPaid, 2) }}
                    </td>
                </tr>
            <tr style="border-top: 1px solid black;">
                <td style="text-align: right; vertical-align: top;">
                    Balance Due:
                </td>
                <td style="text-align: right; vertical-align: top;">
                    ${{ number_format(auth()->user()->paymentBalance, 2) }}
                </td>
            </tr>

            <tr>
                <td colspan="2" style="font-style: italic; text-align: right;margin-top: 1rem;">Thank you for your participation!</td>
            </tr>

        </table>

        <div id="payment-mail-address" style="text-align: center; margin-top: 2rem; border-top: 1px solid darkgrey;">
            <header style="margin-top: 1rem;">Send checks, etc. to:</header>
            <div style="font-family: 'Times New Roman; font-weight: bold;">
                <div>Patrick Hachey</div>
                <div>Re: NJACDA HS Choral Festival</div>
                <div>93 Salmon Road</div>
                <div>Landing, NJ 07850</div>
                <div>Make check payable to: NJACDA</div>
            </div>
        </div>

    </div>
</div>
