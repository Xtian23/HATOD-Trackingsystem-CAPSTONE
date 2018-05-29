@extends('clerklayouts')
@section('title','ClerkHome')
@section('content')

<div class="col-md-4 offset-md-4">
        <!-- successs message -->
        @if(session()->has('message'))
                <div class="alert alert-success text-center">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{session()->get('message')}}</br> <u> {{Auth::user()->fname}} {{Auth::user()->lname}}</u>
              </div>
            @endif

        <!-- end -->
</div>


<div class="col-md-8 offset-md-2">
	<div>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner" align="center">
    <div class="carousel carousel-image carousel-item active">
      <a href="http://localhost:8000/clerkorders">
      <img class="d-block w-70 h-50" src="/order.png" alt="First slide">
      </a>
    </div>
    <div class="carousel-item">
      <a href="http://localhost:8000/clerkreport">
      <img class="d-block w-70 h-50" src="/reports.png" alt="Second slide">
      </a>
    </div>

      <div class="carousel-item mt-2">
        <a href="http://localhost:8000/clerkcustomers">
      <img class="d-block w-60 h-50" src="/customer.png" alt="third slide">
      </a>
    </div><!-- 
     <div class="carousel-item mb-5">
      <a href="http://localhost:8000/customers">
      <img class="d-block w-70 h-50" src="customer.png" alt="Fourth slide">
      </a>
    </div>
     <div class="carousel-item mb-5">
      <a href="http://localhost:8000/vehicles">
      <img class="d-block w-70 h-50" src="vehicles.png" alt="Fifth slide">
      </a>
    </div>
      <div class="carousel-item mb-5">
        <a href="http://localhost:8000/personnels">
      <img class="d-block w-70 h-50" src="personnels.png" alt="Sixth slide">
      </a>
    </div>
     </div>
      <div class="carousel-item ">
        <a href="http://localhost:8000/reports">
      <img class="d-block w-70 h-50" src="reoports.png" alt="Seventh slide">
      </a>
    </div>


 -->

   
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>
</div>


 
@endsection