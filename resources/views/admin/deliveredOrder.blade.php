@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="panel panel-primary col-lg-10" style="margin-top: 30px;">
            <div class="panel-heading">Delivered Order</div>
            <div class="panel-body">
                <!-- <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Enter Firstname to search" title="Type in a name"> -->

                <table class="table table-bordered" id="myTable">
                    {{ $order->links() }}
                    <tr>
                        <th>Date/Time</th>
                        <th></th>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th></th>
                        <th>Pickup Address</th>
                        <th>Delivery Address</th>
                        <th>Receiver Name</th>
                        <th>Receiver Phone</th>
                        <th>Distance</th>
                        <th>Weight</th>
                        <th>Item</th>
                        <th>Quantity</th>
                    </tr>
                    @foreach($order as $orders)
                    <tr>
                        <td>{{ $orders->created_at }}</td>
                        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{ $orders->customer_id }}">Customer Details</button></td>
                        <td>{{ $orders->orderID }}</td>
                        <td>
                            @if($orders->status === 'pending')
                            <div class="text-danger">{{ $orders->status }}</div>
                            @elseif($orders->status === 'transit')
                            <div class="text-warning">{{ $orders->status }}</div>
                            @elseif($orders->status === 'delivered')
                            <div class="text-success">{{ $orders->status }}</div>
                            @endif
                        </td>
                        <td>
                          @if($orders->riderID != NULL)
                          <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myRider{{ $orders->riderID }}"><i class="fa fa-motorcycle"></i></button>
                          @endif
                        </td>
                        <td>{{ $orders->pickup_address }}</td>
                        <td>{{ $orders->delivery_address }}</td>
                        <td>{{ $orders->receiver_name }}</td>
                        <td>{{ $orders->receiver_phone }}</td>
                        <td>{{ $orders->distance }}</td>
                        <td>{{ $orders->weight }}</td>
                        <td>{{ $orders->item }}</td>
                        <td>{{ $orders->quantity }}</td>
                    </tr>
                    <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal{{ $orders->customer_id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Customer Details</h4>
      </div>
      <div class="modal-body">
        <p>{{ $orders->id }}
            <?php
                $details = DB::table('users')->where('id', $orders->customer_id)->first();
            ?>
            <p>Customer Name: <b>{{ $details->first_name.' '.$details->last_name }}</b></p>
            <p>Phone: <b>{{ $details->phone }}</b></p>
            <p>Email: <b>{{ $details->email }}</b></p>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- RIDER MODAL -->
<!-- Modal -->
@if($orders->riderID != NULL)
<div id="myRider{{ $orders->riderID }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Despatch Rider</h4>
      </div>
      <div class="modal-body">
        <p>
            <?php
                $details = DB::table('users')->where('id', $orders->riderID)->first();
            ?>
            <p>Rider Name: <b>{{ $details->first_name.' '.$details->last_name }}</b></p>
            <p>Phone: <b>{{ $details->phone }}</b></p>
            <p>Rider Email: <b>{{ $details->email }}</b></p>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endif
<!-- RIDER MODAL -->
                    @endforeach
                    <tr>
                        <th>Date/Time</th>
                        <th></th>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th></th>
                        <th>Pickup Address</th>
                        <th>Delivery Address</th>
                        <th>Receiver Name</th>
                        <th>Receiver Phone</th>
                        <th>Distance</th>
                        <th>Weight</th>
                        <th>Item</th>
                        <th>Quantity</th>
                    </tr>

                </table>
                {{ $order->links() }}
            </div>
        </div>

        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </div>
</div>
<style>
    #myTable{
        height:500px; 
        width: 900px;
        overflow-x: scroll;
        overflow-y:scroll; 
        display:block;
    }
</style>
@endsection