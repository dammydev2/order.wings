@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-12" style="margin-top: 20px;"></div>

            <div class="col-md-3 admin-icon-house">
                <i class="fa fa-users admin-icon"></i>
                <h3>Total Customer(s)</h3>
                <h3>{{ count($customer) }}</h3>
            </div>

            <div class="col-md-3 admin-icon-house">
                <i class="fa fa-first-order admin-icon"></i>
                <h3>All Order</h3>
                <h3>{{ count($order) }}</h3>
            </div>

            <div class="col-md-3 admin-icon-house">
                <i class="fa fa-money admin-icon" aria-hidden="true"></i>
                <h3>Total Transaction</h3>
                <h3>&#x20a6; {{ number_format($transaction, 2) }}</h3>
            </div>

            <div class="col-md-3 admin-icon-house">
                <i class="fa fa fa-motorcycle admin-icon" aria-hidden="true"></i>
                <h3>All Riders</h3>
                <h3>{{ count($rider) }}</h3>
            </div>

    </div>
</div>

<style>
    li {
        list-style: none;
        font-size: 13px;
    }

    .admin-icon {
        font-size: 50px;
    }

    .admin-icon-house {
        border: 10px solid #337ab7;
        text-align: center;
        margin: 20px;
    }
</style>
@endsection
