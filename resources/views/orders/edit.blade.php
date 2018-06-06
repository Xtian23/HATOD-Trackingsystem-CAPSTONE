@extends('layouts')
@section('title','ORDERS')
@section('contentz')

{!! Form::open(['url' => route('orders.update', ['id' => $orders->id]), 'method'=> 'patch']) !!}
<div>

<div class="col-md-10 offset-md-1 bg-light  form-control border-primary " >
 
  <div class="class text-center">
    <h1>ORDER FORM</h1>

  </div>
  @if($errors->count())
   <div class="alert alert-danger">
     <ul class="list-unstyled">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
   </ul>
   </div>
  @endif
  <form>
    <!-- firstname -->
   <div class="form-row text-center">
      <input type="hidden" class="form-control text-center" name="status" id="status" value="Pending">
    <div class="form-group col-md-6">
      <label >Customer Name</label>
      {!! Form::select('customer_id', $AllCustomers->pluck('fullname','id')->prepend('Select a customer...',''),$orders->customer_id,['class' => 'form-control', 'id'=>'customer-name', 'disabled'])!!}
      {!! Form::hidden("customer_id", $orders->customer_id) !!}
    </div>

    <!--end-->


    <!--Lastname-->
    <div class="form-group col-md-3">
      <label >Contact Number</label>
      <input type="text" class="form-control text-center" name="contact_no" id="contact-number" disabled="true" data-contacts="{{htmlspecialchars(json_encode($AllCustomers->pluck('contact_no','id')))}}">
    </div>
    <!--end-->

    <div class="form-group col-md-3">
      <label>Status</label>
      {!! Form::select('status', ['' => 'Status ...', 'pending' => 'pending', 'processed' => 'processed', 'delivered' => 'delivered', 'receieved' => 'receieved'],$orders->status,['class' => 'form-control'])!!}
    </div>
   
    <!-- DateofDelivery -->
     </div>
     <div class="mt-4 mb-4">
     <div class="form-row text-center">
      <div class="form-group col-md-4">
      <label >Date  Ordered</label>
      {!! Form::date('order_date', $orders->order_date, ['class' => 'form-control', 'placeholder' => 'Date of Ordered', 'readonly']) !!}
     </div>
     <!--end -->

      <!-- payment -->
       <div class="form-group col-md-4">
            <label for="exampleFormControlSelect2">Payment Method</label>
            {!! Form::select('payment_method', ['' => 'Payment Method', 'cod' => 'Cash on delivery', 'cash' => 'Cash', 'credit' => 'Credit'],$orders->payment_method,['class' => 'form-control'])!!}
       </div>
     <!-- end -->

     <!-- contact -->
       <div class="form-group col-md-4">
      <label >Email Address </label>
      <input type="text" class="form-control text-center" name="email_add" id="email-add" disabled="true" data-emails="{{htmlspecialchars(json_encode($AllCustomers->pluck('email_add','id')))}}">
     </div>
     <!-- end -->
     </div>
     </div>
     </form>

      <form>
   <div class="form-row ">
    <div class="form-group col-md-12">
      <label>Address</label>
      <input type="text" class="form-control" name="address" id="customer-address" disabled="true" data-addresses="{{htmlspecialchars(json_encode($AllCustomers->pluck('address','id')))}}">
    </div>


  
     </div>
     </form>
 
   {!! Form::open(['method'=>'GET','url' => route('orders.edit',['id' => $orders->id]),'class'=>'navbar-form navbar-left','role'=>'search'])  !!} <div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
                <input type="text" class="form-control" name="search"  placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-primary ml" type="submit">
                     Search
                    </button>
                </span>
            </div>
            {!! Form::close() !!}

     <!-- Codes for table- -->

     <div class="mx-auto  bg-light col-md-12 mt-1" >
<table class="table  table-hover">
  <thead class="thead-inverse">
    <tr>
      <th class="text-center">Product Image</th>
      <th>Product Name</th>
      <th>Product Description</th>
      <th>Unit</th>
      <th>Unit Price</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Sub-Total</th>
      
    </tr>
  </thead>

