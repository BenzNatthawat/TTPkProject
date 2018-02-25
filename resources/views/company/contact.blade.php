@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')
 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        width: 60%;
      }
      /* Optional: Makes the sample page fill the window. */
      #floating-panel1 {
        position: absolute;
        left: 18%;
        z-index: 5;
        margin-top: -20px;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        width: 30%;
      }
      #floating-panel2 {
        position: absolute;
        right: 18%;
        z-index: 5;
        margin-top: -20px;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        width: 30%;
      }
    </style>
        <!--main-->
        <main class="main">
            <div class="wrap">
                <div class="row">
                    <div class="full-width">
                        <div class="static-content create">
                            <h1>shuttle</h1>
                                <div class="column full-width">
                                    <div style="margin-left: 20%" id="map"></div>
                                </div>        
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--//main-->

@endsection

@section('js')

    <script>
      var map;
      var position={lat: 8.1597913, lng: 98.33580689}
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 16
        });

        var geocoder = new google.maps.Geocoder();

        var marker = new google.maps.Marker({
            map: map,
            position:position,
            visible: true,
            icon:"/images/map-position.png",
        });



      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhbRYJJIdx5t-FbQBg_Ra9wXcQ7Z9RMgg&callback=initMap"
    async defer></script>
@endsection
