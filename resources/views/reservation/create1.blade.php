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
                                @foreach($book as $index => $item)
                                    <input type="hidden" name="{{$index}}" value="{{$item}}" />
                                @endforeach
                                <h2><span> 01:Traveller info </span></h2>
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
                                        <input type="text" name="first_name" value="{{$user->first_name}}" placeholder="First name ...">
                                    </div>
                                    <div class="f-item one-laname ">
                                        <label for="Last name">Last name</label>
                                        <input type="text" name="last_name" value="{{$user->last_name}}" placeholder="Last name ...">
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Email address">Email address</label><span class="info">Example: john@gmail.com</span>
                                        <input type="email" name="email" value="{{$user->email}}" placeholder="john@gmail.com">
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Phone number">Phone number</label><span class="info">Area Code - Phone Number</span>
                                        <input type="text" name="telephone" value="{{$user->telephone}}" placeholder="Phone number ...">
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Town_City">Town / City</label>
                                        <input type="text" name="town_city" placeholder="Town / City ..." value="{{$user->town_city}}">
                                    </div>
                                    <div class="f-item one-half">
                                        <label for="Country">Country</label>
                                        <input type="text" name="country" placeholder="Country ..." value="{{$user->country}}">
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