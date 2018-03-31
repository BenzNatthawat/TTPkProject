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
        margin-top: -80px;
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
        margin-top: -80px;
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
                
                    <!--latest offers-->
                    <div class="static-content index">
                        <div class="row">
                        <h1>shuttle</h1>
                           
                    <form id="main-search" method="post" action="/reservation/create/1">
                    <div class="row">
                        
                        <input type="hidden" name="radio" value="form1" />
                        
                        <div class="full-width">
                        <!--form rent a driver-->
                        <div class="form row" id="form1">
                            <!--column-->
                            <div class="full-width">
                                <h5 style="color: blue">Where?</h5>
                                <div class="row">
                                    <div class="f-item one-half">
                                        <label for="destination7">Pick Up</label>
                                        <input type="text" placeholder="Where the place that pick up you." id="pick" name="pick_up" required />
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="destination8">Drop Off</label>
                                        <input type="text" placeholder="Where the place that drop off you." id="Drop" name="drop_off" required />
                                    </div>
                                </div>
                            </div>
                            <!--//column-->

                            <div class="column full-width">
                                <div id="embed_button">
                                    <input type="submit" name="Submit" value="open map" onclick="JavaScript:fncShow('embed_div');">
                                </div>
                                <div id="embed_div" style="display:none; margin-top:60px">
                                    <div class="full-width">
                                        <div id="floating-panel1">
                                            <input id="address1" type="text" placeholder="search Where the place that pick up">
                                            <input class="gradient-button" style="margin-top: 5px;" type="button" id="myBtn1" value="search"> 
                                        </div>
                                        <div id="floating-panel2">
                                            <input id="address2" type="text" placeholder="search Where the place that pick up">
                                            <input class="gradient-button" style="margin-top: 5px;" type="button" id="myBtn2" value="search"> 
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-left: 20%" id="map"></div>
                            </div>        

                            <!--column-->
                            <div class="column one-half">
                                <h5 style="color: blue">When?</h5>
                                <div class="row">
                                    <div class="f-item full-width datepicker">
                                        <label for="datepicker1">Pick up time</label>
                                        <div class="row">
                                            <div class="f-item one-half">
                                                <div class="datepicker-wrap">
                                                    <input type="text" placeholder="" id="datepicker1" name="depart_date" required/>
                                                </div>
                                            </div>
                                            <div class="f-item one-half">
                                                <div class="indexpicker">
                                                    <input id="timepicker1" type="text" name="depart_time" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="f-item full-width datepicker">
                                        <label for="datepicker2">Drop of time</label>
                                        <div class="row">
                                            <div class="f-item one-half">
                                                <div class="datepicker-wrap">
                                                    <input type="text" placeholder="" id="datepicker2" name="return_date" required/>
                                                </div>
                                            </div>
                                            <div class="f-item one-half">
                                                <div class="indexpicker">
                                                    <input id="timepicker2" type="text" name="return_time" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--//column-->
                        
                            <!--column-->
                            <div class="column one-half">
                                <h5 style="color: blue">Who?</h5>
                                <div class="row">
                                    <div class="f-item full-width">
                                        <label for="spinner2">Vehicle Type:</label>
                                        <select name="vehicle_type">
                                            <option>No Preference</option>
                                            <option>Van</option>
                                            <option>Taxi</option>
                                        </select>
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="spinner2">One-Way Or Round-Rrip:</label>
                                        <select name="round">
                                            <option>One-Way</option>
                                            <option selected>Round-Trip</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--//column-->
                        </div>  
                        <!--//form rent a driver-->

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="three-fourth">
                                <input type="submit" value="Proceed to results" class="gradient-button search-submit" id="search-submit" />
                            </div>

                        </div>

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection

@section('js')
<script src="js/timepicki.js"></script>
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

    <script>
      var map;
      var position = {lat: 7.95193, lng: 98.33808}
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 13
        });

        var geocoder = new google.maps.Geocoder();

        document.getElementById('myBtn1').addEventListener('click', function() {
            geocodeAddress(geocoder, map, document.getElementById('address1').value, "/images/map-people.png");
            document.getElementById('pick').value=document.getElementById('address1').value;
        });
        document.getElementById('myBtn2').addEventListener('click', function() {
            geocodeAddress(geocoder, map, document.getElementById('address2').value, "/images/map-goal.png");
            document.getElementById('Drop').value=document.getElementById('address2').value;
        });

      }
      function geocodeAddress(geocoder, resultsMap, address, iconmap){
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {

            resultsMap.setCenter(results[0].geometry.location);
              var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
              draggable:true,
              icon:iconmap,
            });
          } else {
            alert('Noooo!!!!!' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhbRYJJIdx5t-FbQBg_Ra9wXcQ7Z9RMgg&callback=initMap"
    async defer></script>
    <script language="JavaScript"> 
    function fncShow(ctrl){ // ฟังก์ชั่นสำหรับ แสดง (Show) ส่งค่า id ของ DIV หรือ Table TD TR
        document.getElementById(ctrl).style.display = ''; //สั่งให้แสดง
        document.getElementById('embed_button').innerHTML ='<input type="submit" name="Submit" value="close open map" onClick="JavaScript:fncHide(\'embed_div\');">'; // หลังจากสั่งให้แสดงเสร็จ ก็ทำการเปลี่ยนสถานะของปุ่มเป็น "ซ่อน"
    }
 
    function fncHide(ctrl){ // ฟังก์ชั่นสำหรับ ซ่อน ส่งค่า id ของ DIV หรือ Table TD TR
        document.getElementById(ctrl).style.display = 'none'; //สั่งให้แสดง
        document.getElementById('embed_button').innerHTML ='<input type="submit" name="Submit" value="open map" onClick="JavaScript:fncShow(\'embed_div\');">';  // หลังจากสั่งให้ซ่อนแล้ว ก็ทำการเปลี่ยนสถานะของปุ่มเป็น "แสดง"
    }
    </script>
@endsection
