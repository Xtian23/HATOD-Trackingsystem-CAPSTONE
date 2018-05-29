@extends('layouts')
@section('title','TRACK')
@section('contentz')

    <div class="col-md-12 ">
    <!--     <div id="demo" class="text-center"></div> -->

        <table class="table bg-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
    
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
    
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



    </div>



























        <script type="text/javascript">
        	var x = document.getElementById("demo");
        	function getLocation() {
        	    if (navigator.geolocation) {
        	        navigator.geolocation.getCurrentPosition(showPosition, function () {
        	        	alert("failed")
        	        });
        	        // getLocation();
        	    } else {
        	        x.innerHTML = "Geolocation is not supported by this browser.";
        	    }
        	}
        	function showPosition(position) {
        		// console.log('%f,  %f', position.coords.latitude, position.coords.longitude)
        	    x.innerHTML += ("<br>Latitude: " + position.coords.latitude + 
        	    "<br>Longitude: " + position.coords.longitude);
        	}

        	

        	setInterval(function() {
        		getLocation();
        	}, 2000)
        </script>

@endsection
