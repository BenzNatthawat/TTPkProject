@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

        <!--main-->
        <main class="main">
            <div class="wrap">
                <div class="row">
                    <div class="full-width">
                        <div class="static-content create">
                            <h2>CONTACT :<span> Travel Transport Phuket</span></h2>

                            <article class="full-width">
                                <p>
                                    <em>P:</em> 47/2 Phuket, Thailand
                                </p>
                                <p>
                                    <em>E:</em>
                                    <a href="#" title="Travel_Transport_Phuket@mail.com">Travel_Transport_Phuket@mail.com</a>
                                </p>

                                <div class="column full-width">
                                    <div id="map"></div>
                                </div>

                            </article> 
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
