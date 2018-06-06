@extends('layouts')
@section('title','PERSONNELS')

@push('js')
<script type="text/javascript">
  $(document).ready(function () {
    @if($id = session('open-update-modal'))
      $("#exampleModalLongsa-{{$id}}").modal('show')
    @endif
    @if(session('open-create-modal'))
       $("#exampleModalLong").modal('show')
    @endif
  });
</script>
@endpush
@section('contentz')
    


<div class="mx-auto offset-md-4 bg-light col-md-11 mt-1 form-control">
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
   
   <!-- Trigger Button -->
  <a class="btn btn-primary" href="{{route('personnels.create') }}" data-target="#exampleModalLong" data-toggle="modal">Add Personnel</a>

  <!-- Stard Code Modal For Adding New Personnel-->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content border-primary">


          <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">CREATE NEW PERSONNEL </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>

          <div class="modal-body">

          <div class="card-body">
              <form action="{{route('personnels.store') }}" method="POST">
              {{csrf_field()}}
                  


                  <div class="form-group">
                      <label >First Name</label>
                      <input type="text" class="form-control"  placeholder="Enter First name ..." name="personnel_fname" required="true">
                         <div class="text-danger">   
                           @if($errors->has("personnel_fname"))
                           {{$errors->first("personnel_fname")}}
                           @endif 
                        </div>
                  </div>

                  <div class="form-group">
                      <label >Last Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Last name ..." name="personnel_lname" required="true">
                        <div class="text-danger">
                             @if($errors->has("personnel_lname"))
                             {{$errors->first("personnel_lname")}}
                             @endif 
                        </div>
                  </div>

                  <div class="form-group">
                      <label >Address</label>
                      <input type="text" class="form-control"  placeholder="Enter Address ..." name="address" required="true">

                         <div class="text-danger">
                              @if($errors->has("address"))
                             {{$errors->first("address")}}
                             @endif 
                         </div>

                  </div>

                  <div class="form-group">  
                      <label >Birthdate</label>
                      <input type="date" class="form-control"  placeholder="Birthdate" name="birthdate" required="true">
                          <div class="text-danger">
                              @if($errors->has("birthdate"))
                              {{$errors->first("birthdate")}}
                              @endif 
                          </div>
                  </div>

                  <div class="form-group">
                      <label >Contact Number</label>
                      <input type="text" class="form-control"  placeholder="Enter Contact Number ..." name="contact_no" required="true">
                          <div class="text-danger">
                               @if($errors->has("contact_no"))
                               {{$errors->first("contact_no")}}
                               @endif
                           </div>
                  </div>

               <!--Start Pluck Personnel Type -->
               <label >Personnel Type</label>
               <div class="input-group">
               {!! Form::select('personneltype', $AllPersonnelTypes->pluck('personneltype','personneltype')->prepend('Select a Personnel Type...',''),null,['class' => 'form-control', 'id'=>'personnel_types','required'=>'true'])!!}
                    <div class="form-inline">              
                           <a href="" class="ml-1" data-toggle="modal" data-target="#exampleModalLongsada">
                           <img src="{{asset ('plus-3x.png')}}" width="20px" height="20px"></a>
                    </div> 
                          <div class="text-danger">
                             @if($errors->has("personneltype"))
                             {{$errors->first("personneltype")}}
                             @endif 
                         </div>


               </div>

                       
                   
                <div class="row mt-3">
                  <div class="col-md-12">
                  <div class="card card-login text-black bg-white mb-3 border-primary"  >
                    <div class="card-header text-Left">
                      Create Personnel Account
                    </div>
                    <div class="card-body">
                      <label>Username</label>
                      <input type="text" name="username"  class="form-control" required="true">
                          <div class="text-danger">
                               @if($errors->has("username"))
                               {{$errors->first("username")}}
                               @endif 
                          </div>
                      <label>Password</label>
                      <input type="password" name="password" class="form-control"required="true">
                          <div class="text-danger">
                               @if($errors->has("password"))
                               {{$errors->first("password")}}
                               @endif 
                          </div>
                      <input type="hidden" name="usertype" value="userclerk">
                    </div>
                  </div>
                  </div>
                </div>
               <!--END Pluck Personnel Type -->
                  <!-- StartCode Button for Close / Submit -->
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary" >Submit</button> 
                  </div>
                  <!-- ENDCode Button for Close / Submit -->
         </form>
        </div>
       </div>
    </div>
   </div>
 </div>
