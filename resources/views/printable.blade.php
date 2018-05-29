@extends('layouts')
@section('title','PRINTABLE REPORTS')
@section('contentz')



<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control" >
<table class="table">


  <div class="text-left" >
<!--     <a href="{{route('orders.create') }}"  class="btn btn-primary  " role="button" aria-pressed="true">Add Order</a> -->

    
  <div class="text-center  mt-3">
      <h3>ADMIN REPORT LIST </h3>
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
 
          
      </tr>


    @endforeach

    <div class="hypebeast">
      {{$orders->links()}}
    </div>



     
     
  </tbody>
</table>
</div>

 <!-- start ofW -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-xl ml-3  mt-3" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="ml-3">
              <label><b>Order #:</b></label>
              <!-- echo value for order ID -->
            </div>
            <div class="ml-3">
              <label><b>Status:</b></label>
              <!-- echo value for order ID -->
            </div>

            <div class="ml-3">
              <label><b>Assign-Clerk:</b></label>
              <!-- echo value for order ID -->
            </div>
            <div class="ml-3">
              <label><b>Delivered By:</b></label>
              <!-- echo value for order ID -->
            </div>
            <div class="modal-body">
                 <form>
                  <div>
                    <!-- firstname -->
                   <div class="form-row text-center">
                    <div class="form-group col-md-8 ">
                      <label >Customer Name</label>
                      <input type="text" class="form-control" name="" disabled="">
 
                    </div>

                    <!--end-->


                    <!--Lastname-->
                    <div class="form-group col-md-4">
                      <label >Contact Number</label>
                      <input type="text" class="form-control text-center" name="contact_no" id="contact-number" disabled="true">
                    </div>
                    <!--end-->
                   
                    <!-- DateofDelivery -->
                     </div>
                     <div class="mt-4 mb-4">
                         <div class="form-row text-center">
                          <div class="form-group col-md-4">
                          <label >Date  Ordered</label>
                          <input type="text" class="form-control" name="" disabled="true">
      
                         </div>
                         <!--end -->

                          <!-- payment -->
                           <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect2">Payment Method</label>
                                 <input type="text" class="form-control" name="" disabled="true">
                             
                           </div>
                         <!-- end -->

                         <!-- contact -->
                           <div class="form-group col-md-4">
                          <label >Email Address (Optional)</label>
                          <input type="text" class="form-control text-center" name="email_add" id="email-add" disabled="true" >
                         </div>
                         <!-- end -->
                         </div>
                     </div>
               

     
                   <div class="form-row ">
                        <div class="form-group col-md-12">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" id="customer-address" disabled="true" >
                        </div>
                     </div>

                     <div class="col-md-12">
                       <table class="table">
                        <thead>
                         <tr>
                           <th>Product Image</th>
                             <th>Product Name</th>
                               <th>Quantity</th>
                                 <th>Unit Price</th>
                         </tr>
                         </thead>
                       </table>
                     </div>

                         <div class="form-group col-md-4 float-right">
                            <label ><b>Total Amount</b></label>
                            <input type="text" class="form-control grandtotal" id="net" name="total" placeholder="Total Amount" readonly="true">
                          </div>

                             
                

  
         </div>                 
     

</form>

         <!-- end of modal VIEW -->
   


            </td>
          </tr>
              </tbody>
    </table>
  </div>
</div>    


@endsection