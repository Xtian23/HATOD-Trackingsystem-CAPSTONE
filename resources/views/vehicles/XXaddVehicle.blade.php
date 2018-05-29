<!-- @extends('layouts')

@section('contentz')

<div class="container mt-3" >
  <div class="row ">
    <div class="col-md-4 offset-md-4">
    <div class="card text-white bg-secondary "  >
      <div class="card-header">
        CREATE NEW VEHICLE
      </div>
      <div class="card-body">
    <form action="{{route('vehicles.store') }}" method="POST">
{{csrf_field()}}
  <div class="form-group">
    <label >License Plate</label>
    <input type="text" class="form-control"  placeholder="license plate no." name="license_plate">
    
  </div>


  <div class="form-group">
    <label >Vehicle Type</label>
    <input type="text" class="form-control"  placeholder="vehicle type" name="vehicle_type">
    
  </div>

  <div class="form-group">
    <label >Made</label>
    <input type="text" class="form-control"  placeholder="made/brand" name="made">
    
  </div>
  <div class="form-group">
    <label >Delivery Personnel</label>
    <input type="text" class="form-control"  placeholder="delivery personnel" name="delivery_personnel">
    
  </div>
  
  
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>
  </div>
</div>
</div>

@endsection -->