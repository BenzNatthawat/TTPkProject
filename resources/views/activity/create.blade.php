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
                    	<article class="full-width">
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

                                <div class="one-third">
                                    <label for="start_time">start time</label>
                                    <input id="timepicker1" type="text" name="start_time" placeholder="start_time">
                                </div>
                                <div class="one-third">
                                    <label for="finish_time">finish time</label>
                                    <input id="timepicker3" type="text" name="finish_time" placeholder="finish_time">
                                </div>
                                <div class="one-third">
                                    <label for="take_time">take time</label>
                                    <input id="timepicker2" type="text" name="take_time" placeholder="take_time">
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

<script src="../js/timepicki.js"></script>
<script type="text/javascript"> 
    $('#timepicker1').timepicki();
    $('#timepicker2').timepicki();
    $('#timepicker3').timepicki();
    $('#timepicker4').timepicki();
        (function( $ ) {
            $(document).ready(function(){
                $('.form').hide();
                $('#form1').show();
                $('.f-item:nth-child(1)').addClass('active');
                $('.f-item:nth-child(1) span').addClass('checked');     

                $('#hero-gallery').lightSlider({
                    gallery:true,
                    item:1,
                    pager:false,
                    gallery:false,
                    slideMargin: 0,
                    speed:2000,
                    pause:6000,
                    mode: 'fade',
                    auto:true,
                    loop:true,
                    onSliderLoad: function() {
                        $('#hero-gallery').removeClass('cS-hidden');
                    }  
                });         
            });
        })(jQuery);
    </script>
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