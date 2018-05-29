@extends('layouts')

@section('contentz')  


        <div class="card  border-primary mb-3 col-md-4 offset-md-4"">
  <div class="card-header">Edit Product</div>
        
      <div class="card-body">
  <form action="{{'/products/'.$product->id,'/edit'}}" method="POST">
{{csrf_field()}}
{{method_field('PUT')}}

    <div class="form-group">  
    <label >Item ID</label>
    <input type="text" class="form-control"  placeholder="id" disabled="true" name="id" value="{{$product->id}}">
    
  </div>

    <div class="form-group">
    <label >Item Name</label>
    <input type="text" class="form-control"  placeholder="Item Name" name="itemname" value="{{$product->itemname}}">
    
  </div>


  <div class="form-group">
    <label >Unit</label>
    <input type="text" class="form-control"  placeholder="unit" name="unit" value="{{$product->unit}}">
    
  </div>

  <div class="form-group">
    <label >Unit Price</label>
    <input type="text" class="form-control"  placeholder="unit price" name="unitprice" value="{{$product->unitprice}}">
    
  </div>
  
    <div class="modal-footer">
    <a href="/products" class="btn btn-secondary  active" role="button" aria-pressed="true">Cancel</a>
  <button type="submit" class="btn btn-primary" >Save</button> 
  </div>
</form>

</div>
</div>







@endsection