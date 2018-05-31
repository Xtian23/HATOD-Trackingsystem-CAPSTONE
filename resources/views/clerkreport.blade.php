@extends('clerklayouts')
@section('title','CLERK REPORTS')
@section('content')



<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control" >
<table class="table">


  <div class="text-left" >
<!--     <a href="{{route('orders.create') }}"  class="btn btn-primary  " role="button" aria-pressed="true">Add Order</a> -->
<div>
    <a href="{{url('/clerkprintable') }}"  class="btn btn-primary  btn-sm" role="button" aria-pressed="true"><img src="{{'/print.png'}}" width="20px"> Print</a>
</div>
  <div class="text-center  mt-3">
      <h3>CLERK REPORT LIST</h3>
  </div>
  </div>


<div class=" col-md-12  ml-1" >


   <div class="mt-4 mb-2 ">
     <div class="form-row text-center  ">
      <form action="" method="POST">

           <div class="form-group col-md-2">
              <label for="exampleFormControlSelect2"><b>Choose</b></label>
                <select class="form-control" id="exampleFormControlSelect2">
                    <option>weekly</option> 
                    <option>monthly</option>
                    <option>yearly</option>
                </select>
           </div>

            <div class="form-group col-md-2">
                <label ><b>Start Date</b></label>
                <input type="date" class="form-control">
            </div>
 

           <div class="form-group col-md-2">
                <label for="exampleFormControlSelect2"><b>End Date</b></label>
                <input type="date" class="form-control">
           </div>
       
           <div class="form-group col-md-3">
            <label for="exampleFormControlSelect2"><b>Customers</b></label>
              <select class="form-control" id="exampleFormControlSelect2">
                <option>JanJan Ambot</option>
                <option>Rebicca Manos</option>
                <option>Gian Kaindoy</option>
              </select>
           </div>

            <div class="form-group col-md-2">
            <label for="exampleFormControlSelect2"><b>Status</b></label>
              <select class="form-control" id="exampleFormControlSelect2">
                <option>RECEIVED</option>
                <option>DELIVERED</option>
              </select>
            </div>

            <div class="form-inline col-md-1" >
             <button type="button" class="btn btn-primary"><img src="/filter.png" width="20px"> Filter</button>
           </div>

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
        <td>{{ date_create($row->order_date)->format('M d, Y') }}</td>
        <td>{{ $row->customer->fullname}}</td>
        <td>{{ $row->customer->address }}</td>
        <td>{{ $row->deliveryPersonnel->fullname }}</td>
        <td>{{ $row->status}}</td>
        <td class="text-right">{{ number_format($row->total, 2) }}</td>
        <td>    <!-- Button trigger modal -->
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><img src="/view.png" width="20px"> View</button>
        </td>
       
          
      </tr>



    @endforeach



    <div class="hypebeast">
      {{$orders->links()}}
    </div>
     
  </tbody>
</table>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
          2
        </div>
        <div class="">
          <b>Date Ordered:</b>
          May 2, 2018 12:00pm     
        </div>
         <div class="">
          <b>Assigned-Clerk:</b>
          Xtian D Great
        </div>
          <div class="">
          <b>Date/Time Delivered:</b>
          May 2, 2018 3:00pm
        </div>
         <div class="">
          <b>Delivered By:</b>
          Gian Galicinao
        </div>
        <div class="">
          <b>Customer Name:</b>
        </div>
        <div class="">
          <b>Address:</b>
          BF TOWNHOMES
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
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Go Back</button>

      </div>
    </div>
  </div>
</div>

   
   


            </td>
          </tr>
              </tbody>
    </table>
  </div>
</div>    
 -->

@endsection