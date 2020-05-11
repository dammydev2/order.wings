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
        ?>

<li><i class="fa fa-motorcycle"></i> Pickup Address: <b>{{ $order['pickup_address'][0] }}</b></li>
            <li><i class="fa fa-motorcycle"></i> Delivery Address: <b>{{ $order['delivery_address'][0] }}</b></li>
            <li><i class="fa fa-money"></i> Despatch Amount: <b>&#8358; {{ number_format($order['amount'], 2) }}</b></li>

        <p>{{ print_r(Session::get('order')) }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    @endif
    <!-- getting if the user has a session to pay for -->

User Home

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

<style>
    li{
        list-style: none;
        font-size: 13px;
    }
</style>

@endsection
