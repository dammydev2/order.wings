@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

        <div class="panel panel-primary col-lg-9" style="margin-top: 30px;">
            <div class="panel-heading">Rider list</div>
            <div class="panel-body">
                <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Enter Firstname to search" title="Type in a name">

                <table class="table table-bordered" id="myTable" style="height:300px; overflow-y:scroll; display:block;">
                    {{ $rider->links() }}
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($rider as $riders)
                    <tr>
                        <td>{{ $riders->first_name }}</td>
                        <td>{{ $riders->last_name }}</td>
                        <td>{{ $riders->phone }}</td>
                        <td>{{ $riders->email }}</td>
                        <td><a href="{{ url('riderPending/'.$riders->id) }}" class="btn btn-danger">Pending Order</a></td>
                        <td><a href="{{ url('riderTransit/'.$riders->id) }}" class="btn btn-info">Enroute Order</a></td>
                        <td><a href="{{ url('riderDelivered/'.$riders->id) }}" class="btn btn-success">Delivered Order</a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                </table>
                {{ $rider->links() }}
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
</style>
@endsection