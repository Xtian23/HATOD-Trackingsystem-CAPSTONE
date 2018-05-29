@extends('layouts')

@section('contentz')


        <div class="card  border-primary mb-3 col-md-4 offset-md-4"">
  <div class="card-header">Edit Vehicle</div>
        
      <div class="card-body">
    <form action="{{'/vehicles/'.$vehicle->id,'/edit'}}" method="POST">
{{csrf_field()}}
{{method_field('PUT')}}

 <div class="form-group">
    <label >Truck ID</label>
    <input type="text" class="form-control"  disabled="true" placeholder="" name="id" value="{{$vehicle->id}}">
    
  </div>

 <div class="form-group">
    <label >License Plate</label>
    <input type="text" class="form-control"  placeholder="license plate no." name="license_plate" value="{{$vehicle->license_plate}}">
    
  </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Vehicle Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="vehicle_type">
      <option>4wheel Type</option>
      <option>Tricycle Type</option>
    </select>
  </div>


  <div class="form-group">
    <label >Made</label>
    <input type="text" class="form-control"  placeholder="made/brand" name="made" value="{{$vehicle->made}}">
    
  </div>
  <div class="form-group">
    <label >Delivery Personnel</label>
    <input type="text" class="form-control"  placeholder="delivery personnel" name="delivery_personnel" value="{{$vehicle->delivery_personnel}}">
    
  </div>
  
  
 
<div class="modal-footer">
     <a href="/vehicles" class="btn btn-secondary  active" role="button" aria-pressed="true">Cancel</a>
    <button type="submit" class="btn btn-primary" >Save</button>
</div>
</form>
  </div>
</div>




@endsection