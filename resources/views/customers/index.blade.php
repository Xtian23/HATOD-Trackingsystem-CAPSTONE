@extends('layouts')
@section('title','CUSTOMERS')

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
<!-- ENDcode for notification STORE / DELETE /UPDATE -->        

  <!-- trigger BUTTON -->
  <a class="btn btn-primary" href="{{route('customers.create') }}" data-target="#exampleModalLong" data-toggle="modal">Add Customer</a>
  <!--START Modal for Creadting NEW CUSTOMER -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog  " role="document">
                <div class="modal-content border-primary">

                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">CREATE NEW CUSTOMER </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                  
                  <div class="card-body">
                    <form action="{{route('customers.store') }}" method="POST">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label >First Name</label>
                        <input type="text" class="form-control"   placeholder="Enter First name ..." name="customer_fname" required="true">
                     <!--    <small class="text-primary">
                          First name accepts letter(s) only.
                        </small>
 -->                                <div class="text-danger">
                                        @if($errors->has("customer_fname"))
                                      {{$errors->first("customer_fname")}}
                                      @endif 
                                </div>
                      </div>


                      <div class="form-group">
                        <label >Last Name</label>
                        <input type="text" class="form-control"   placeholder="Enter Last name ..." name="customer_lname" required="true">
                     <!--       <small class="text-primary">
                              Last name accepts letter(s) only.
                            </small> -->
                                <div class="text-danger">
                                      @if($errors->has("customer_lname"))
                                      {{$errors->first("customer_lname")}}
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
                        <input type="date"  class="form-control"  placeholder="Enter Birthdate ..." name="birthdate" required="true">
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

                        <div class="form-group">
                        <label >Email Address (Optional)</label>
                        <input type="email" class="form-control"  placeholder="Enter Email Address ..." name="email_add" >
                                <div class="text-danger">
                                       @if($errors->has("email_add"))
                                      {{$errors->first("email_add")}}
                                      @endif 
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
  <!-- END Modal for Creadting NEW CUSTOMER -->



<!-- StartCode for Customer Table -->
<div class="table text-center">

     <!-- START code for CUSTOMER IMAGE LOGO /LIST -->
     <img src="{{asset('customer.png')}}" width="30%" height="25%">
     <!-- End CoDE FOR CUSTOMER IMAGE LOGO/LIST -->

    <!-- Start Code for Search BOX Upper Right -->
      {!! Form::open(['method'=>'GET','url' => route('customers.index'),'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
      <div class="input-group custom-search-form col-md-4 offset-md-8 mb-3">
          <input type="text" class="form-control" name="search"  placeholder="Search...">
          <span class="input-group-btn">
              <button class="btn btn-primary ml" type="submit"><img src="/searchbutton.png" width="20px">
               Search
              </button>
          </span>
      </div>
      {!! Form::close() !!}
      <!-- END Code for Search BOX Upper Right -->


  

		 <thead class="thead thead-inverse">
        <tr>
          <th>Customer Name</th>
          <th>Address</th>
          <th>Age</th>
          <th>Contact Number</th>
          <th>Email Address</th>
          <th>Action</th>
        </tr>
     </thead>

   <tbody>
  		@foreach($customers as $customer)
    		<tr>
        			<td>
                  <div class="text-left">
          				{{$customer->customer_fname}}
                    {{$customer->customer_lname}}
                 </div>   
        			</td>
        			<td>{{$customer->address}} </td>
              <td>{{$customer->age}}</td>
        			<td>{{$customer->contact_no}}</td>
        		  <td>{{$customer->email_add}}</td>
                
              <td>
                  <form action="{{'/customers/'.$customer->id,'/edit'}}" method="post">
                     <!--  <a href="" class="btn btn-primary btn-sm" data-target="#exampleModalLongwa-{{$customer->id}}" data-toggle="modal">Edit</a> -->

                      <a  href="" class="btn btn-primary btn-sm"  data-target="#exampleModalLongwa-{{$customer->id}}" data-toggle="modal"><img src="/edit.png" height="15px"> Edit</a>
                      {{csrf_field()}}
                      {{method_field('delete')}}
                      <button type="submit" class="btn btn-danger btn-sm"  name="submit"  onclick="return confirm('Are you sure you want to delete this Customer?')"><img src="/delete.png" height="16px">Delete</button>
                  </form>
              </td>


        <!--START Modal for Creadting NEW CUSTOMER -->
            <div class="modal fade" id="exampleModalLongwa-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog  " role="document">
                <div class="modal-content border-primary">

                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">EDIT CUSTOMER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                  
                  <div class="card-body">
                    <form action="{{'/customers/'.$customer->id,'/edit'}}" method="POST">
                      {{csrf_field()}}
                        {{method_field('PUT')}}
                      <div class="form-group">
                        <label >First Name</label>
                        <input type="text" class="form-control"   placeholder="Enter First name ..." name="customer_fname"  value="{{$customer->customer_fname}}">
                            <div class="text-danger">
                                 @if($errors->has("customer_fname"))
                                 {{$errors->first("customer_fname")}}
                                 @endif 
                            </div>
                      </div>


                      <div class="form-group">
                        <label >Last Name</label>
                        <input type="text" class="form-control"  placeholder="Enter Last name ..." name="customer_lname" required="true" value="{{$customer->customer_lname}}">
                          <div class="text-danger">
                              @if($errors->has("customer_lname"))
                              {{$errors->first("customer_lname")}}
                              @endif 
                          </div>
                      </div>

                      <div class="form-group">
                        <label >Address</label>
                        <input type="text" class="form-control"  placeholder="Enter Address ..." name="address" required="true" value="{{$customer->address}}">
                              <div class="text-danger">
                                    @if($errors->has("address"))
                                    {{$errors->first("address")}}
                                    @endif 
                              </div>  
                      </div>
                      <div class="form-group">  
                        <label >Birthdate</label>
                        <input type="date"  class="form-control"  placeholder="Enter Birthdate ..." name="birthdate" required="true"  value="{{$customer->birthdate}}">
                              <div class="text-danger">
                                  @if($errors->has("birthdate"))
                                  {{$errors->first("birthdate")}}
                                  @endif 
                              </div>
                      </div>
                      <div class="form-group">
                        <label >Contact Number</label>
                        <input type="text" class="form-control"  placeholder="Enter Contact Number ..." name="contact_no" required="true" value="{{$customer->contact_no}}">
                            <div class="text-danger">
                                @if($errors->has("contact_no"))
                                {{$errors->first("contact_no")}}
                                @endif 
                            </div>
                      </div>

                        <div class="form-group">
                        <label >Email Address (Optional)</label>
                        <input type="email" class="form-control"  placeholder="Enter Email Address ..." name="email_add" value="{{$customer->email_add}}">
                            <div class="text-danger">
                                @if($errors->has("email_add"))
                                {{$errors->first("email_add")}}
                                @endif 
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
  <!-- END Modal for Creadting NEW CUSTOMER -->
        </tr>
      @endforeach



      <div class="hypebeast">
      {{$customers->links()}}
      </div>
     
   </tbody>
	</table>
</div>
@endsection


 