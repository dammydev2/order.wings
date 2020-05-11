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
    <!-- title -->
</head>

<body>
    <header>
        <h1>Wings by Nineseas Logistics</h1>
        <img src="{{URL::asset('/images/register.jpg')}}" class="navigate" alt="register Pic">
        <p>&nbsp;</p>
    </header>
    <div class="w3ls-contact">
        <!-- form starts here -->
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div id="locationField" class="agile-field-txt has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>
                    Email Address:</label>
                <input type="text" name="email" placeholder="Enter Email Address" required="" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="agile-field-txt has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <label>
                    Password:</label>
                <input type="password" name="password" placeholder="Enter Password " required="" />
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <a href="{{ url('/password/reset') }}" class="link">I forgot my password</a><br>
        
            <div class="w3ls-contact  w3l-sub">
                <input type="submit" value="Log In">
            </div>

        </form>
    </div>
    <!-- //form ends here -->
    <div class="copy-wthree">
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
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".navigate").click(function(){
    $(location).attr('href', '{{ url("/register") }}')
  });
});
</script>

</html>