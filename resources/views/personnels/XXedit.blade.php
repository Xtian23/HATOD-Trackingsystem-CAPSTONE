@extends('layouts')

@section('contentz')  


        <div class="card border-primary mb-3 col-md-4 offset-md-4"">
  <div class="card-header">Edit Personnel</div>
        
      <div class="card-body">
    <form action="{{'/personnels/'.$personnel->id,'/edit'}}" method="POST">
{{csrf_field()}}
{{method_field('PUT')}}


   <div class="form-group">
    <label >ID</label>
    <input type="text" class="form-control"  disabled="true" placeholder="" name="id" value="{{$personnel->id}}">
    
  </div>
  
  <div class="form-group">
    <label >firstname</label>
    <input type="text" class="form-control"  placeholder="First name" name="personnel_fname" value="{{$personnel->personnel_fname}}">
    
  </div>


  <div class="form-group">
    <label >lastname</label>
    <input type="text" class="form-control"  placeholder="Last name" name="personnel_lname" value="{{$personnel->personnel_lname}}">
    
  </div>

  <div class="form-group">
    <label >address</label>
    <input type="text" class="form-control"  placeholder="Address" name="address" value="{{$personnel->address}}">
    
  </div>
  <div class="form-group">
    <label >age</label>
    <input type="text" class="form-control"  placeholder="Age" name="age" value="{{$personnel->age}}">
    
  </div>
  <div class="form-group">
    <label >contact no.</label>
    <input type="text" class="form-control"  placeholder="Contact Number" name="contact_no" value="{{$personnel->contact_no}}">
    
  </div>
  
  <div class="modal-footer">
       <a href="/personnels" class="btn btn-secondary  active" role="button" aria-pressed="true">Cancel</a>
    <button type="submit" class="btn btn-primary" >Save</button>
</div>
</form>
  </div>
  </div>



@endsection