<tbody id="transaction" data-orders="{{ htmlspecialchars($orders->details) }}">
    @foreach($orders->details as $order)
      <tr>
       

          <td align="center">
            {!! Form::checkbox("details[{$loop->index}][product_id]", $order->product_id, $order->id, ['class' => 'form-check-input product prc product-has-val']) !!}
                  <img src="{{asset($order->product->image_path)}}" width="50px" height="50px">
            
          </td>
            <td>
                  <div class="form-group">
              
             {{$order->product->itemname}}
                </div>
            </td>

            <td>
                  <div class="form-group">
           
               {{$order->product->item_description}}
                  </div>
            </td>

            <td> {{$order->product->unit}}</td>

            <td>
              {{ $order->product->unitprice }}
                  <div class="form-group">
                    {!! Form::hidden("details[{$loop->index}][unit_price]", $order->product->unitprice, ['class' => 'form-control unit-price', 'disabled' => true]) !!}
                  </div>
            </td>

            <td>
                   <div class="form-group">
                    {!! Form::text("details[{$loop->index}][quantity]", $order->quantity, ['class' => 'form-control prc text-center quantity', 'disabled' => true, 'placeholder' => 'Enter quantity']) !!}
                  </div>
            </td>
            <td>
                    <div class="form-group">
                   <input type="text" class="form-control total text-right" name="subtotal" value="{{ number_format(($order->quantity * $order->product->unitprice), 2) }}" id="result" value="" disabled="true">
                 </div>
            </td>
      </tr>
    @endforeach
    @foreach($products as $product)
        <tr>
           <td align="center">
              {!! Form::checkbox("details[{$loop->index}][product_id]", $product->id, false , ['class' => 'form-check-input product prc product-has-no-val']) !!}
              <img src="{{asset($product->image_path)}}" width="50px" height="50px">
            </td>
           
              <td>
                <div class="form-group">
                  {{$product->itemname}}
                </div>
              </td>

              <td>
                <div class="form-group">
                  {{$product->item_description}}
                </div>
              </td>

              <td> 
                {{$product->unit}}
              </td>

              <td>
                {{ $product->unitprice }}
                <div class="form-group">
                  {!! Form::hidden("details[{$loop->index}][unit_price]", $product->unitprice, ['class' => 'form-control unit-price', 'disabled' => true]) !!}
                </div>
              </td>

              <td>
                 <div class="form-group">
                  {!! Form::text("details[{$loop->index}][quantity]", null, ['class' => 'form-control prc text-center quantity', 'disabled' => true, 'placeholder' => 'Enter quantity']) !!}
                </div>
              </td>
              <td>
                  <div class="form-group">
                   <input type="text" class="form-control total" name="subtotal" id="result" value="" disabled="true">
                 </div>
              </td>
        </tr>
      @endforeach


    
  </tbody>
</table>
    
<div class="form-group col-md-4 float-right">
  <label ><b>Total Amount</b></label>
  <input type="text" class="form-control grandtotal" id="net" name="total" placeholder="Total Amount" value="" readonly="true">
</div>

</div>
  

        <!-- total amount -->
           
            
            <!--end-->
               <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1"><b>Served by:</b></label>
                <input type="text" disabled class="form-control" value="{{Auth::user()->fname}}">

                <input type="hidden" class="form-control" name="served_by" value="{{Auth::user()->id}}">
            </div>  

               


            <!--served by-->
            <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1"><b>Delivered by:</b></label>
              {!! Form::select('delivered_by', $AllPersonnels->pluck('fullname','id')->prepend('Select a Delivery...',''),$orders->delivered_by,['class' => 'form-control', 'id'=>'personnel-name'])!!}
            </div>


          
                   
   
 <div class="text-right mt-3">

 <a href="{{route('orders.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
    
        <button type="submit" class="btn btn-primary  text-center" >Submit</button>
 </div>

  </div>
 </div>

 {!! Form::close() !!}

@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#customer-name').each(function(){
      if($(this).val()){
        var contactnumbers = $('#contact-number').data('contacts')
        $('#contact-number').val(contactnumbers[$(this).val()])

        var email_address = $('#email-add').data('emails')
        $('#email-add').val(email_address[$(this).val()])

        var customer_address = $('#customer-address').data('addresses')
        $('#customer-address').val(customer_address[$(this).val()])
      }
    })
  })
    $(document).ready(function(){
    $('#personnel-name').change(function(){
   
    })
  })


// javascript for quantityXunitprice =getsSubtotalandTotal
      $('.form-group').on('change', '.prc', function(){
      var net = 0
      $('#transaction tr').each(function () {
        var itemIsChecked = $(this).find('.product').prop('checked');
          
        if(itemIsChecked){
          var unitprice = parseFloat($(this).find('.unit-price').val() || 0),
            quantity = parseFloat($(this).find('.quantity').val() || 0),
            total = (unitprice * quantity);

          $(this).find('.total').val(total.toFixed(2))
          net+=total;
          // net = net + total  

        }else{
          $(this).find('.total').val(0)

        }

        $('#net').val(net.toFixed(2))

      })
    });

    $('.prc').trigger('change'); 

    $('.product').change(function (argument) {
      if($(this).prop('checked')){
        $(this).closest('tr').find('.quantity').removeAttr('disabled')
        $(this).closest('tr').find('.unit-price').removeAttr('disabled')
          // $(this).closest('tr').find('.grandtotal').removeAttr('readonly')

      }else{
        $(this).closest('tr').find('.quantity').val('').attr('disabled', 'disabled')
        $(this).closest('tr').find('.unit-price').attr('disabled', 'disabled')
        $(this).closest('tr').find('.grandtotal').val('').attr('disabled','disabled')
        $(this).closest('tr').find('.total').val('')

      }
    }).trigger('change')

    $(document).ready(function(){
      var order = $('table tbody').data('orders');

      $.each(order, function(key, item){
         $('.product-has-no-val[value="'+item.product_id+'"]').closest('tr').addClass('d-none')
       })
    })




</script>
@endpush