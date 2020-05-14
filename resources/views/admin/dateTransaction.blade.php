@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="margin-top: 30px;"></div>
        <div class="col-md-2"></div>

        <div class="panel panel-primary col-lg-7">
            <div class="panel-heading">FIlter Transaction using date</div>
            <div class="panel-body">

                <form action="{{ route('getDateTransaction') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 has-feedback {{ $errors->has('from') ? ' has-error' : '' }}">
                            <label>From</label>
                            <input type="date" name="from" value="{{ old('from') }}" class="form-control">
                            @if ($errors->has('from'))
                            <span class="help-block">
                                <strong>{{ $errors->first('from') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group col-lg-6  has-feedback {{ $errors->has('to') ? ' has-error' : '' }}">
                            <label>To</label>
                            <input type="date" name="to" value="{{ old('to') }}" class="form-control">
                            @if ($errors->has('to'))
                            <span class="help-block">
                                <strong>{{ $errors->first('to') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                    <input type="submit" class="btn btn-primary btn-block">
                </form>

            </div>
        </div>


    </div>
</div>
@endsection