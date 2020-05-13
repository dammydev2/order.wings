@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

<div class="text-center"><h3>My Order History</h3></div>

        <table class="table " style="border: 1px solid #000; height:900px; width: 900px; overflow:scroll; display:block;">
            {{ $userHistory->links() }}
            <tr>
                <td>date/time</td>
                <th>orderID</th>
                <th>status</th>
                <th></th>
                <th>item</th>
                <th>quantity</th>
                <th>weight</th>
                <th>pickup address</th>
                <th>delivery address</th>
                <th>receiver name</th>
                <th>receiver phone</th>
            </tr>
            @foreach($userHistory as $userhistory)
            <tr>
                <td>{{ $userhistory->created_at }}</td>
                <td>{{ $userhistory->orderID }}</td>
                <td>{{ $userhistory->status }}</td>
                <td><a href="">Despatch by</a></td>
                <td>{{ $userhistory->item }}</td>
                <td>{{ $userhistory->quantity }}</td>
                <td>{{ $userhistory->weight }}</td>
                <td>{{ $userhistory->pickup_address }}</td>
                <td>{{ $userhistory->delivery_address }}</td>
                <td>{{ $userhistory->receiver_name }}</td>
                <td>{{ $userhistory->receiver_phone }}</td>
            </tr>
            @endforeach
            <tr>
                <td>date/time</td>
                <th>orderID</th>
                <th>status</th>
                <th></th>
                <th>item</th>
                <th>quantity</th>
                <th>weight</th>
                <th>pickup address</th>
                <th>delivery address</th>
                <th>receiver name</th>
                <th>receiver phone</th>
            </tr>
            <tr>
                <td colspan="11">{{ $userHistory->links() }}</td>
            </tr>
            
        </table>

    </div>
</div>

<style>
    td {
        border: 1px solid #000;
    }
</style>
@endsection