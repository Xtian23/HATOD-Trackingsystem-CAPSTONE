@extends('layouts')
@section('title','VEHICLES')

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



<div class="mx-auto offset-md-4 border-primary col-md-11 mt-1 form-control">
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
   <a class="btn btn-primary" href="{{route('vehicles.create') }}" data-target="#exampleModalLong" data-toggle="modal">Add Vehicle</a>



  <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-primary">

      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">CREATE NEW VEHICLE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>

      <div class="modal-body">
        
      <div class="card-body">
      <form action="{{route('vehicles.store') }}" method="POST">
      {{csrf_field()}}

  
            <div class="form-group">
                  <label >License Plate</label>
                  <input type="text" class="form-control"  placeholder="Enter License Plate number ..." name="license_plate" required="true">
                                <div class="text-danger">
                                      @if($errors->has("license_plate"))
                                      {{$errors->first("license_plate")}}
                                      @endif 
                                </div>
            </div>




               <label >Vehicle Type</label>
               <div class="input-group">
                   {!! Form::select('vehicletype', $AllVehicleTypes->pluck('vehicletype','vehicletype')->prepend('Select a Vehicle Type...',''),null,['class' => 'form-control', 'id'=>'vehicle_types','required'=>'true'])!!}
                      <div class="form-inline">              
                          <a href="" class="ml-1" data-toggle="modal" data-target="#exampleModalLongsada">
                          <img src="{{asset ('plus-3x.png')}}" width="20px" height="20px"> 
                          </a>
                      </div> 
                                
                </div>
                                <div class="text-danger">
                                      @if($errors->has("vehicletype"))
                                      {{$errors->first("vehicletype")}}
                                      @endif 
                                </div>
                              

            <div class="form-group">
                  <label >Vehicle Description</label>
                  <input type="text" class="form-control"  placeholder="Enter Vehicle -  Brand/Model" name="made" required="true">
                                <div class="text-danger">
                                      @if($errors->has("made"))
                                      {{$errors->first("made")}}
                                      @endif 
                                </div>
                
            </div>

              <div class="form-group">
                    <label >Delivery Personnel</label>
                    {!! Form::select('delivery_personnel', $AllPersonnels->pluck('fullname','fullname')->prepend('Select a Delivery Personnel...',''),null,['class' => 'form-control', 'id'=>'personnel-name','required'=>'true'])!!}

                               <div class="text-danger">
                                      @if($errors->has("delivery_personnel"))
                                      {{$errors->first("delivery_personnel")}}
                                      @endif 
                                </div>
              </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-primary" >Submit</button> 
             </div>

        </form>
        </div>


 
  <!-- ------------------------------------------------------------------- -->
 
    </div>
  </div>
</div>

 



</div>
<div class="text-center">
  <!--     <h3>VEHICLES LIST</h3> -->
  <img src="{{asset('vehicles.png')}}" width="25%" height="20%">
  </div> 
  
