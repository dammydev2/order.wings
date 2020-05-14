@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-1"></div>
        <div class="panel panel-primary col-lg-9" style="margin-top: 30px;">
            <div class="panel-heading">Transaction(s) list</div>
            <div class="panel-body">
                <h3>Total Transaction: NGN {{ number_format($transaction, 2) }}</h3>
                <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Enter customer name to search" title="Type in a name">

                <table class="table table-bordered" id="myTable">
                    {{ $transactionDetail->links() }}
                    <tr>
                        <th>Date/Time</th>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>OrderID</th>
                        <th>Amount Paid</th>
                        <th>Reference Code</th>
                    </tr>
                    @foreach($transactionDetail as $transactionDetails)
                    <tr>
                        <td>{{ $transactionDetails->name }}</td>
                        <td>{{ $transactionDetails->created_at }}</td>
                        <td>{{ $transactionDetails->customer_id }}</td>
                        <td>{{ $transactionDetails->orderID }}</td>
                        <td>{{ $transactionDetails->amount }}</td>
                        <td>{{ $transactionDetails->reference_code }}</td>
                    </tr>
                    @endforeach
                    <tr>
                    <th>Date/Time</th>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>OrderID</th>
                        <th>Amount Paid</th>
                        <th>Reference Code</th>
                    </tr>

                </table>
                {{ $transactionDetail->links() }}
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
@endsection