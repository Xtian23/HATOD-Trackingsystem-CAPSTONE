@extends('clerklayouts')
@section('title','CLERKORDERS')
@section('content')

<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control" >
<table class="table">


  <!-- STARTcode for notification STORE / DELETE /UPDATE -->
      @if(session()->has('notif'))
        <div class="alert alert-success text-center">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session()->get('notif')}}
        </div>
      @endif

      @if(session()->has('delete'))
        <div class="alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session()->get('delete')}}
        </div>
      @endif

      @if(session()->has('update'))
        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session()->get('update')}}
        </div>
      @endif
<!-- EndCode for notification STORE / DELETE /UPDATE -->


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
      <th>Delivery By</th>
      <th>Status</th>
      <th>Total Amount</th>
      <th class="text-center">Action</th>


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
        <td>{{ $row->status}}</td>
        <td>{{ number_format($row->total, 2) }}</td>
         <td>
               <form action="" method="post">
                      <a href="{{ route('clerkorders.edit', $row->id) }}" class="btn btn-primary btn-sm"><img src="/edit.png" height="15px"> Edit</a>

                      {{csrf_field()}}
                      {{method_field('delete')}}
                   <!--    <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Order?')"><img src="/delete.png" height="16px">Delete</button> -->
                 </form>
          </td>
      </tr>
    @endforeach
     
  </tbody>
</table>
</div>
@endsection