<!-- endcode MOdalt Adding Personnel -->

  <!-- StartCode Modal for  adding Personnel Type-->
    <div class="modal fade" id="exampleModalLongsada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitlesad" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content border-primary col-md-10 offset-md-1">

              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitlesad">ADD NEW PERSONNEL TYPE </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
              </div>

              <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('personneltypes.store') }}" method="POST">
                    {{csrf_field()}}

                       <div class="form-group">
                            <label >Personnel Type</label>
                            <input type="text" class="form-control" placeholder="Enter Personnel Type ..." name="personneltype" required="true"> 
                              <div class="text-danger">
                                  @if($errors->has("personneltype"))
                                   {{$errors->first("personneltype")}}
                                   @endif 
                              </div>
                       </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button> 
                      </div>
                    </form>
                 </div>
               </div>
             </div>
           </div> 
         </div> 
  <!-- ENDCode Modal for  adding Personnel Type-->

      <!-- startCode for Table -->
      <div class="text text-center">
        <img src="{{asset('personnels.png')}}" width="20%" height="20%">

            {!! Form::open(['method'=>'GET','url' => route('personnels.index'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
                <input type="text" class="form-control" name="search"  placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-primary ml" type="submit"><img src="/searchbutton.png" width="20px">
                     Search
                    </button>
                </span>
            </div>
            {!! Form::close() !!}
          
      		 <thead class="thead-inverse">
              <tr>
                <th>PERSONNEL NAME</th>
                <th>ADDRESS</th>
                <th>AGE</th>
                <th>CONTACT #</th>
                <th>TYPE</th>
                <th>Action</th>
              </tr>
           </thead>
        <tbody>
        		@foreach($personnels as $personnel)
        		<tr>
          			<td>
                    <div class="text-left">
            				{{$personnel->personnel_fname}}
                    {{$personnel->personnel_lname}}
                    </div>
          			</td>
          		
          			<td>{{$personnel->address}}</td>
                <td>{{$personnel->age}}</td>
          			<td>{{$personnel->contact_no}}</td>
                <td>
                  <div class="label label-success"> 
                       <b>{{$personnel->personneltype}}</b>
                  </div>
                </td>
                <td>
                    <form action="{{'/personnels/'.$personnel->id,'/edit'}}" method="post">
                        <a href="" class="btn btn-primary btn-sm"  data-target="#exampleModalLongsa-{{$personnel->id}}" data-toggle="modal"><img src="/edit.png" height="15px"> Edit</a>
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-danger btn-sm"  name="submit" onclick="return confirm('Are you sure you want to delete this Personnel?')"> <img src="/delete.png" height="16px">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
      </div>
      <!-- ENDCode for Table -->


      <!-- Stard Code for Modal Edit Personnel -->
            <div class="modal fade" id="exampleModalLongsa-{{$personnel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content border-primary">

                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT PERSONNEL </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                  </div>

                  <div class="modal-body">
                    
                  <div class="card-body">
                  <form action="{{'/personnels/'.$personnel->id,'/edit'}}" method="POST">
                      {{csrf_field()}}
                      {{method_field('PUT')}}

                            <div class="form-group">
                              <label >First Name</label>
                              <input type="text" class="form-control"  placeholder="First name" name="personnel_fname" required="true" value="{{$personnel->personnel_fname}}">
                                     <div class="text-danger">
                                        @if($errors->has("personnel_fname"))
                                         {{$errors->first("personnel_fname")}}
                                         @endif 
                                     </div>
                            </div>

                            <div class="form-group">
                              <label >Last Name</label>
                              <input type="text" class="form-control"  placeholder="Last name" name="personnel_lname" required="true" value="{{$personnel->personnel_lname}}">
                                    <div class="text-danger">
                                        @if($errors->has("personnel_lname"))
                                       {{$errors->first("personnel_lname")}}
                                       @endif 
                                    </div>
                            </div>

                            <div class="form-group">
                              <label >Address</label>
                              <input type="text" class="form-control"  placeholder="Address" name="address" required="true" value="{{$personnel->address}}">
                                  <div class="text-danger">
                                        @if($errors->has("address"))
                                       {{$errors->first("address")}}
                                       @endif 
                                   </div>
                            </div>

                            <div class="form-group">  
                              <label >Birthdate</label>
                              <input type="date" class="form-control"  placeholder="Age" name="birthdate" required="true" value="{{$personnel->birthdate}}">
                                    <div class="text-danger">
                                          @if($errors->has("birthdate"))
                                           {{$errors->first("birthdate")}}
                                           @endif 
                                     </div>
                            </div>

                            <div class="form-group">
                              <label >Contact Number</label>
                              <input type="text" class="form-control"  placeholder="Contact Number" name="contact_no" required="true" value="{{$personnel->contact_no}}">
                                    <div class="text-danger">
                                        @if($errors->has("contact_no"))
                                         {{$errors->first("contact_no")}}
                                         @endif 
                                   </div>
                            </div>

                                  <label >Personnel Type</label>
                                  <div class="input-group">
                                      {!! Form::select('personneltype', $AllPersonnelTypes->pluck('personneltype','personneltype')->prepend('Select a Personnel Type...',''),$personnel->personneltype,['class' => 'form-control', 'id'=>'personnel_types','required'=>'true'])!!}
                                          <div class="text-danger">
                                                @if($errors->has("personneltype"))
                                                 {{$errors->first("personneltype")}}
                                                 @endif
                                          </div>
                                  </div>


                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                      <div class="card card-login text-black bg-white mb-3 border-primary"  >
                                        <div class="card-header text-Left">
                                         Edit Personnel Account
                                        </div>
                                        <div class="card-body">
                                          <label>Username</label>
                                          <input type="text" name="username" value="" class="form-control">
                                                <div class="text-danger">
                                                      @if($errors->has("username"))
                                                       {{$errors->first("username")}}
                                                       @endif 
                                                 </div>
                                          <label>Password</label>
                                          <input type="password" name="password"  value="{{$personnel->password}}" class="form-control">
                                                <div class="text-danger">
                                                     @if($errors->has("password"))
                                                     {{$errors->first("password")}}
                                                     @endif
                                                 </div>
                                         <input type="hidden" name="usertype" value="userclerk">

                                     
                                        </div>
                                      </div>
                                      </div>
                                    </div>

             

                             <div class="modal-footer">    
                              <a href="/personnels" class="btn btn-secondary
                             active" role="button" aria-
                             pressed="true">Cancel</a>    <button type="submit"
                             class="btn btn-primary">Submit</button> </div>

                      </form>
                   </div>
                 </div>
                </div>
              </div>
            </div>
            <!-- end of modal code -->
       
    		@endforeach

      <div class="hypebeast">
        {{$personnels->links()}}
      </div>
      
  	</table>
  </div>
@endsection 
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
    $('#personnel_types').change(function(){
    
    })
  })
</script>
@endpush