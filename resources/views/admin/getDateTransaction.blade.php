@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-1"></div>
        <div class="panel panel-primary col-lg-9" style="margin-top: 30px;">
            <?php
            $date = Session::get('date');
            ?>
            <div class="panel-heading">Transaction(s) list for {{ $date['from'] }} to {{ $date['to'] }} </div>
            <div class="panel-body">
                <h3>Total Transaction: NGN <span  class="totalAmount"></span></h3>
                <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Enter customer name to search" title="Type in a name">

                <table class="table table-bordered" id="myTable">
                    <tr>
                        <th>Date/Time</th>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>OrderID</th>
                        <th>Amount Paid</th>
                        <th>Reference Code</th>
                    </tr>
                    <?php $totalAmount = 0; ?>
                    @foreach($transactionDetail as $transactionDetails)
                    <tr>
                        <td>{{ $transactionDetails->name }}</td>
                        <td>{{ $transactionDetails->created_at }}</td>
                        <td>{{ $transactionDetails->customer_id }}</td>
                        <td>{{ $transactionDetails->orderID }}</td>
                        <td>{{ $transactionDetails->amount }}</td>
                        <td>{{ $transactionDetails->reference_code }}</td>
                    </tr>
                    <?php 
                    
                    $totalAmount += $transactionDetails->amount 
                    
                     ?>
                    @endforeach
                    <tr>
                        <th>Date/Time</th>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>OrderID</th>
                        <th>Amount Paid</th>
                        <th>Reference Code</th>
                    </tr>
                    <?php $totalAmount = number_format($totalAmount,2) ?>
                </table>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <script>
            $(document).ready(
                function() {
                    var totalAmount = '<?php  echo $totalAmount ?>'
                    $('.totalAmount').text(totalAmount);
                }
            );
        </script>
    </div>
</div>
@endsection