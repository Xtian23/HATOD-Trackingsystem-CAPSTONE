@extends('layouts')

@section('contentz')


        <div class="card border-primary mb-3 col-md-4 offset-md-4"">
  <div class="card-header">Edit Customer</div>
        
      <div class="card-body">
    <form action="{{'/customers/'.$customer->id,'/edit'}}" method="POST">
{{csrf_field()}}
{{method_field('PUT')}}

  <div class="form-group">
    <label >firstname</label>
    <input type="text" class="form-control"  disabled="true" placeholder="First name" name="customer_fname" value="{{$customer->customer_fname}}">
    
  </div>


  <div class="form-group">
    <label >lastname</label>
    <input type="text" class="form-control" disabled="true" placeholder="Last name" name="customer_lname" value="{{$customer->customer_lname}}">
    
  </div>

  <div class="form-group">
    <label >address</label>
    <input type="text" class="form-control"  placeholder="Address" name="address" value="{{$customer->address}}">
    
  </div>
  <div class="form-group">
    <label >age</label>
    <input type="text" class="form-control"  placeholder="Age" name="age" value="{{$customer->age}}">
    
  </div>
  <div class="form-group">
    <label >contact no.</label>
    <input type="text" class="form-control"  placeholder="Contact Number" name="contact_no" value="{{$customer->contact_no}}">
    
  </div>
  
 <div class="modal-footer">
    <a href="/customers" class="btn btn-secondary  active" role="button" aria-pressed="true">Cancel</a>
    <button type="submit" class="btn btn-primary" >Save</button>
</div>
</form>
  </div>
  </div>



@endsection