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
                            <form action="/reservation/create/2" method="post" enctype="multipart/form-data">
                                
                                <h2><span> 01:Traveller info </span></h2>

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

                                @if($book != NULL)
                                    @foreach($book as $index => $item)
                                        <input type="hidden" name="{{$index}}" value="{{$item}}"/>
                                    @endforeach
                                @else
                                    <input type="hidden" name="radio" value="{{old('radio')}}"/>
                                    <input type="hidden" name="pick_up" value="{{old('pick_up')}}"/>
                                    <input type="hidden" name="drop_off" value="{{old('drop_off')}}"/>
                                    <input type="hidden" name="depart_date" value="{{old('depart_date')}}"/>
                                    <input type="hidden" name="depart_time" value="{{old('depart_time')}}"/>
                                    <input type="hidden" name="return_date" value="{{old('return_date')}}"/>
                                    <input type="hidden" name="return_time" value="{{old('return_time')}}"/>
                                    <input type="hidden" name="vehicle_type" value="{{old('vehicle_type')}}"/>
                                    <input type="hidden" name="round" value="{{old('round')}}"/>
                                @endif

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
                                        <input type="text" name="first_name" value="{{old('first_name', $user->first_name)}}" placeholder="First name ..." required>
                                    </div>
                                    <div class="f-item one-laname ">
                                        <label for="Last name">Last name</label>
                                        <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}" placeholder="Last name ..." required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Email address">Email address</label><span class="info">Example: john@gmail.com</span>
                                        <input type="email" name="email" value="{{old('email', $user->email)}}" placeholder="john@gmail.com" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Phone number">Phone number</label><span class="info">Area Code - Phone Number</span>
                                        <input type="text" name="telephone" value="{{old('telephone', $user->telephone)}}" placeholder="Phone number ..." required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Town_City">Town / City</label>
                                        <input type="text" name="town_city" placeholder="Town / City ..." value="{{old('town_city', $user->town_city)}}" required>
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Country">Country</label>
                                        <input type="text" name="country" placeholder="Country ..." value="{{old('country', $user->country)}}" required>
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

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection