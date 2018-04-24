@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

	<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                
                    <!--latest offers-->
                    <div class="row">
                        <!--deal-->
                    	<article class="two-third">
                            <div class="static-content create"> 
                            <form action="/activity/{{$activities->id}}" method="post" enctype="multipart/form-data">
                                <h2>Edit Activity:<span>{{$activities->activity_name}}</span></h2>

                                <div class="full-width">
    								<label for="activity name">activity name</label>
    								<input type="text" name="activity_name" placeholder="activity name" value="{{$activities->activity_name}}">
                                </div>
                                <div class="one-half">
    								<label for="price adult">price adult</label>
    								<input type="number" name="price_adult" placeholder="price adult" value="{{$activities->price_adult}}">
                                </div>
                                <div class="one-half">
    								<label for="price child">price child</label>
    								<input type="number" name="price_child" placeholder="price child" value="{{$activities->price_child}}">
                                </div>
                                <div class="full-width">
    								<label for="desciption">desciption</label>
    								<textarea name="desciption">{{$activities->desciption}}</textarea>
                                </div>

                                <div class="one-third">
                                    <label for="start_time">start time</label>
                                    <input id="timepicker1" type="text" name="start_time" placeholder="start_time" value="{{$activities->start_time}}">
                                </div>
                                <div class="one-third">
                                    <label for="finish_time">finish time</label>
                                    <input id="timepicker2" type="text" name="finish_time" placeholder="finish_time" value="{{$activities->finish_time}}">
                                </div>
                                <div class="one-third">
                                    <label for="take_time">take time</label>
                                    <input id="timepicker3" type="text" name="take_time" placeholder="take_time" value="{{$activities->take_time}}">
                                </div>


                                <div class="full-width" id="floating-panel">
                                    <input name="location_name" id="address" type="text" value="{{$activities->map_location->location_name or 'Phuket'}}">
                                    <input class="gradient-button" style="margin-top: 5px;" type="button" id="myBtn" value="search"> 
                                </div>

                                <div id="map"></div>

                                <div class="one-half">
                                    <label for="latitude">latitude</label>
                                    <input type="text" id="lati" name="latitude" value="{{$activities->map_location->latitude or 7.95193}}">
                                </div>

                                <div class="one-half">
                                    <label for="longitude">longitude</label>
                                    <input type="text" id="lngi" name="longitude" value="{{$activities->map_location->longitude or 98.33808}}">
                                </div>

								<div class="full-width">
									<label for="Multiple selection">Multiple selection</label>
									<input  type="file" name="files[]" multiple="multiple">
								</div>
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="full-width">
								    <input type="submit" value="Submit">
                                </div>
							</form>
                        </div>
                        </article>
                        <!--//deal-->

						<article class="one-third">
                            <!--latest offers-->
                            <div class="static-content index">
                                <div class="row">
                                    <!--deal-->
                                    <div class="details">
                                        <h3 class="phometitle">{{$activities->activity_name}} :image                             
                                        </h3>
                                    </div>
                                    <hr>
                                    @foreach($activities->images as $image)
                                    	<img src="/img/{{$image->image_name}}">
                                    @endforeach
                                    <!--//deal-->
                                </div>
                            </div>
                            <!--//latest offers-->
                        </article>

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection
@section('js')
    <script src="../js/timepicki.js"></script>
    <script type="text/javascript"> 
        $('#timepicker1').timepicki();
        $('#timepicker2').timepicki();
        $('#timepicker3').timepicki();
        $('#timepicker4').timepicki();
    </script>

    <script>
      var map;
      var position = {lat: 7.95193, lng: 98.33808}
      var step = 0;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 12
        });

        var geocoder = new google.maps.Geocoder();

        document.getElementById('myBtn').addEventListener('click', function() {
            geocodeAddress(geocoder, map);
        });

      }

      function geocodeAddress(geocoder, resultsMap){
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
              var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();
              document.getElementById("lati").value = lat;
              document.getElementById("lngi").value = lng;
            if(step == 0){
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    draggable:true,
                });
                step = 1;
            }
            else{
                marker.google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    draggable:true,
                })
            }
            marker.addListener('drag', function(){
              document.getElementById("lati").value = marker.getPosition().lat();
              document.getElementById("lngi").value = marker.getPosition().lng();
            });
          } else {
            alert('Noooo!!!!!' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhbRYJJIdx5t-FbQBg_Ra9wXcQ7Z9RMgg&callback=initMap"
    async defer></script>

@endsection