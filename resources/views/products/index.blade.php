@extends('layouts')
@section('title','PRODUCTS')

@push('js')
<script type="text/javascript">
  $(document).ready(function () {
    @if($id = session('open-update-modal'))
      $("#exampleModalLongwa-{{$id}}").modal('show')
    @endif
    @if(session('open-create-modal'))
       $("#exampleModalLong").modal('show')
    @endif
  });
</script>
@endpush
@section('contentz')


<div class="card  mx-auto offset-md-4 border-primary col-md-11 mt-1 form-control">
  <table class="table bg-white table-hover text-center">

<!-- STARTcode for notification STORE / DELETE /UPDATE -->
      @if(session()->has('notif'))
        <div class="alert alert-success text-center">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session()->get('notif')}}
        </div>
      @endif

      @if(session()->has('delete'))
        <div class="alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session()->get('delete')}}
        </div>
      @endif

      @if(session()->has('update'))
        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session()->get('update')}}
        </div>
      @endif
<!-- EndCode for notification STORE / DELETE /UPDATE -->

  <div class="text-left">
      <a class="btn btn-primary" href="{{route('products.create') }}" data-target="#exampleModalLong" data-toggle="modal">Add Product</i></a>

  



<!--StartCode for Modal adding product-->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content border-primary">

      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">CREATE NEW PRODUCT (ADMIN SIDE)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

      </div>

      <div class="modal-body">
            <div class="card-body">
                <form action="{{route('products.store') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    
                   <div class="form-group" align="center">
                            Select image to upload:
                            <input type="file" name="itemimage" value="Upload Image" id="fileToUpload" required="true">
                         <div class="form-group mt-1" align="center">
                       <!-- code for file-upload -->   
                              <label for="name">filename:</label>
                               <input type="text"  name="name" placeholder="Enter" required="true">
                        </div> 
                  </div> 

                  <div class="form-group">
                        <label >Product Name</label>
                        <input type="text" class="form-control"  placeholder="Enter Product Name ..." name="itemname" required="true">
                            <div class="text-danger">
                                @if($errors->has("itemname"))
                                {{$errors->first("itemname")}}
                                @endif 
                            </div>
                  </div>

                   <div class="form-group">
                        <label >Product Description</label>
                        <input type="text" class="form-control"   placeholder="Enter Product Description ...  " name="item_description" required="true" > 
                          <div class="text-danger">
                              @if($errors->has("item_description"))
                              {{$errors->first("item_description")}}
                              @endif 
                          </div>
                   </div>

                  <div class="mb-3">
                  <label>Product Unit</label>
                         <div class="input-group ">
                           {!! Form::select('unit', $AllUnits->pluck('unit','unit')->prepend('Select a Product Unit...',''),null,['class' => 'form-control', 'id'=>'units' ,'required'=>'true'])!!}
                              <div class="form-inline ml-1">
                                  <a href="" data-toggle="modal" data-target="#exampleModalLongsad">
                                   <img src="{{asset ('plus-3x.png')}}" width="20px" height="20px"> 
                                   </a>
                             </div>
                         </div>
                     <div class="text-danger">
                        @if($errors->has("unit"))
                        {{$errors->first("unit")}}
                        @endif     
                     </div>
                  </div>

                    <div>
                      <label>Unit Price</label>
                       <div class="input-group ">
                         <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="/peso.png" width="30px"></span>
                          </div>
                          <input type="number" min=".50" max="10000000.00" step=".50" class="form-control"  pattern="[0-9]"  placeholder="Enter Unit price ..." name="unitprice" required="true">
                            <div class="text-danger">
                               @if($errors->has("unitprice"))
                               {{$errors->first("unitprice")}}
                               @endif 
                            </div>
                       </div>
                   </div>
                 
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" >Submit</button> 
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- ENd code for modal adding products -->


