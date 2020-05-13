@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!-- getting if the user has a session to pay for -->
        @if(Session::has('order'))
        <!-- Trigger the modal with a button -->

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Current Order</h4>
                    </div>
                    <div class="modal-body">
                        <p>You are yet to confirm the below order through payment</p>

                        <?php
                        $order = Session::get('order');
                        $amountToPay = $order['amount'] * 100; //IN KOBO
                        $pickup_address = $order['pickup_address'][0];
                        $delivery_address = $order['delivery_address'][0];
                        $amount = $order['amount'];
                        $weight = $order['weight'];
                        $distance = $order['distance'];
                        ?>

                        <li><i class="fa fa-motorcycle"></i> Pickup Address: <b>{{ $order['pickup_address'][0] }}</b></li>
                        <li><i class="fa fa-motorcycle"></i> Delivery Address: <b>{{ $order['delivery_address'][0] }}</b></li>
                        <li><i class="fa fa-money"></i> Despatch Amount: <b>&#8358; {{ number_format($order['amount'], 2) }}</b></li>

                        <!-- <p>{{ print_r(Session::get('order')) }}</p> -->
                        <!-- Paystack -->
                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <div class="row" style="margin-bottom:40px;">
                                <div class="col-md-8 col-md-offset-2">
                                    <p>
                                        <div>
                                            <p>&nbsp;</p>
                                            <h4 class="text-center">Pay ₦ {{ number_format($order['amount'], 2) }}</h4>
                                        </div>
                                    </p>
                                    <input type="hidden" name="email" value="{{ Auth::User()->email }}"> {{-- required --}}
                                    <input type="hidden" name="orderID" value="345">
                                    <input type="hidden" name="amount" value="{{ $amountToPay }}"> {{-- required in kobo --}}
                                    <input type="hidden" name="quantity" value="3">
                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['pickup_address' => $pickup_address,'delivery_address' => $delivery_address, 'amount' => $amount, 'weight' => $weight, 'distance' => $distance]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                                    <p>
                                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <!-- Paystack -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        @endif
        <!-- getting if the user has a session to pay for -->

        @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        <div class="col-md-12" style="margin-top: 20px;"></div>

        <a href="{{ route('orderHistory') }}">
            <div class="col-md-3 admin-icon-house">
                <i class="fa fa-first-order admin-icon"></i>
                <h3>Order History</h3>
            </div>
        </a>

        <a href="{{ route('userTransactionHistory') }}">
            <div class="col-md-3 admin-icon-house">
                <i class="fa fa-money admin-icon" aria-hidden="true"></i>
                <h3>Transaction History</h3>
            </div>
        </a>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

<style>
    li {
        list-style: none;
        font-size: 13px;
    }

    .admin-icon {
        font-size: 150px;
    }

    .admin-icon-house {
        border: 10px solid #337ab7;
        text-align: center;
        margin: 20px;
    }
</style>

@endsection