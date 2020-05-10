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
    </header>
    <div class="w3ls-contact">
        <!-- form starts here -->
        <form action="{{ url('/register') }}" method="post">
            @csrf

            <div class="agile-field-txt has-feedback {{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label>
                    First Name:</label>
                <input type="text" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}" required="" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
            </div>

            <div class="agile-field-txt has-feedback {{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label>
                    Last Name:</label>
                <input type="text" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}" required="" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
            </div>

            <div class="agile-field-txt has-feedback {{ $errors->has('phone') ? ' has-error' : '' }}">
                <label>
                    Phone:</label>
                <input type="text" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}" required="" />
                <span class="glyphicon glyphicon-mobile form-control-feedback"></span>
                @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
            </div>

            <div id="locationField" class="agile-field-txt has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>
                    Email Address:</label>
                <input type="text" name="email" placeholder="Enter Email Address" value="{{ old('email') }}" required="" />
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

            <div class="agile-field-txt has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label>
                    Re-type Password:</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>

            <a href="{{ url('/login') }}" class="link">Already have an account. Login here</a><br>

            <div class="w3ls-contact  w3l-sub">
                <input type="submit" value="Register">
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
    $(document).ready(function() {
        $(".navigate").click(function() {
            $(location).attr('href', '{{ url("/register") }}')
        });
    });
</script>

</html>