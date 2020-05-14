@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="margin-top: 30px;"></div>
        <div class="col-md-3"></div>

        <div class="panel panel-primary col-md-4">
            <div class="panel-heading">Add a Rider <i class="fa fa-motorcycle"></i></div>
            <div class="panel-body">
                <form action="{{ url('/registerRider') }}" method="post">
                    @csrf

                    <div class="agile-field-txt form-group has-feedback {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label>
                            First Name:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}" required="" />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt form-group has-feedback {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label>
                            Last Name:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}" required="" />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt form-group has-feedback {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label>
                            Phone:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}" required="" />
                        <span class="glyphicon glyphicon-mobile form-control-feedback"></span>
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div id="locationField" class="agile-field-txt form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>
                            Email Address:</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}" required="" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>
                            Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password " required="" />
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>
                            Re-type Password:</label>
                        <input type="password" name="password_confirmation" class="form-control" class="form-control" placeholder="Confirm password">
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="w3ls-contact  w3l-sub">
                        <input type="submit" class="btn btn-primary btn-block" value="Register">
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<style>
    #myTable {
        height: 500px;
        width: 900px;
        overflow-x: scroll;
        overflow-y: scroll;
        display: block;
    }
</style>
@endsection