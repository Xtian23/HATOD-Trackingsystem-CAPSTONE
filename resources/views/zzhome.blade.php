@extends('layouts')


<!-- @section('footerbayut')
bayut jud ka
@endsection -->

@section('title','ORDERS')


@section('contentz')

<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control" >
<table class="table">


  <div class="text-left" >
    <a href="order_form" class="btn btn-primary  active" role="button" aria-pressed="true">Create Order</a>
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
    <tr>
      <th scope="row">1</th>
      <td>1/21/2018|8:00am</td>
      <td>Christian Vincent Kaindoy</td>
      <td>Abuno,Pajac Lapu-Lapu City</td>
      <td>Jerry Tom</td>
      <th>PENDING</th>
      <td>15,123.00</td>
       <td><div>
              <a href=""><img src="icon/png/eye-3x.png"></a>
         </div>
      </td>
       
      <td><div>
              <a href=""><img src="icon/png/circle-x-3x.png"></a>
         </div>
      </td>
       
    </tr>
      <tr>
      <th scope="row">2</th>
      <td>1/21/2018|8:00am</td>
      <td>JanjJan Ambot</td>
      <td>Opra,Lasang Cebu City</td>
      <td>Jerry Tom</td>
      <th>PENDING</th>
      <td>5,000.00</td>
       <td>
              <a href=""><img src="icon/png/eye-3x.png"></a>
         
      </td>
       
      <td>
              <a href=""><img src="icon/png/circle-x-3x.png"></a>
         
      </td>
 
    </tr>
    </tr>   <tr>
      <th scope="row">3</th>
      <td>1/21/2018|8:00am</td>
      <td>Christian Vincent Kaindoy</td>
      <td>Abuno,Pajac Lapu-Lapu City</td>
      <td>Jerry Tom</td>
      <th>PENDING</th>
      <td>15,123.00</td>
      <td><div>
              <a href=""><img src="icon/png/eye-3x.png"></a>
         </div>
      </td>
       
      <td><div>
              <a href=""><img src="icon/png/circle-x-3x.png"></a>
         </div>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection