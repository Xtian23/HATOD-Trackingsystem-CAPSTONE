
<!DOCTYPE >
<html>
<!-- linking BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.min.js')}}">
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
 
	<!-- end-->
	

<title>@yield('title')</title>

</head>

<body>

<!-- code for navigation -->
<nav class="navbar navbar-xtian navbar-dark bg-dark navbar-expand-lg  ">
  <a class="navbar-brand" href="/clerkindex"><img src="/logo1.png"  width="200px" height="40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

               <li class="nav-item active dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                      </a>


                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <!--                <a class="dropdown-item" href="#">Products</a> -->
                        <a class="dropdown-item" href="{{route('clerkcustomers.index')}}"><img src="/customers.png" width="25px"> Customers</a>

                      </div>

                </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{route('clerkorders.index')}}">Order<span class="sr-only">(current)</span></a>
            </li>

            <!--   <li class="nav-item active">
                <a class="nav-link" href="https://liteonebiz.tech/kaindoy/hatudlocation.html">Track</a>
              </li>
              -->


                 <li class="nav-item active">
                    <a class="nav-link" href="{{url('/clerkreport')}}">Report</a>
                  </li>
         
              <!-- end -->
                  <li class="nav-item active dropdown">
         
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Hello, {{Auth::user()->username}}!
                </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('/accountsetting')}}" data-toggle="modal" data-target="#exampleModalCenter"><img src="/profile.png" width="25px">User's Profile</a>
                 <!--  <a class="dropdown-item" href="{{url('/accountsetting')}}">Account Settings</a> -->
                  <a class="dropdown-item" href="{{url('/logout')}}"><img src="/logout.png" width="18px"> Logout</a>
                </div>
                  </li>
          

          </ul>
        </div>
    </nav>

          <div class="logo text-center">
          	  <a href="http://localhost:8000/index"> <img src="{{asset ('logo1.png')}}" ></a>
          </div>




<!-- <div class="text-center">
</br></br></br></br></br>
  <h1>WELCOME CLERKS</h1>
</div>
          -->       



<!-- Button trigger modal -->

<!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centere " role="document">
          <div class="modal-content ">
            <div class="modal-header ">
              <h5 class="modal-title" id="exampleModalCenterTitle">User Profile 
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
        

              <form action="" method="POST">
               {{csrf_field()}}
                 {{method_field('PUT')}}
        
                 <div align="center">
                      <img src="/avatar.png" class="rounded mx-auto d-block " alt="..." height="100px" width="100px">
                 </div>

                <div class="col-md-4 offset-md-4 mb-3 text-center">
                   <label for="username"><b>{{Auth::user()->username}}</b></label>
                  
                </div>

               <div class="form-row">
                    <div class="col-md-5 mb-3">
                      <label for="firstname"><b>First name</b></label>
                      <input type="text" class="form-control" value="{{Auth::user()->fname}}" >
                      
                    </div>

                    <div class="col-md-5 mb-3">
                      <label for="lastname"><b>Last name</b></label>
                      <input type="text" class="form-control"  value="{{Auth::user()->lname}}" >
                      
                    </div>

                     <div class="col-md-2 mb-3">
                      <label for="age"><b>Age</b></label>
                      <input type="text" class="form-control"  value="{{Auth::user()->age}}" >
              
                    </div>
                
                
                    <div class="col-md-8 mb-3">
                      <label for="address"><b>Address</b></label>
                      <input type="text" class="form-control" value="{{Auth::user()->address}}" >
                 
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="contact_no"><b>Contact Number</b></label>
                      <input type="text" class="form-control" " value="{{Auth::user()->contact_no}}">
                    
                    </div>


            <!--           <div class="col-md-12 mb-3">
                      <label for="email address"><b>Email Address</b></label>
                      <input type="text" class="form-control"  placeholder="Address" value="" >
                     
                    </div>
               -->

                  <!--                  <div class="form-control"><label><b>Manage Account</b></label>
                                    <div class="col-md-12 mb-3">
                                      <label for="new_password"><b>Username</b></label>
                                      <input type="text" class="form-control" id="new_password" placeholder="Enter New Username" value="{{Auth::user()->username}}" >
                                     
                                    </div>
                 
                                     <div class="col-md-12 mb-3">
                                      <label for="new_password"><b>New Password</b></label>
                                      <input type="text" class="form-control" id="new_password" placeholder="Enter New Password" value="" >
                                     
                                    </div>

                                     <div class="col-md-12 mb-3">
                                      <label for="confirm_password"><b>Confirm Password</b></label>
                                      <input type="text" class="form-control" id="confirm_password" placeholder="Enter Confirm Password" value="" >
                                     
                                      
                                     </div>
                                   </div> -->
                   </div>

                   <!--   
                           <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Submit</button> 
                           </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>     

@yield('content')




@stack('js')

</body>
</html>