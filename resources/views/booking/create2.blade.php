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
                            <form action="/booking/{{$booking->id}}/create/3" method="post" enctype="multipart/form-data">
                                @foreach($book as $index => $item)
                                    <input type="hidden" name="{{$index}}" value="{{$item}}" />
                                @endforeach
                                <h2><span> 02:Number of Party </span> {{$booking->activity_name}}</h2>
                                <div class="row">
                                    <div class="f-item one-half">
                                        <label for="Adult">Adult (s)</label><span class="info">Over 11 Years old</span>
                                        <input type="number" name="number_adult" value="1" min="1" max="20" />
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="Childs">Child (s)</label><span class="info">4 - 11 Years old</span>
                                        <input type="number" name="number_child" value="0" min="0" max="20" />
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Infant / Baby">Infant(s) / Baby(s)</label><span class="info">Age below 4 Years old</span>
                                        <input type="number" name="number_baby" value="0" min="0" max="20" />
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="Travel Date">Travel Date</label>
                                        <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker5" name="booking_date" /></div>
                                    </div>
                                </div>
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
                                        <h3 class="phometitle">{{$booking->activity_name}}
                                            <span class="stars">
                                                <i class="material-icons"></i>
                                                <i class="material-icons"></i>
                                                <i class="material-icons"></i>
                                                <i class="material-icons"></i>
                                            </span>                                    
                                        </h3>
                                    </div>
                                    <hr>
                                    @foreach( $booking->images as  $index => $img)
                                    @if($index === 1)
                                        <figure><a href="#" title=""><img src="/img/{{$img->image_name}}" alt="{{$booking->activity_name}}" /></a></figure>
                                        <input type="hidden" value="{{$index=0}}">
                                    @endif
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