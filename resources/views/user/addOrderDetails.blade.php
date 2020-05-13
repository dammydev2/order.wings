@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-3"></div>

        <div class="col-md-4 col-sm-12 panel panel-primary">
            <div class="panel-heading">
                <h4>Add Order Details</h4>
            </div>
            <div class="panel-body">

                <form action="{{ route('enterDetails') }}" method="post">
                    @csrf

                    <div id="locationField" class="agile-field-txt form-group has-feedback {{ $errors->has('pickup_address') ? ' has-error' : '' }}">
                        <label>
                            Pick-up Address:</label>
                        <input type="text" class="form-control" value="{{ $details['pickup_address'] }}" readonly name="pickup_address" placeholder="Enter Pick-up Address" style="display: block" required="" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('pickup_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pickup_address') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div id="locationField" class="agile-field-txt form-group has-feedback {{ $errors->has('delivery_address') ? ' has-error' : '' }}">
                        <label>
                            Delivery Address:</label>
                        <input type="text" class="form-control" value="{{ $details['delivery_address'] }}" readonly name="delivery_address" placeholder="Enter Delivery Address " required="" />
                        @if ($errors->has('delivery_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('delivery_address') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt has-feedback form-group {{ $errors->has('weight') ? ' has-error' : '' }}">
                        <label>
                            Estimated Weight: (in Kg)</label>
                        <input type="number" class="form-control" value="{{ $details['weight'] }}" readonly name="weight" placeholder="Enter Estimated Weight (eg 10) " required="" />
                        @if ($errors->has('weight'))
                        <span class="help-block">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div id="locationField" class="agile-field-txt form-group has-feedback {{ $errors->has('orderID') ? ' has-error' : '' }}">
                        <label>
                            Order ID:</label>
                        <input type="text" class="form-control" value="{{ $details['orderID'] }}" readonly name="orderID" placeholder="Enter Delivery Address " required="" />
                        @if ($errors->has('orderID'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderID') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt has-feedback form-group {{ $errors->has('receiver_name') ? ' has-error' : '' }}">
                        <label>
                            Receiver Name</label>
                        <input type="text" class="form-control" value="{{ old('receiver_name') }}" name="receiver_name" placeholder="Enter Receiver Name " required="" />
                        @if ($errors->has('receiver_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('receiver_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt has-feedback form-group {{ $errors->has('receiver_phone') ? ' has-error' : '' }}">
                        <label>
                            Receiver Phone</label>
                        <input type="text" class="form-control" value="{{ old('receiver_phone') }}" name="receiver_phone" placeholder="Enter Receiver Phone " required="" />
                        @if ($errors->has('receiver_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('receiver_phone') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt has-feedback form-group {{ $errors->has('item') ? ' has-error' : '' }}">
                        <label>
                            Item</label>
                        <input type="text" class="form-control" value="{{ old('item') }}" name="item" placeholder="Enter Item " required="" />
                        @if ($errors->has('item'))
                        <span class="help-block">
                            <strong>{{ $errors->first('item') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="agile-field-txt has-feedback form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label>
                            Item</label>
                        <input type="number" class="form-control" value="{{ old('quantity') }}" name="quantity" placeholder="Enter quantity " required="" />
                        @if ($errors->has('quantity'))
                        <span class="help-block">
                            <strong>{{ $errors->first('quantity') }}</strong>
                        </span>
                        @endif
                    </div>

                    <input type="hidden" name="distance" value="{{ $details['distance'] }}">
                    <input type="hidden" name="customer_id" value="{{ \AUTH::User()->id }}">

                    <div class="w3ls-contact  w3l-sub">
                        <input type="submit" class="btn btn-block btn-primary" value="Add Details">
                    </div>

            </div>

        </div>

    </div>
</div>
@endsection