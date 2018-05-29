<!DOCTYPE html>
<html>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
<head>

	<title>Register</title>
</head>
<body>
<div class="text-center">
	  <a href="http://localhost:8000/index"> <img src="{{asset ('logo1.png')}}"></a>
</div>



<div class="container " >
	<div class="row ">
		<div class="col-md-6 offset-md-3">
		<div class="card bg-light border-primary"  >
			<div class="card-header text-center">
			<h3>
					REGISTRATION FORM
			</h3>
			</div>
			<div class="card-body">

				<!-- successs message -->
				@if(session()->has('notif'))
			        <div class="">
			          <div class="alert alert-success text-center">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			            {{session()->get('notif')}}

			            <a href="{{url('/login')}}"><u>Here</u></a>
			        </div>
			      @endif

				<!-- end -->
				<form action="{{url('/register')}}" method="post" >
				{{csrf_field()}}
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username:</label>
					  <div class="col-sm-8">	
					<input   class="form-control" type="text" name="username" placeholder="Username" required="true">
					@if($errors->has("username"))
					{{$errors->first("username")}}
					@endif 
					</div>
				</div>

				<div class="form-group row">
						<label class="col-sm-4 col-form-label">Password:</label>
						  <div class="col-sm-8">
					<input type="password"  class="form-control" name="password" placeholder="Password" required="true">
					@if($errors->has("password"))
					{{$errors->first("password")}}
					@endif 
					</div>
					</div>
					<div class="form-group row">
						
						<label class="col-sm-4 col-form-label">Confirm Password:</label>
						  <div class="col-sm-8">
					<input type="password"   class="form-control" name="password_confirmation" placeholder="Confirm Password" required="true">
					</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Firstname:</label>
						  <div class="col-sm-8">
					<input type="text"  class="form-control" name="fname" placeholder="First Name" required="true">
					@if($errors->has("fname"))
					{{$errors->first("fname")}}
					@endif 
					</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Lastname:</label>
						  <div class="col-sm-8">
					<input type="text"  class="form-control" name="lname" placeholder="Last Name" required="true">

					@if($errors->has("lname"))
					{{$errors->first("lname")}}
					@endif 
					</div>
					</div>
					
					
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Birthdate:</label>
						  <div class="col-sm-8">
					<input type="date"  class="form-control" name="birthdate" required="true">
					@if($errors->has("birthdate"))
					{{$errors->first("birthdate")}}
					@endif 
					</div>
						
					</div>


					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Address:</label>
						  <div class="col-sm-8">
					<input type="text"  class="form-control" name="address" placeholder="Address" required="true">
					@if($errors->has("address"))
					{{$errors->first("address")}}
					@endif 
					</div>
						
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Email Address:</label>
						  <div class="col-sm-8">
					<input type="email"  class="form-control" name="email_add" placeholder="Email Address" required="true">
					@if($errors->has("email_add"))
					{{$errors->first("email_add")}}
					@endif 
					</div>
						
					</div>
					

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Contact Number:</label>
						  <div class="col-sm-8">
					<input type="text"  class="form-control" name="contact_no" placeholder="Contact Number" required="true">
					@if($errors->has("contact_no"))
					{{$errors->first("contact_no")}}
					@endif 
					</div>
						
					</div>

					<div class="form-group row">
					
					<input type="hidden" name="usertype" value="admin">
					@if($errors->has("contact_no"))
					{{$errors->first("contact_no")}}
					@endif 
					</div>
						
					</div>
					
					
					

					
					
					
				    <div class="text-center">
						<button class="btn btn-primary" type="submit">SUBMIT</button>
					</div>
					<div class="text-center mt-2"><a href="{{url('/login')}}"><u>Already have an account? Login</u></a></div>
				</form>			
			</div>
		</div>
		</div>
	</div>
	
</div>



</body>
</html>