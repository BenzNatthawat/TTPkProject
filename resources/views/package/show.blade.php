@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')
	<!--main-->
	<main class="main">		
		<div class="wrap">			
			<div class="row">

				<!--hotel three-fourth content-->
					<!--sidebar-->
				<aside class="one-fourth right-sidebar">
					<!--hotel details-->
					<article class="hotel-details">
						<h1>{{$packages->package_name}}</h1>
						<hr>
						<div>
							score
							<span class="stars">
								<i class="material-icons"></i>
								<i class="material-icons"></i>
								<i class="material-icons"></i>
							</span>
						</div>
					</article>
					<!--//hotel details-->
					
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li class="ticketprice active">
								<a href="#ticketprice" title="ticketprice">Ticket & Price</a>
							</li>
							<li class="description">
								<a href="#description" title="Description">Description</a>
							</li>
							<li class="location">
								<a href="#location" title="Location">Location</a>
							</li>
							<li class="reviews">
								<a href="#reviews" title="Reviews">Reviews</a>
							</li>
						</ul>
					</nav>
					<!--//inner navigation-->

					<!--testimonials-->
					<article class="testimonials">
						<blockquote>
						<ul>
							<h2>Terms and Conditions</h2>
							<li><span class="material-icons" style="font-size:15px;">navigate_next</span>
								Once you have booked, you can cancel. But at least 2 days before the tour.
							</li>
							<li><span class="material-icons" style="font-size:15px;">navigate_next</span>
								You can book at least 2 days in advance. 
							</li>
						</ul>
						</blockquote>
					</article>
					<!--//testimonials-->
					
					<!--Need Help Booking?-->
					<article class="widget">
						<h4>Need Help Booking?</h4>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">08X - XXX - XXXX</p>
					</article>
					<!--//Need Help Booking?-->
				</aside>
				<!--//sidebar-->


				<!--hotel three-fourth content-->
				<section class="three-fourth">
					
					<!--ticketprice-->
					<section id="ticketprice" class="tab-content">
						<article>							
							<h2>Ticket & Price</h2>
							<div class="activity-types">
								<table id="customers">
									<tr>
									    <th>Generation</th>
									    <th>Price</th>
									</tr>
                                    <tr>
                                        <td>Adult (s)Over 11 Years old</td>
                                        <td>{{$packages->price_package}} THB </td>
                                    </tr>
                                </table>
							</div>
							<a style="float:right" href="/booking/{{$packages->id}}/create/1" title="Book" class="gradient-button">Book now</a>
						</article>
					</section>
					<!--//ticketprice-->
					
					<!--description-->
					<section id="description" class="tab-content" style="display: none;">
						<article>
							<h2>Description</h2>
							<div class="text-wrap">	
								<p>{{$packages->desciption}}</p>
							</div>
							
							<h2>Opening Time</h2>
							<div class="text-wrap">	
								<p>From 9.00 A.M. </p>
							</div>
							
							<h2>Closing Time</h2>
							<div class="text-wrap">	
								<p>Untill 17.00 P.M. </p>
							</div>
						</article>
					</section>
					<!--//description-->

					
					<!--location-->
					<section id="location" class="tab-content" style="display: none;">
						<article>
							<!--map-->
							@if($packages->map_location == NULL) <!-- Phuket -->
							<input type="hidden" name="latitude" id="latitude" value="7.9519331" />
							<input type="hidden" name="longitude" id="longitude" value="98.33808840000006"/>
							@else
							<input type="hidden" name="latitude" id="latitude" value="{{$activities->map_location->latitude}}" />
							<input type="hidden" name="longitude" id="longitude" value="{{$activities->map_location->longitude}}"/>
							@endif
								<div class="gmap" id="map_canvas"></div>
							<!--//map-->
						</article>
					</section>
					<!--//location-->
					
					<!--reviews-->
					<section id="reviews" class="tab-content" style="display: none;">
						<article>
							<h2>Score Breakdown</h2>
							<div class="score">
								<span class="achieved">8 </span>
								<span> / 10</span>
								<p class="info">Based on 782 reviews</p>
								<p class="disclaimer">reviews are written by our customers.
							</div>
							
							<dl class="chart">
								<dt>Excellent</dt>
								<dd><span id="data-one" style="width:80%;">8</span></dd>
								<dt>Very good</dt>
								<dd><span id="data-two" style="width:60%;">6</span></dd>
								<dt>Average</dt>
								<dd><span id="data-three" style="width:80%;">8</span></dd>
								<dt>Poor </dt>
								<dd><span id="data-four" style="width:100%;">10</span></dd>
								<dt>Terrible </dt>
								<dd><span id="data-five" style="width:70%;">7</span></dd>
							</dl>
						</article>
						
						<article>
							<h2>Reviews</h2>
							<ul class="reviews">
								<!--review-->
								<li>
									<figure class="left">
										<img src="#" alt="avatar">
										<address><span>Anonymous</span><br><br>22/06/2016</address>
									</figure>
									<div>สวยงามและสนุกมาก</div>
								</li>
								<!--//review-->
								
								<!--review-->
								<li>
									<figure class="left">
										<img src="#" alt="avatar">
										<address><span>Anonymous</span><br><br>22/06/2016</address>
									</figure>
									<div>สวยงามมาก สดชื้น</div>
								</li>
								<!--//review-->
							</ul>
						</article>
					</section>
					<!--//reviews-->
				</section>
				<!--//hotel content-->

			</div>
			<!--//row-->
		</div>
	</main>
	<!--//main-->

@endsection
@section('js')
	<script type="text/javascript">
	function initMap() {
		var Platitude = parseFloat(document.getElementById('latitude').value);
		var Plongitude = parseFloat(document.getElementById('longitude').value);
		var position={lat: Platitude, lng: Plongitude}

		var MapOptions = {
			 zoom: 13,
			 center: position
		};
		var MyMap = new google.maps.Map(document.getElementById("map_canvas"), MapOptions);


		var marker = new google.maps.Marker({
			map: MyMap,
			draggable: true,
			position: new google.maps.LatLng(Platitude, Plongitude),
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
		});
    </script>
@endsection
