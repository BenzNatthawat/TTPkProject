@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')
<style type="text/css">
    #map {   
        width:80%;  
        height:400px;  
        margin:auto; 
    }  
</style>
<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                
                <div class="full-width">
                    <div class="static-content index">
                        <div class="row">
                            <h1>Position</h1>
                            <div id="map"></div>
                            <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">    
                            <div class="one-half">
                                <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">
                                Latitude    
                                <input name="lat_value" type="text" id="lat_value" value="0" />  <br />  
                                Longitude    
                                <input name="lon_value" type="text" id="lon_value" value="0" />  <br />  
                                Zoom    
                                <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />    
                                <br />  
                                <input type="submit" name="button" id="button" value="บันทึก" />    
                                </form>    
                            </div>
                            
                            <div class="one-half">
                                <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">    
                                Latitude    
                                <input name="lat_value" type="text" id="drilat_value" value="0" />  <br />  
                                Longitude    
                                <input name="lon_value" type="text" id="drilon_value" value="0" />  <br />

                                <input type="submit" name="button" id="button" value="บันทึก" />    
                                </form> 
                            </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection

@section('js')
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<!-- <script src="js/map-position.js"></script> ตำแหน่งของคนเดียว -->
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
var my_Marker;  // กำหนดตัวแปรเก็บ marker ตำแหน่งปัจจุบัน หรือที่ระบุ 
var drlat = {!! $user->maps->latitude or 0 !!};
var drlng = {!! $user->maps->longitude or 0 !!}
var positionx={lat: drlat, lng: drlng}
google.maps.event.addDomListener(window, 'load', initialize);

function getDataFromDb()
{
    var data = {
      "action": "4"
    };
    $.ajax({ 
        url: "getData" ,
        type: "get",
        data: {users_id: 4}
    })
    .success(function(result) { 
        var obj = jQuery.parseJSON(result);
            if(obj != '')
            {
                  //$("#myTable tbody tr:not(:first-child)").remove();
                  $("#myBody").empty();
                  $.each(obj, function(key, val) {
                            var tr = "<tr>";
                            tr = tr + "<td>" + val["location_name"] + "</td>";
                            tr = tr + "<td>" + val["latitude"] + "</td>";
                            tr = tr + "<td>" + val["longitude"] + "</td>";
                            tr = tr + "</tr>";
                            $('#myTable > tbody:last').append(tr);
                        var xx = document.getElementById("drilat_value");
                        var xy = document.getElementById("drilon_value");
                        xx.value = val["latitude"];
                        xy.value = val["longitude"];
                  });
                
            }

    });

}
setInterval(getDataFromDb, 5000);   // 1000 = 1 second
function initialize() {
  GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
  if(navigator.geolocation){    
             
            // หาตำแหน่งปัจจุบันโดยใช้ getCurrentPosition เรียกตำแหน่งครั้งแรกครั้งเดียวเมื่อเปิดมาหน้าแผนที่
            navigator.geolocation.getCurrentPosition(function(position){    
                var myPosition_lat=position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน  
                var myPosition_lon=position.coords.longitude;  // เก็บค่าตำแหน่ง  longitude ปัจจุบัน           
                 
                // สรัาง LatLng ตำแหน่ง สำหรับ google map  
                var pos = new GGM.LatLng(myPosition_lat,myPosition_lon);           

                 
                // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
                var my_DivObj= document.getElementById('map');
                 
                // กำหนด Option ของแผนที่  
                var myOptions = {  
                    zoom: 15, // กำหนดขนาดการ zoom  
                    center: pos , // กำหนดจุดกึ่งกลาง  เป็นจุดที่เราอยู่ปัจจุบัน
                    mapTypeId:GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่  
                    mapTypeControlOptions:{ // การจัดรูปแบบส่วนควบคุมประเภทแผนที่  
                        position:GGM.ControlPosition.RIGHT, // จัดตำแหน่ง  
                        style:GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style   
                    }  
                };  
          
                map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map                      
               
               my_Marker = new GGM.Marker({ // สร้างตัว marker  
                    position: pos,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
                    map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                    icon:"/images/map-people.png", 
                    title:"ตำแหน่งของคุณ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
                }); 

               if(drlat != 0 && drlng != 0)
                my_Marker1 = new GGM.Marker({ // สร้างตัว marker  
                    position: positionx,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
                    map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                    icon:"/images/map-texi.png", 
                    title:"ตำแหน่งของรถ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
                });   
                 
                // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom  
                GGM.event.addListener(map, "zoom_changed", function() {  
                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value    
                });                  
                 
            });    
         
            // ให้อัพเดทตำแหน่งในแผนที่อัตโนมัติ โดยใช้งาน watchPosition
            // ค่าตำแหน่งจะได้มาเมื่อมีการส่งค่าตำแหน่งที่ถูกต้องกลับมา
            navigator.geolocation.watchPosition(function(position){    
  
                var myPosition_lat=position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน  
                var myPosition_lon=position.coords.longitude;  // เก็บค่าตำแหน่ง  longitude ปัจจุบัน  
                                
                // สรัาง LatLng ตำแหน่งปัจจุบัน watchPosition
                var pos = new GGM.LatLng(myPosition_lat,myPosition_lon);     
                 
                // ให้ marker เลื่อนไปอยู่ตำแหน่งปัจจุบัน ตามการอัพเดทของตำแหน่งจาก watchPosition
                my_Marker.setPosition(pos);
                                     
                var my_Point = my_Marker.getPosition();  // ดึงตำแหน่งตัว marker  มาเก็บในตัวแปร
                var xx = document.getElementById("lat_value");
                var xy = document.getElementById("lon_value");
                var xz = document.getElementById("zoom_value");
                xx.value = my_Point.lat();
                xy.value = my_Point.lng();
                xz.value = map.getZoom();         
                 
                map.panTo(pos); // เลื่อนแผนที่ไปตำแหน่งปัจจุบัน  
                map.setCenter(pos);  // กำหนดจุดกลางของแผนที่เป็น ตำแหน่งปัจจุบัน                   
       
 
            });    
    }else{   
    noGeolocation('Error: Your browser doesn\'t support geolocation.'); 
         // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง    
    }
}

</script>
@endsection
