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
                            <form action="/BookingActivity/{{$booking->id}}/create/2" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="activities_id" value="{{$booking->id}}">
                                <!-- <input type="hidden" name="shuttles_id" value="0">
                                <input type="hidden" name="packageservices_id" value="0"> -->
                                <h2><span> 01:Traveller info </span> {{$booking->activity_name}}</h2>

                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul class="li-alert">
                                        @foreach($errors->all() as $error)
                                            <li class="red">
                                                {{$error}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                
                                <div class="row">
                                    <div class="f-item one-prefix">
                                        <label for="prefix">Prefix</label>
                                        <select id="prefix" name="prefix">
                                            <option selected>Mr.</option>
                                            <option>Ms.</option>
                                            <option>Mrs.</option>
                                            <option>Miss.</option>
                                            <option>Dr.</option>
                                        </select>
                                    </div>
                                    <div class="f-item one-frname">
                                        <label for="first_name">First name</label>
                                        <input id="first_name" type="text" name="first_name" placeholder="First name ..." value="{{old('first_name', Auth::user()->first_name)}}" required>
                                    </div>
                                    <div class="f-item one-laname ">
                                        <label for="last_name">Last name</label>
                                        <input id="last_name" type="text" name="last_name" placeholder="Last name ..." value="{{old('last_name', Auth::user()->last_name)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="email">Email address</label><span class="info">Example: john@gmail.com</span>
                                        <input id="email" type="email" name="email" placeholder="john@gmail.com" value="{{old('email', Auth::user()->email)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="telephone">Phone number</label><span class="info">Area Code - Phone Number</span>
                                        <input id="telephone" type="text" name="telephone" placeholder="Phone number ..." value="{{old('telephone', Auth::user()->telephone)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="town_city">Town / City</label>
                                        <input id="town_city" type="text" name="town_city" placeholder="Town / City ..."  value="{{old('town_city', Auth::user()->town_city)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="country">Country</label>
                                        <input id="country" type="text" name="country" placeholder="Country ..."  value="{{old('country', Auth::user()->country)}}" required>
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="number_adult">Adult (s)</label><span class="info">Over 11 Years old</span>
                                        <input id="number_adult" type="number" name="number_adult" value="{{old('number_adult') == NULL ? '1' : old('number_adult')}}" min="1" max="20" required/>
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="number_child">Child (s)</label><span class="info">4 - 11 Years old</span>
                                        <input id="number_child" type="number" name="number_child" value="{{old('number_child') == NULL ? '0' : old('number_child')}}" min="0" max="20" required/>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="number_baby">Infant(s) / Baby(s)</label><span class="info">Age below 4 Years old</span>
                                        <input id="number_baby" type="number" name="number_baby" value="{{old('number_baby') == NULL ? '0' : old('number_baby')}}" min="0" max="20" required/>
                                    </div> 
                                    <div class="f-item one-half">
                                        <label for="booking_date">Travel Date</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" placeholder="mm/dd/yy" id="datepicker5" name="booking_date" value="{{old('booking_date')}}" required/>
                                        </div>
                                    </div>
                                </div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="full-width">
								    <input type="submit" value="Continue">
                                </div>
							</form>
                        </div>
                        </article>
                        <!--//deal-->

                        @include('booking.footercreatebook')

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection