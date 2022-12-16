@props([
    'event',
    'outstandingBalance',
    'school',
])
<section class="mt-4">

    <div class="px-4">
        <h4 class="font-bold mb-4 px-4" id="display_amount_due_net" style="background-color: rgba(0,0,0,0.1);">Outstanding Balance: ${{ number_format($outstandingBalance, 2) }}</h4>

        <div class="m-auto" style="width: 12rem;">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank" >
                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="njacda@mfrholdings.com" >
                <input type="hidden" name="notify_url" value="https://highschoolfestival.com/update_account" >
                <input type="hidden" name="custom" id="new_custom" value="{{ auth()->id().'*'.$event->id.'*'.$outstandingBalance }}" >
                <!-- Specify a subscribe button -->
                <input type="hidden" name="cmd" value="_xclick" >
                <!-- Identify the registrant -->
                <input type="hidden" name="item_name" value="sightreading" >
                <input type="hidden" name="item_number" value="{{ $event->id }}" >
                <input type="hidden" name="on0" value="{{ auth()->user()->name }}" >
                <input type="hidden" name="email" value="{{ auth()->user()->email }}" >
                <input type="hidden" name="currency_code" value="USD" >
                <input type="hidden" id="amount" name="amount" value="{{ $outstandingBalance }}" >
                <!-- display the payment button -->
                <input class="rounded-full" type="image" name="submit" src="/assets/images/pp.png">

            </form>

        </div>
        {{-- @endif --}}
    </div>

</section>
