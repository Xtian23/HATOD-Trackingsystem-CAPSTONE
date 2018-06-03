
<!DOCTYPE >
<html>
<!-- linking BOOTSTRAP -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.min.js')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('select2/dist/css/select2.min.css') }}">
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('select2/dist/js/select2.full.min.js')}}"></script>

	<!-- end-->
	

<title>@yield('title')</title>

</head>

<body>

<!-- code for navigation -->
<nav class="navbar navbar-xtian navbar-dark bg-dark navbar-expand-lg  ">
  <a class="navbar-brand" href="/index"><img src="/logo1.png" width="200px" height="40px"></a>
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
                        <a class="dropdown-item" href="{{route('products.index')}}"><img src="/products.png" width="20px"> Products</a>
                        <a class="dropdown-item" href="{{route('customers.index')}}"><img src="/customers.png" width="25px"> Customers</a>
                        <a class="dropdown-item" href="{{route('personnels.index')}}"><img src="/personnel.png" width="25px"> Personnels</a>
                        <a class="dropdown-item" href="{{route('vehicles.index')}}"><img src="/vehicle.png" width="25px"> Vehicles</a>
                      </div>

                </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{route('orders.index')}}">Order<span class="sr-only">(current)</span></a>
            </li>

              <li class="nav-item active">
                <a class="nav-link" href="https://liteonebiz.tech/kaindoy/hatudlocation.html">Track</a>
              </li>
             


                 <li class="nav-item active">
                    <a class="nav-link" href="/report">Report</a>
                  </li>
         
              <!-- end -->
                  <li class="nav-item active dropdown">
         
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Hello, {{Auth::user()->fname}}!
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
        

              <form action="{{'/users/'.Auth::user()->id,'/update'}}" method="POST">
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
                      <input type="text" class="form-control" id="firstname" placeholder="First Name" name="fname" value="{{Auth::user()->fname}}" readonly>
                    </div>

                    <div class="col-md-5 mb-3">
                      <label for="lastname"><b>Last name</b></label>
                      <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lname" value="{{Auth::user()->lname}}" readonly>
                    </div>

                    <div class="col-md-2 mb-3">
                      <label for="age"><b>Age</b></label>
                      <input type="text" class="form-control" id="age" placeholder="Last name" value="{{Auth::user()->age}}" readonly>
                    </div>
                
                    <div class="col-md-12 mb-3">
                      <label for="address"><b>Address</b></label>
                      <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{Auth::user()->address}}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="contact_no"><b>Contact Number</b></label>
                      <input type="text" class="form-control" id="contact_no" placeholder="Address" name="contact_no" value="{{Auth::user()->contact_no}}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="birthdate"><b>Birth Date</b></label>
                      <input type="date" class="form-control" id="birthdate" placeholder="Address" name="birthdate" value="{{Auth::user()->birthdate}}" readonly>
                    </div>

                    <div class="col-md-12 mb-3">
                      <label for="email address"><b>Email Address</b></label>
                      <input type="text" class="form-control" id="email address" placeholder="Address" name="email_add" value="{{Auth::user()->email_add}}" readonly>
                    </div>

                </div> 
                <div class="" align="center">
                    <a href="{{url('/user')}}" class="btn btn-primary">
                      Manage Account
                    </a>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>       

@yield('contentz')




@stack('js')
<script type="text/javascript">
  $(document).ready(function () {
    $('.select2').select2();
  })
</script>
</body>
</html>