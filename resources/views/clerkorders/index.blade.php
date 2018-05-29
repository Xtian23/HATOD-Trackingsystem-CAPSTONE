@extends('clerklayouts')
@section('title','CLERKORDERS')
@section('content')

<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control" >
<table class="table">


  <div class="text-left" >
    <a href="{{route('clerkorders.create') }}"  class="btn btn-primary  " role="button" aria-pressed="true">Add Order</a>

    
  <div class="text-center">
      <h3>ORDERS LIST</h3>
  </div>
  </div>


  <thead class="thead-inverse">
    <tr>
      <th>ORDER#</th>
      <th>Order Date/Time</th>
      <th>Customer</th>
      <th>Address</th>
      <th>Delivery Personnel</th>
      <th>Status</th>
      <th>Total Amount</th>
      <th>
        <span></span>
          Action  
      </th>


    </tr>
  </thead>
  <tbody>
    @foreach($orders as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ date_create($row->order_date)->format('M d, Y') }}</td>
        <td>{{ $row->customer->fullname}}</td>
        <td>{{ $row->customer->address }}</td>
        <td>{{ $row->deliveryPersonnel->fullname }}</td>
        <td>??</td>
        <td>{{ number_format($row->total, 2) }}</td>
        <td></td>
      </tr>
    @endforeach
     
  </tbody>
</table>
</div>
@endsection