<!-- @extends('layouts')

@section('contentz')

<div class="container mt-3" >
  <div class="row ">
    <div class="col-md-4 offset-md-4">
    <div class="card text-white bg-secondary "  >
      <div class="card-header">
        CREATE NEW CUSTOMER
      </div>
      <div class="card-body">
    <form action="{{route('customers.store') }}" method="POST">
{{csrf_field()}}
  <div class="form-group">
    <label >firstname</label>
    <input type="text" class="form-control"  placeholder="First name" name="customer_fname">
    
  </div>


  <div class="form-group">
    <label >lastname</label>
    <input type="text" class="form-control"  placeholder="Last name" name="customer_lname">
    
  </div>

  <div class="form-group">
    <label >address</label>
    <input type="text" class="form-control"  placeholder="Address" name="address">
    
  </div>
  <div class="form-group">
    <label >age</label>
    <input type="text" class="form-control"  placeholder="Age" name="age">
    
  </div>
  <div class="form-group">
    <label >contact no.</label>
    <input type="text" class="form-control"  placeholder="Contact Number" name="contact_no">
    
  </div>
  
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
  </div>
</div>
</div>

@endsection -->