<!-- startcode for table -->
  <div class="table text-center">
      <img src="{{asset('product.png')}}" height="15%" width="%50">
       

       <!-- startcode for search box -->
         {!! Form::open(['method'=>'GET','url' => route('products.index'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
      <div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
          <input type="text" class="form-control" name="search"  placeholder="Search...">
          <span class="input-group-btn">
              <button class="btn btn-primary ml" type="submit"><img src="/searchbutton.png" width="20px">
               Search
              </button>
          </span>
      </div>
      {!! Form::close() !!}
      <!-- ENDcode for search box -->


           <thead class="thead-inverse">
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Product Unit</th>
            <th>Unit Price</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          <tr>
              <td><img src="{{$product->name}}" width="40px" height="40px"></td>
              <td><div class="text-left">{{$product->itemname}}</div></td>
              <td>{{$product->item_description}}</td>
              <td> {{$product->unit}}</td>
              <td>{{$product->unitprice}} </td>
              <td>
                  <form action="{{'/products/'.$product->id,'/edit'}}" method="post">
                      <a href="" class="btn btn-primary btn-sm" data-target="#exampleModalLongwa-{{$product->id}}" data-toggle="modal"><img src="/edit.png" height="15px"> Edit</a>
                      {{csrf_field()}}
                      {{method_field('delete')}}
                      <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Product?')"><img src="/delete.png" height="16px">Delete</button>
                  </form>
              </td>
           </tr>

      </tbody>
</div>
<!-- ENDcode for table -->

<!-- STARTCODE Modal EDITING product-->
      <div class="modal fade" id="exampleModalLongwa-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content border-primary">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">EDIT PRODUCT (ADMIN SIDE)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                <div class="card-body">
                <form action="{{'/products/'.$product->id,'/edit'}}" method="POST">
                 {{csrf_field()}}
                 {{method_field('PUT')}}
                        <!-- code for file-upload -->  
                               <div class="form-group" align="center">
                                      <img src="{{$product->name}}" class="form-control" width="20%" height="30%">
                                      <input type="file" name="itemimage" value="Upload Image" id="fileToUpload" >
                                        <div class="form-group mt-1" align="center">
                                                   <label for="name">filename:</label>
                                                   <input type="text"  name="name" placeholder="Enter" required="true">
                                        </div> 
                              </div> 
                      
                                <div class="form-group">
                                      <label >Product Name</label>
                                      <input type="text" class="form-control"  placeholder="Enter Product Name ..." name="itemname" required="true"  value="{{$product->itemname}}">
                                         <div class="text-danger">
                                           @if($errors->has("itemname"))
                                           {{$errors->first("itemname")}}
                                           @endif 
                                        </div>
                                </div>

                                 <div class="form-group">
                                      <label >Product Description</label>
                                      <input type="text" class="form-control"   placeholder="Enter Product Description ...  " name="item_description" required="true" value="{{$product->item_description}}"> 
                                              <div class="text-danger">
                                                 @if($errors->has("item_description"))
                                                 {{$errors->first("item_description")}}
                                                 @endif 
                                              </div>
                                </div>

                                <div class="mb-3">
                                <label>Product Unit</label>
                                    <div class="input-group ">
                                         {!! Form::select('unit', $AllUnits->pluck('unit','unit')->prepend('Select a Product Unit...',''),$product->unit,['class' => 'form-control', 'id'=>'units','required'=>'true'])!!}
                                          <div class="form-inline ml-1">
                                            <a href="" data-toggle="modal" data-target="#exampleModalLongsad">
                                             <img src="{{asset ('plus-3x.png')}}" width="20px" height="20px"> 
                                             </a>
                                         </div>
                                    </div>
                                              <div class="text-danger">
                                                 @if($errors->has("unit"))
                                                 {{$errors->first("unit")}}
                                                 @endif 
                                              </div>
                                </div>


                                <label>Unit Price</label>
                                <div class="input-group ">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">Php</span>
                                        </div>
                                   <input type="number" min=".50" max="10000000.00" step=".50" class="form-control"  pattern="[0-9]"  placeholder="Enter Unit price ..." name="unitprice" required="true" value="{{$product->unitprice}}">

                                            <div class="text-danger">
                                                 @if($errors->has("unitprice"))
                                                 {{$errors->first("unitprice")}}
                                                 @endif 
                                              </div>
                                </div>
                               
                  
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary" >Save</button> 
                              </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <div class="hypebeast">
        {{$products->links()}}
      </div>
      
</div>
</table>




                <!-- Modal adding unit-->
                  <div class="modal fade" id="exampleModalLongsad" tabindex="-1" role="document" aria-labelledby="exampleModalLongTitlesad" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content border-primary col-md-10 offset-md-1">

                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitlesad">ADD NEW UNIT (ADMIN SIDE)</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>

                        <div class="modal-body">

                              <div class="card-body">
                                  <form action="{{route('units.store')}}" method="POST">
                                         {{csrf_field()}}

                                           <div class="form-group">
                                                <label >Product Unit </label>
                                                <input type="text" class="form-control" placeholder="Enter Product Unit" name="unit" required="true"> 

                                                <small id="passwordHelpBlock" class="form-text text-primary">
                                                  Product Unit must contain letter(s) only.
                                                </small>
                                          </div>  
                                          <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary" >Submit</button> 
                                          </div>
                                  </form>

                                  <div>
                                    <table class="table mx-auto table-sm" align="center">
                                     
                                      <thead class="text-center">
                                        <tr>
                                          <th>Unit(s)</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>

                                      <tbody class="text-center">
                                        @foreach($AllUnits as $unit)
                                        <form action="{{'/units/'.$unit->id,'/destroy'}}" method="POST">

                                         {{csrf_field()}}
                                         {{method_field('delete')}}
                                        <tr>
                                          <td>{{$unit->unit}}</td>
                                          <td>
                                             <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Product?')"><img src="/delete.png" height="16px">Delete</button>
                                          </td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                      </form>
                                    </table>
                                  </div>
                                
                               </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
<!-- end of modal code -->

</div>

@endsection
@push('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#units').change(function(){
   
    })
  })
</script>
@endpush