@extends('layouts')
@section('contentz')

<div>

<div class="mx-auto offset-md-4 col-md-10 bg-light  form-control " >

  <div class="class text-center">
    <h1>ORDER FORM</h1>

  </div>
  <form>
    <!-- firstname -->
   <div class="form-row text-center">
    <div class="form-group col-md-6 ">
      <label >First Name</label>
      <input type="text" class="form-control" id="firstname" placeholder="Name">
    </div>

    <!--end-->


    <!--Lastname-->
    <div class="form-group col-md-6">
      <label >Last Name</label>
      <input type="text" class="form-control" id="lastname" placeholder="Name">
    </div>
    <!--end-->
   
    <!-- DateofDelivery -->
     </div>
     <div class="mt-4 mb-4">
     <div class="form-row text-center">
      <div class="form-group col-md-4">
      <label >Date of Delivery</label>
      <input type="date" class="form-control" id="inputPassword4" placeholder="Date">
     </div>
     <!--end -->

      <!-- payment -->
       <div class="form-group col-md-4">
      <label >Payment Method</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Payment">
     </div>
     <!-- end -->

     <!-- contact -->
       <div class="form-group col-md-4">
      <label >Contact</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Contact number">
     </div>
     <!-- end -->
     </div>
     </div>
     </form>

      <form>
   <div class="form-row ">
    <div class="form-group col-md-12">
      <label>Address</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Address">
    </div>
  
     </div>
     </form>

     <!-- Codes for table- -->

     <div class="mx-auto  bg-light col-md-12 mt-1" >
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>ITEM#</th>
      <th>ITEM NAME</th>
      <th>UNIT</th>
      <th>UNIT PRICE</th>
      <th>QTY</th>
      <th>TOTAL</th>
      

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Washed Sand</td>
      <td>cubic</td>
      <td>1,000.00</td>
      <td><input   class="form-control" type="text" name="username" placeholder="qty"></td>
      <th>-</th>
    
    </tr>
      <tr>
      <th scope="row">2</th>
      <td>Cement</td>
      <td>bag</td>
      <td>215.00</td>
      <td><input   class="form-control" type="text" name="username" placeholder="qty"></td>
      <th>-</th>
  
    </tr>
    </tr>   <tr>
      <th scope="row">3</th>
      <td>Common Nail #3</td>
      <td>kilo</td>
      <td>75.00</td>
      <td><input   class="form-control" type="text" name="username" placeholder="qty"></td>
      <th>-</th>
    
    </tr>
    
    
  </tbody>
</table>

    

</div>
  <div class=" offset-md-9">
        <b>TOTAL AMOUNT:</b>
      </div>
   
 <div class="text-right mt-3">

 <a href="home" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
    
        <button type="button" class="btn btn-primary  text-center" >Submit</button>
 </div>
   
  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->

  </div>
 </div>

@endsection