{!! Form::open(['method'=>'GET','url' => route('vehicles.index'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}

<div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-primary ml" type="submit"><img src="/searchbutton.png" width="20px">
         Search
        </button>
    </span>
</div>
{!! Form::close() !!}
		 <thead class="thead-inverse">
    <tr>
      <th>License Plate</th>
      <th>Vehicle Type</th>
      <th>Vehicle Description</th>
      <th>Delivery Personnel-Assigned</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
  		@foreach($vehicles as $vehicle)
  		<tr>
  			<td>
  				{{$vehicle->license_plate}}
  			</td>
        <td>
          {{$vehicle->vehicletype}}
        </td>
  			<td>
  				{{$vehicle->made}}
  			</td>
  			<td>
  				<b>{{$vehicle->delivery_personnel}}</b>
  			</td>
          <td>
             <form action="{{'/vehicles/'.$vehicle->id,'/edit'}}" method="post">
            <a href="" class="btn btn-primary btn-sm" data-target="#exampleModalLongwa-{{$vehicle->id}}" data-toggle="modal" ><img src="/edit.png" height="15px"> Edit</a>
            {{csrf_field()}}
            {{method_field('delete')}}

            <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Vehicle?')"><img src="/delete.png" height="16px">Delete</button>
            </form>
        </td>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLongwa-{{$vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content border-primary">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">EDIT VEHICLE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                
              <div class="card-body">
             <form action="{{'/vehicles/'.$vehicle->id,'/edit'}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
          
                  <div class="form-group">
                  <label >License Plate</label>
                  <input type="text" class="form-control"  placeholder="Enter License Plate number ..." name="license_plate" required="true" value="{{$vehicle->license_plate}}">
                        <div class="text-danger">
                                      @if($errors->has("license_plate"))
                                      {{$errors->first("license_plate")}}
                                      @endif 
                                </div>  
                 </div>

                   <label >Vehicle Type</label>
                   <div class="form-group">
                         {!! Form::select('vehicletype', $AllVehicleTypes->pluck('vehicletype','vehicletype')->prepend('Select a Vehicle Type...',''),$vehicle->vehicletype,['class' => 'form-control', 'id'=>'vehicle_types','required'=>'true'])!!}
                           <div class="text-danger">
                                      @if($errors->has("vehicletype"))
                                      {{$errors->first("vehicletype")}}
                                      @endif 
                                </div>  
                        
                   </div>

                <div class="form-group">
                  <label >Vehicle Description</label>
                  <input type="text" class="form-control"  placeholder="Enter Vehicle -  Brand/Model" name="made" required="true" value="{{$vehicle->made}}">
                                <div class="text-danger">
                                      @if($errors->has("made"))
                                      {{$errors->first("made")}}
                                      @endif 
                                </div>
                  
                </div>

                  <div class="form-group">
                  <label >Delivery Personnel</label>
                    {!! Form::select('delivery_personnel', $AllPersonnels->pluck('fullname','fullname')->prepend('Select a Delivery Personnel...',''),$vehicle->delivery_personnel,['class' => 'form-control', 'id'=>'personnel-name','required'=>'true'])!!}

                                <div class="text-danger">
                                      @if($errors->has("delivery_personnel"))
                                      {{$errors->first("delivery_personnel")}}
                                      @endif 
                                </div>



                
                 <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" >Submit</button> 
                </div>
          </form>
          </div>


              </div>
             
            </div>
          </div>
        </div>

        <!-- end of modal code --> 
  		</tr>
  		@endforeach

      <div class="hypebeast">
        {{$vehicles->links()}}
      </div>
      
  </tbody>
	</table>

   <!-- Modal adding product-->
    <div class="modal fade" id="exampleModalLongsada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitlesad" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content border-primary col-md-10 offset-md-1">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitlesad">ADD NEW VEHICLE TYPE (ADMIN SIDE)</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

          </div>

          <div class="modal-body">

                <div class="card-body">
                    <form action="{{route('vehicletypes.store') }}" method="POST">
                        {{csrf_field()}}


                           <div class="form-group">
                                <label >Vehicle Type</label>
                                <input type="text" class="form-control"  placeholder="Enter Vehicle Type" name="vehicletype" required="true"> 
                               
                          </div>
                          <div class="modal-footer">
                               <button type="submit" class="btn btn-primary" >Submit</button> 
                          </div>
                    </form>
                                <div>
                                    <table class="table mx-auto table-sm" align="center">
                                     
                                      <thead class="text-center">
                                        <tr>
                                          <th>Vehicle Type(s)</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>

                                      <tbody class="text-center">
                                        @foreach($AllVehicleTypes as $vehicletype)
                                        <form action="{{'/vehicletypes/'.$vehicletype->id,'/destroy'}}" method="POST">

                                         {{csrf_field()}}
                                         {{method_field('delete')}}
                                        <tr>
                                          <td>{{$vehicletype->vehicletype}}{{'s'}}</td>
                                          <td>
                                             <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Vehicle Type?')"><img src="/delete.png" height="16px">Delete</button>
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
     <!-- endcODE FOR MODAL ADD NEW TYPE VEHICLE-->


</div>



@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
    $('#vehicle_types').change(function(){
    
    })
  })

      $(document).ready(function(){
    $('#personnel').change(function(){
    
    })
  })
</script>
@endpush