<!-- @extends('layouts')

@section('contentz')


<div class="container mt-3" >
  <div class="row ">
    <div class="col-md-4 offset-md-4">
    <div class="card text-white bg-secondary "  >
      <div class="card-header">
        CREATE NEW PRODUCT
      </div>
      <div class="card-body">
<form action="{{route('products.store') }}" method="POST">
{{csrf_field()}}
  <div class="form-group">
    <label >Item Name</label>
    <input type="text" class="form-control"  placeholder="Item Name" name="itemname">
    
  </div>


  <div class="form-group">
    <label >Unit</label>
    <input type="text" class="form-control"  placeholder="unit" name="unit">
    
  </div>

  <div class="form-group">
    <label >Unit Price</label>
    <input type="text" class="form-control"  placeholder="unit price" name="unitprice">
    
  </div>
  
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>

</div>
</div>
</div>
@endsection -->