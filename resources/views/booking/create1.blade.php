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
                            <form action="/booking/{{$booking->id}}/create/2" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="activities_id" value="{{$booking->id}}">
                                <!-- <input type="hidden" name="shuttles_id" value="0">
                                <input type="hidden" name="packageservices_id" value="0"> -->
                                <h2><span> 01:Traveller info </span> {{$booking->activity_name}}</h2>

                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul class="li-alert">
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {{$error}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                
                                <div class="row">
                                    <div class="f-item one-prefix">
                                        <label for="Prefix">Prefix</label>
                                        <select name="prefix">
                                            <option selected>Mr.</option>
                                            <option>Ms.</option>
                                            <option>Mrs.</option>
                                            <option>Miss.</option>
                                            <option>Dr.</option>
                                        </select>
                                    </div>
                                    <div class="f-item one-frname">
                                        <label for="First name">First name</label>
                                        <input type="text" name="first_name" placeholder="First name ..." value="{{old('first_name', Auth::user()->first_name)}}" required>
                                    </div>
                                    <div class="f-item one-laname ">
                                        <label for="Last name">Last name</label>
                                        <input type="text" name="last_name" placeholder="Last name ..." value="{{old('last_name', Auth::user()->last_name)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Email address">Email address</label><span class="info">Example: john@gmail.com</span>
                                        <input type="email" name="email" placeholder="john@gmail.com" value="{{old('email', Auth::user()->email)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Phone number">Phone number</label><span class="info">Area Code - Phone Number</span>
                                        <input type="text" name="telephone" placeholder="Phone number ..." value="{{old('telephone', Auth::user()->telephone)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Town_City">Town / City</label>
                                        <input type="text" name="town_city" placeholder="Town / City ..."  value="{{old('town_city', Auth::user()->town_city)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Country">Country</label>
                                        <input type="text" name="country" placeholder="Country ..."  value="{{old('country', Auth::user()->country)}}" required>
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="Adult">Adult (s)</label><span class="info">Over 11 Years old</span>
                                        <input type="number" name="number_adult" value="{{old('number_adult') == NULL ? '1' : old('number_adult')}}" min="1" max="20" required/>
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="Childs">Child (s)</label><span class="info">4 - 11 Years old</span>
                                        <input type="number" name="number_child" value="{{old('number_child') == NULL ? '0' : old('number_child')}}" min="0" max="20" required/>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Infant / Baby">Infant(s) / Baby(s)</label><span class="info">Age below 4 Years old</span>
                                        <input type="number" name="number_baby" value="{{old('number_baby') == NULL ? '0' : old('number_baby')}}" min="0" max="20" required/>
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="Travel Date">Travel Date</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" placeholder="" id="datepicker5" name="booking_date" value="{{old('booking_date')}}" required/>
                                        </div>
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