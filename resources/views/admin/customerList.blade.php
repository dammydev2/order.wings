@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-2"></div>
    <div class="panel panel-primary col-lg-6" style="margin-top: 30px;">
  <div class="panel-heading">Customer list</div>
  <div class="panel-body">
  <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Enter Firstname to search" title="Type in a name">

      <table class="table table-bordered" id="myTable">
          {{ $customer->links() }}
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        @foreach($customer as $customers)
        <tr>
            <td>{{ $customers->first_name }}</td>
            <td>{{ $customers->last_name }}</td>
            <td>{{ $customers->phone }}</td>
            <td>{{ $customers->email }}</td>
        </tr>
        @endforeach
        <tr>
        <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        
      </table>
      {{ $customer->links() }}
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
