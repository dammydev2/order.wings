<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Wings by nineseas logistics</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="wings by ninesasa logistics order Form , shipping in Lagos, Sign up with Wings , We move your logistics for you at Wings, Wings logistics is here, wings by nineseas" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Stylesheets {{ URL::asset('css/css.css') }} -->
    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <!--// Stylesheets -->
    <!--fonts-->
</head>

<body>
    <header>
        <h1>Wings by Nineseas Logistics</h1>
    </header>
    <div class="w3ls-contact">

        <!-- form starts here -->
        <form>
            <h1>Price Details</h1>
            <li>Pickup Address: <b>{{ $order['pickup_address'][0] }}</b></li>
            <li>Delivery Address: <b>{{ $order['delivery_address'][0] }}</b></li>
            <li>Despatch Amount: <b>&#8358; {{ number_format($order['amount'], 2) }}</b></li>

            <div class="w3ls-contact  w3l-sub">
                <a href="{{ url('login') }}" class="button-link">Login/Register to Confirm order</a>
            </div>

        </form>
    </div>
    <!-- //form ends here -->
    <div class="copy-wthree" style="margin-top: 150px;">
        <p>© {{ date('Y') }} Wings Shipping Form . All Rights Reserved | Design by
            <a href="http://odysoft.com/" target="_blank">odysoft</a>
        </p>
    </div>
</body>
<!-- //Body -->

<style>
    .help-block {
        color: red
    }

    li {
        color: #ffffff;
    }
</style>

</html>