@extends('layouts')
@section('title','REPORTS')
@section('contentz')



<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control" >
<table class="table">


  <div class="text-left" >
<div>
    <a href="{{url('/printable') }}"  class="btn btn-primary  btn-sm" role="button" aria-pressed="true"><img src="{{'/print.png'}}" width="20px"> Print</a>
</div>
    
  <div class="text-center  mt-3">
      <h3>ADMIN REPORT LIST </h3>
  </div>
  </div>


<div class=" col-md-12  ml-1" >


   <div class="mt-4 mb-2 ">
     <div class="form-row text-center  ">


    <!-- Start Code for Search BOX Upper Right -->
      {!! Form::open(['method'=>'GET','url' => route('orders.index'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
      <div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
          <input type="text" class="form-control" name="search"  placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" class="btn btn-primary"><img src="/filter.png" width="20px"> Filter</button>
          </span>
      </div>
      {!! Form::close() !!}
      <!-- END Code for Search BOX Upper Right -->

         </form>  
    </div>
  </div>
</div>



  <thead class="thead-inverse">
    <tr>
      <th>ORDER#</th>
      <th>Order Date/Time</th>
      <th>Customer</th>
      <th>Address</th>
      <th>Delivered By</th>
      <th>Status</th>
      <th>Total Amount</th>
      <th class="text-center">
        <span></span>
          Action  
      </th>


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
           <td>    <!-- Button trigger modal -->
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong-{{$row->id}}"><img src="/view.png" width="20px"> View</button>
                <!-- Modal -->
                              <div class="modal fade" id="exampleModalLong-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="">
                                        <b>Order ID:</b>
                                          {{ $row->id }}
                                      </div>
                                      <div class="">
                                        <b>Customer Name:</b>
                                        {{ $row->customer->fullname}}
                                      </div>
                                      <div class="">
                                        <b>Address:</b>
                                        {{ $row->customer->address }}
                                      </div>
                                      <div class="">
                                          <b>Date Ordered:</b>
                                          {{ date_create($row->created_at)->format('M d, Y h:i a') }}
                                      </div>
                                       <div class="">
                                        <b>Assigned-Clerk:</b>
                                        {{ $row->clerk->fullname }}
                                      </div>
                                        <div class="">
                                        <b>Date/Time Delivered:</b>
                               
                                      </div>
                                       <div class="">
                                        <b>Delivered By:</b>
                                        {{ $row->deliveryPersonnel->fullname }}
                                      </div>

                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th colspan="3" class="text-center">Ordered Item(s):</th>
                                            </tr>
                                            <tr>
                                              <th>Product Name</th>
                                              <th>Quantity</th>
                                              <th>Unit Price</th>
                                              <th>Subtotal</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($row->details as $order)
                                              <tr>
                                                <td>
                                                  {{$order->product->itemname}}
                                                </td>
                                                <td>
                                                  {{$order->quantity}}
                                                </td>
                                                <td>
                                                  {{$order->product->unitprice}}
                                                </td>
                                                <td>
                                                  <div class="form-group">
                                                    {{ number_format(($order->quantity * $order->product->unitprice), 2) }}
                                                  </div>
                                                </td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>



                                           <div class="text-right">
                                            <b>Total:</b>
                                            {{ number_format($row->total, 2) }} 
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Go Back</button>

                                    </div>
                                  </div>
                                </div>
                              </div>
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