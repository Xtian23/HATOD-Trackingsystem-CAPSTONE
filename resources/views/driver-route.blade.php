@extends('layouts')
@push('css')
<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */

  #map {
    height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 90%;
    margin: 0;
    padding: 0;
  }

  .rowmain{
    height: 81%;
  }

  }
</style>

</style>
@endpush
@section('contentz')
<div class="rowmain ">
<div class="row">
  <div class="col-sm-2 ml-5">
    <div class="card">
      <table class="table mb-0" id="driver-table">
        <thead>
          <tr>
            <th>Delivery Personnel</th>
          </tr>
        </thead>
        <tbody>
          @foreach($drivers as $row)
            <tr  data-id="{{ $row->id }}" data->
              <td>{{ $row->fullname }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-sm-9">
    <div id="map"></div>
  </div>
</div>
<div id="map"></div>
@endsection

@push('js')
<script>
  var map,
      poly,
      lastId = 0,
      drivers = {},
      names = {!! $drivers->pluck('fullname', 'id')->toJson() !!};

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {lat: 10.3157, lng: 123.8854},
      });

    locateDrivers();
  }

  function locateDrivers() {
    $.getJSON("{{ url('routes/latest') }}")
      .done(function (res) {
        $.each(res['data'], function (i, path) {

          var position = {
            lat: path['lat'],
            lng: path['lng']
          };

          var marker = new google.maps.Marker({
            position:position,
            icon: '{{ asset("truck-marker.png") }}',
            zIndex: -1,
            label: names[path['personnel_id']]
          });

          // var infowindow = new google.maps.InfoWindow({
          //   content: names[path['personnel_id']],
          //   position: position,
          //   zIndex: 1,
          //   pane: 'mapPane'
          // });

          if(drivers.hasOwnProperty(path['personnel_id'])){
            drivers[path['personnel_id']]['marker'].setMap(null)
            // drivers[path['personnel_id']]['infowindow'].close()
          }
          drivers[path['personnel_id']] = {
            // 'infowindow': infowindow,
            'marker': marker
          }
          drivers[path['personnel_id']]['marker'].setMap(map)
          // drivers[path['personnel_id']]['infowindow'].open(map)
        })
      })
      .always(function () {
        setTimeout(function () {
          locateDrivers();
        }, 3000);
      })
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzL1AXKwyfJT2tT5c5KkxFqnfv2txpQw&callback=initMap">
</script>
@endpush

</div>
