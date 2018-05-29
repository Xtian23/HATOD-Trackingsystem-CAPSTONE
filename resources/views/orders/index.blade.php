@extends('layouts')
@section('title','ORDERS')
@section('contentz')

<div class="mx-auto  bg-light col-md-11 mt-1 form-control" >
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
    <a href="{{route('orders.create') }}"  class="btn btn-primary  " role="button" aria-pressed="true">Add Order</a>


    
  <div class="text-center">
      <h3>ORDERS LIST</h3>
  </div>


          {!! Form::open(['method'=>'GET','url' => route('orders.index'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
                <input type="text" class="form-control" name="search"  placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-primary ml" type="submit">
                     Search
                    </button>
                </span>
            </div>
            {!! Form::close() !!}
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
      <th colspan="2" class="text-center">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach($orders as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ date_create($row->order_date)->format('M d, Y ') }}</td>
        <td>{{ $row->customer->fullname}}</td>
        <td>{{ $row->customer->address }}</td>
        <td>{{ $row->deliveryPersonnel->fullname }}</td>
        <td>{{ $row->status}}</td>
        <td class="text-right">{{ number_format($row->total, 2) }}</td>
          <td width="15%">
               <form action="" method="post">
                      <a href="{{ route('orders.edit', $row->id) }}" class="btn btn-primary btn-sm"><img src="/edit.png" height="15px"> Edit</a>

                      {{csrf_field()}}
                      {{method_field('delete')}}
                      <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Order?')"><img src="/delete.png" height="16px">Delete</button>
                 </form>
          </td>
      </tr>
    @endforeach

    <div class="hypebeast">
      {{$orders->links()}}
    </div>
     
  </tbody>
</table>
</div>
@endsection