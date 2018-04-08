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
                    	<article class="one-half">
                            <div class="static-content create"> 
                            <form action="/account/{{$user->id}}" method="post" enctype="multipart/form-data">
                                <h2><span> My Account </span></h2>
                                <div class="row">
                                    <div class="f-item full-width">
                                        <label for="First name">First name:</label>
                                        <input type="text" name="first_name" value="{{$user->first_name}}" placeholder="First name ...">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="Last name">Last name:</label>
                                        <input type="text" name="last_name" value="{{$user->last_name}}" placeholder="Last name ...">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="Email address">Email address:</label>
                                        <input type="email" name="email" value="{{$user->email}}" placeholder="Email address ...">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="Phone number">Phone number:</label>
                                        <input type="text" name="telephone" value="{{$user->telephone}}" placeholder="Phone number ...">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="Town_City">Town / City:</label>
                                        <input type="text" name="town_city" placeholder="Town / City ..." value="{{$user->town_city}}">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="Country">Country:</label>
                                        <input type="text" name="country" placeholder="Country ..." value="{{$user->country}}">
                                    </div> 
                                </div>
									<input type="hidden" name="_method" value="PUT">
                                    {{csrf_field()}}
                                <div style="margin-top: 10px;" class="full-width">
								    <input type="submit" value="Update Account">
                                </div>
							</form>
                        </div>
                        </article>
                        <!--//deal-->

                        <!--deal-->
                    	<article class="one-half">
                            <div class="static-content create"> 
                            <form action="#" method="post" enctype="multipart/form-data">
                                <h2><span> Change Password </span></h2>
                                <div class="row">
                                    <div class="f-item full-width">
                                        <label for="password">Current Password:</label>
                                        <input type="Password" name="password" placeholder="Current Password ...">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="password">New Password:</label>
                                        <input type="Password" name="password" placeholder="New Password ...">
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="password">Confirm Password:</label>
                                        <input type="Password" name="password" placeholder="Confirm Password ...">
                                    </div>
                                </div>
									<input type="hidden" name="_method" value="PUT">
                                    {{csrf_field()}}
                                <div style="margin-top: 10px;" class="full-width">
								    <input type="submit" value="Change Password">
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