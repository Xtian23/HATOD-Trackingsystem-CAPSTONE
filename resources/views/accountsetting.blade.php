@extends('layouts')
@section('title','ACCOUNT SETTINGS')
@section('contentz')

<div class="mx-auto offset-md-4 border-primary col-md-10 mt-1 form-control">
  <table class="table bg-white table-hover text-center">
    <div class="row">
      <div class="card-body">
        <div class="card-header text-center" >
        <h3>ACCOUNT SETTINGS</h3>
        </div>
      </div>
    </div>
  <!-- IMAGE -->
    <!-- validation message -->
             @if(session()->has('update'))
                  <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   {{session()->get('update')}}
                  </div>
              @endif
    <!-- end validation -->
    <div class="card-body">
      <form action="{{'/user/'.Auth::user()->id,'/edit'}}" method="POST" enctype="multipart/form-data" >
        {{csrf_field()}}
        {{method_field('PUT')}}

<div>
      <div class="card mx-auto" style="width: 10rem;">
        <img src="{{Auth::user()->image_path}}" class="card-img" >

      </div>
         <input type="file" class="offset-md-5 mt-3" name="userimage" value="{{Auth::user()->image_path}}" id="fileToUpload">
    </div>




        <div class="form-group">
          <div class="row">
            <div class="form-group col-4 offset-md-1 text-center">
              <label><b>Username</b></label>
              <input type="text" class="form-control text-center" placeholder="Username" id="username" name="username" value="{{Auth::user()->username}}">

              <div class="text-danger">
                @if($errors->has("username"))
                 {{$errors->first("username")}}
                @endif 
              </div>

            </div>
            <div class="form-group col-4 offset-md-2 text-center">
              <label><b>User Type</b></label>
              <input type="text" class="form-control text-center" placeholder="User Type" id="usertype" name="usertype" value="{{Auth::user()->usertype}}" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-5">
            <label><b>First Name</b></label>
            <input type="text" class="form-control" placeholder="First name" id="fname" name="fname" value="{{Auth::user()->fname}}">

              <div class="text-danger">
                 @if($errors->has("fname"))
                 {{$errors->first("fname")}}
                 @endif 
              </div>

          </div>
          <div class="form-group col-md-5">
            <label><b>Last Name</b></label>
            <input type="text" class="form-control" placeholder="Last name" id="lname" name="lname" value="{{Auth::user()->lname}}">

            <div class="text-danger">
               @if($errors->has("lname"))
               {{$errors->first("lname")}}
               @endif 
            </div>

          </div>
          <div class="form-group col-md-2">
            <label><b>Age</b></label>
            <input type="text" class="form-control" id="bday" name="age" value="{{Auth::user()->age}}" readonly>
          </div>
        </div>


        <div class="row">
          <div class="form-group col-8">
            <label><b>Address</b></label>
            <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}">

              <div class="text-danger">
                 @if($errors->has("address"))
                 {{$errors->first("address")}}
                 @endif 
              </div>

          </div>
          <div class="form-group col-4">
            <label><b>Contact Number</b></label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{Auth::user()->contact_no}}">

              <div class="text-danger">
                  @if($errors->has("contact_no"))
                   {{$errors->first("contact_no")}}
                  @endif 
              </div>

          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <label><b>Birthdate</b></label>
            <input type="date" class="form-control" id="bday" name="birthdate" value="{{Auth::user()->birthdate}}">

              <div class="text-danger">
                  @if($errors->has("birthdate"))
                   {{$errors->first("birthdate")}}
                  @endif 
              </div>

          </div>
          <div class="form-group col-6">
            <label><b>Email Address</b></label>
            <input type="text" class="form-control" placeholder="Email Address" id="email" name="email_add" value="{{Auth::user()->email_add}}">

              <div class="text-danger">
                  @if($errors->has("email_add"))
                   {{$errors->first("email_add")}}
                  @endif 
              </div>

          </div>
        </div>
        
        <div class="row">
          <div class="form-group col-6">
            <label><b>Change Password</b></label>
            <input type="password" class="form-control"  name="password" placeholder="Enter New Password">

              <div class="text-danger">
                  @if($errors->has("password"))
                   {{$errors->first("password")}}
                  @endif 
              </div>

          </div>

          <div class="form-group col-6">
            <label><b>Confirm Password</b></label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">

              <div class="text-danger">
                  @if($errors->has("password_confirmation"))
                  {{$errors->first("password_confirmation")}}
                  @endif 
              </div>

          </div>
        </div>

        </br></br>
        <div class="row">
          <div class="form-group col-md-4 offset-md-10">
            <button type="submit" class="btn btn-primary col-md-4">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </table>
</div>
@endsection 