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
                            <form action="/activity" method="post" enctype="multipart/form-data">
                                <h1>Create Activity</h1>

                                <div class="full-width">
    								<label for="activity name">activity name</label>
    								<input type="text" name="activity_name" placeholder="activity name">
                                </div>
                                <div class="one-half">
    								<label for="price adult">price adult</label>
    								<input type="number" name="price_adult" placeholder="price adult">
                                </div>
                                <div class="one-half">
    								<label for="price child">price child</label>
    								<input type="number" name="price_child" placeholder="price child">
                                </div>
                                <div class="full-width">
    								<label for="desciption">desciption</label>
    								<textarea name="desciption"></textarea>
                                </div>

								<div class="full-width">
									<label for="Multiple selection">Multiple selection</label>
									<input  type="file" name="files[]" multiple="multiple">
								</div>

									<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="full-width">
								    <input type="submit" value="Submit">
                                </div>
							</form>
                        </div>
                        </article>
                        <!--//deal-->

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection

@section('js')
    <script type="text/javascript">
    function initMap() {
        
        var position={lat: 13.7563309, lng: 100.5017651}

        var MapOptions = {
             zoom: 10
            ,center: position
        };
        var MyMap = new google.maps.Map(document.getElementById("map_canvas"), MapOptions);


        var marker = new google.maps.Marker({
            map: MyMap,
            draggable: true,
            position: new google.maps.LatLng(49.47216, -123.76307),
            visible: true
        });

        var boxText = document.createElement("div");
        boxText.innerHTML = "<strong>Best ipsum hotel</strong>1400 PennsylSUVia Ave,Washington DCwww.bestipsumhotel.com";

        var myOptions = {
             content: boxText
            ,disableAutoPan: false
            ,maxWidth: 0
            ,pixelOffset: new google.maps.Size(-140, 0)
            ,zIndex: null
            ,closeBoxURL: ""
            ,infoBoxClearance: new google.maps.Size(1, 1)
            ,isHidden: false
            ,pane: "floatPane"
            ,enableEventPropagation: false
        };

        google.maps.event.addListener(marker, "click", function (e) {
            ib.open(MyMap, this);
        });

        var ib = new InfoBox(myOptions);
        ib.open(MyMap, marker);
    }
    </script>
    <script type="text/javascript">
         $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:6,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
            
            $('#gallery1,#gallery2,#gallery3,#gallery4').lightGallery({
                download:false
            });
        });
    </script>
@endsection