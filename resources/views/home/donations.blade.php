@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-5 col-xs-12 center-block text-center">
            <p>
                CSNades was created as a hobby for the Counter-Strike community and it takes time to develop as well as money to host the website.
            </p>
            <p>
                If you like what we're doing, feel free to support us by donating.
            </p>
            <p><br>
                <form class="text-center" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_donations">
                    <input type="hidden" name="item_name" value="Donation"  >
                    <input type="hidden" name="business" value="csnades+paypal@gmail.com">
                    <input type="hidden" name="return" value="{{ urlencode(route('get.donations')) }}">
                    <input type="hidden" name="cancel_return" value="{{ urlencode(route('get.donations')) }}">
                    <input type="hidden" name="cbt" value="Go Back To CSNades">
                    <input type="hidden" name="rm" value="1">
                    <input type="hidden" name="no_note" value="1">
                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
                    <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
                </form>
            </p>
        </div>
    </div>
@stop
