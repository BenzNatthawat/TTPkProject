@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')
	<!--main-->
	<main class="main">		
		<div class="wrap">			
			<div class="row">

				<!--hotel three-fourth content-->
				<section class="their-fourth">
					<!--gallery-->
					<div class="gallery" style="margin: 0px 10px 0px 10px">
						<div class="lSSlideWrapper usingCss" style="transition-duration: 500ms; transition-timing-function: ease; width: 100%;">
							<!-- benz -->
							<ul id="image-gallery" class="lightSlider lsGrab lSSlide" style="transform: translate3d(-872.5px, 0px, 0px); padding-bottom: 0%;">
								@foreach( $activities->images as $index => $img)
								@if($index == 1)
								<li data-thumb="images/uploads/hotel4.jpg" class="lslide active"> 
									<img src="../img/{{$img->image_name}}" style="width: 100%; height: 30em">
								</li>
								@else
								<li data-thumb="images/uploads/hotel1.jpg" class="lslide"> 
									<img src="../img/{{$img->image_name}}" style="width: 100%; height: 30em">
								</li>
								@endif
								@endforeach	
							</ul>
						</div>
					</div>
					<!--//gallery-->
				</section>
					<!--sidebar-->
				<aside class="one-fourth right-sidebar">
					<!--hotel details-->
					<article class="hotel-details">
						<h1>{{$activities->activity_name}}</h1>
						<hr>
						<div>
							score
							<span class="stars">
								<?php
									$Excellent = $activities->reviews->where('score_review', 'Excellent')->count();
									$Verygood = $activities->reviews->where('score_review', 'Very good')->count();
									$Average = $activities->reviews->where('score_review', 'Average')->count();
									$Poor = $activities->reviews->where('score_review', 'Poor')->count();
									$Terrible = $activities->reviews->where('score_review', 'Terrible')->count();
									$sum = $activities->reviews->count();
									$sum!=0?$sum:$sum=1;
									$score = round(($Excellent*1+$Verygood*0.8+$Average*0.6+$Poor*0.4+$Terrible*0.2)/$sum*4,0);
								?>

								@for($i=0; $i<=$score; $i++)
								<i class="material-icons"></i>
								@endfor
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
										<td>{{$activities->price_adult}} THB </td>
									</tr>
									<tr>
										<td>Child (s)4 - 11 Years old</td>
										<td>{{$activities->price_child}} THB </td>
									</tr>
								</table>
							</div>
							<a style="float:right" href="/BookingActivity/{{$activities->id}}/create/1" title="Book" class="gradient-button">Book now</a>
						</article>
					</section>
					<!--//ticketprice-->
					
					<!--description-->
					<section id="description" class="tab-content" style="display: none;">
						<article>
							<h2>Description</h2>
							<div class="text-wrap">	
								<p>{{$activities->desciption}}</p>
							</div>
							
							<h2>Opening Time</h2>
							<div class="text-wrap">	
								<p>From {{$activities->start_time}} </p>
							</div>
							
							<h2>Closing Time</h2>
							<div class="text-wrap">	
								<p>Untill {{$activities->finish_time}} </p>
							</div>
						</article>
					</section>
					<!--//description-->

					
					<!--location-->
					<section id="location" class="tab-content" style="display: none;">
						<article>
							<!--map-->
							@if($activities->map_location == '') <!-- Phuket -->
							<input type="hidden" name="latitude" id="latitude" value="7.95193" />
							<input type="hidden" name="longitude" id="longitude" value="98.33808"/>
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
								<?php $score = round(($Excellent*1+$Verygood*0.8+$Average*0.6+$Poor*0.4+$Terrible*0.2)/$sum*10,1) ?>
								@if($score == 0)
									No score
								@else
									<span class="achieved">{{$score}} / 10</span>
								@endif
								@if($activities->reviews->isEmpty())
								<p class="info">Based on {{$sum-1}} reviews</p>
								@else
								<p class="info">Based on {{$sum}} reviews</p>
								@endif
								<p class="disclaimer">reviews are written by our customers.
							</div>

							<dl class="chart">
								<dt>Excellent</dt>
								<dd><span id="data-one" style="width:{{$Excellent/$sum*100}}%;">{{$Excellent}}</span></dd>
								<dt>Very good</dt>
								<dd><span id="data-two" style="width:{{$Verygood/$sum*100}}%;">{{$Verygood}}</span></dd>
								<dt>Average</dt>
								<dd><span id="data-three" style="width:{{$Average/$sum*100}}%;">{{$Average}}</span></dd>
								<dt>Poor </dt>
								<dd><span id="data-four" style="width:{{$Poor/$sum*100}}%;">{{$Poor}}</span></dd>
								<dt>Terrible </dt>
								<dd><span id="data-five" style="width:{{$Terrible/$sum*100}}%;">{{$Terrible}}</span></dd>
							</dl>
						</article>
						<article>
							<h2>Reviews</h2>
							<ul class="reviews">
								<!--review-->
								<!-- <li>
									<figure class="left">
										<img src="../images/avatar.jpg" alt="avatar">
										<address><span>Anonymous</span><br><br>22/06/2016</address>
									</figure>
									<div>สวยงามและสนุกมาก</div>
								</li>
								<li>
									<figure class="left">
										<img src="../images/avatar.jpg" alt="avatar">
										<address><span>Anonymous</span><br><br>22/06/2016</address>
									</figure>
									<div>สวยงามมาก สดชื้น</div>
								</li> -->
								<!--//review-->

								@if($activities->reviews->isEmpty())
								<li style="text-align: center;">
									<div>No Comments.</div>
								</li>
								@else
								@foreach($activities->reviews as $review)
								<!--review-->
								<li>
									<figure class="left">
										<img src="../images/avatar.jpg" alt="avatar">
										<address><span>{{$review->user->user_name}}</span><br><br>{{$review->created_at}}</address>
									</figure>
									<div>{{$review->review}}</div>
								</li>
								<!--//review-->
								@endforeach
								@endif
							</ul>
						</article>

						@auth
						<article>
							<form action="/postreview/{{$id}}" method="post" enctype="multipart/form-data">
								<div>
									<textarea name="review" placeholder="Add Reviews"></textarea>
								</div><br>
								<div style="margin-left: 20px;">
								<div class="f-item one-full" style="margin-bottom: 10px;">
									<input type="radio" name="score_review" value="Excellent" checked required />
									<label for="Excellent">Excellent</label>
								</div>
								<div class="f-item one-full" style="margin-bottom: 10px;">
									<input type="radio" name="score_review" value="Very good" required/>
									<label for="Very_good">Very good</label>
								</div>
								<div class="f-item one-full" style="margin-bottom: 10px;">
									<input type="radio" name="score_review" value="Average" required/>
									<label for="Average">Average</label>
								</div>
								<div class="f-item one-full" style="margin-bottom: 10px;">
									<input type="radio" name="score_review" value="Poor" required/>
									<label for="Poor">Poor</label>
								</div>
								<div class="f-item one-full" style="margin-bottom: 10px;">
									<input type="radio" name="score_review" value="Terrible" required/>
									<label for="Terrible">Terrible</label>
								</div>
								</div>
								{{ csrf_field() }}
								<input type="submit" value="Submit">
							</form>
						</article>
						@endauth

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
<script>
function myFunction() {
	var score_review = document.forms[0];
	var txt = "";
	var i;
	for (i = 0; i < score_review.length; i++) {
		if (score_review[i].checked) {
			txt = txt + score_review[i].value + " ";
		}
	}
	document.getElementById("order").value = "You ordered a score with: " + txt;
}
</script>
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
				gallery:false,
				item:1,
				thumbItem:6,
				slideMargin: 0,
				speed:500,
				auto:true,
				loop:true,
				pager:false,
				onSliderLoad: function() {
					$('#image-gallery').removeClass('cS-hidden');
				}  
			});
		});
	</script>
@endsection
