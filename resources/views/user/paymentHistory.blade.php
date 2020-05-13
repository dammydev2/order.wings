@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-2"></div>
    <div class="panel panel-primary col-lg-6" style="margin-top: 30px;">
  <div class="panel-heading">Transaction History</div>
  <div class="panel-body">
      <table class="table table-bordered">
          {{ $paymentData->links() }}
        <tr>
            <th>Date/Time</th>
            <th>Order ID</th>
            <th>Amount</th>
        </tr>
        @foreach($paymentData as $paymentDatas)
        <tr>
            <th>{{ $paymentDatas->created_at }}</th>
            <th>{{ $paymentDatas->orderID }}</th>
            <th>{{ 'NGN '. number_format($paymentDatas->amount,2) }}</th>
        </tr>
        @endforeach
        <tr>
            <th>Date/Time</th>
            <th>Order ID</th>
            <th>Amount</th>
        </tr>
        
      </table>
      {{ $paymentData->links() }}
  </div>
</div>

    </div>
</div>
@endsection
