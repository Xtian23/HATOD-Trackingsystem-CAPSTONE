<!DOCTYPE html>
<html>
<!-- linking BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
<head>
	<title>
		LOGIN
	</title>




</head>
<body>

	   <div class="text-center mt-0">
          	  <a href="http://localhost:8000/index"> <img src="{{asset ('logo1.png')}}"></a>
          </div>


	
<div class="container mt-2" >

	<div class="row ">
		<div class="col-md-4 offset-md-4">
		<div class="card card-login text-black bg-white mb-3 border-primary"  >
			<div class="card-header text-Left">
				Please Login
			</div>
			<div class="card-body">
				<form action="{{url('/login')}}" method="post" 	>

				{{csrf_field()}}

				@if(session('loginError'))
				<div class="alert alert-danger">
					{{session('loginError')}} 
				@endif
				<div class="form-group">
					<label><img src="/user.png" width="20px"> Username</label>
					<input class="form-control" type="text" name="username" required="true">
				</div>
					 
			
					
				<div class="form-group">
					<label><img src="/password.png" width="20px"> Password</label>
					<input class="form-control" type="password" name="password" required="true">
				</div>
					
							
						<div class="text-center">
						     <button class="btn btn-primary" ><img src="/login.png" width="20px"> Login</button>
						 </div>
						<a href="/register"><p class="mt-2 text-center"><u>Click Here to Register</u></p></a>			
							
						

					
				</form>
			</div>
		</div>
		</div>
	</div>
	
</div>



</body>
</html>