@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

	<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                
                    <!--latest offers-->
                    <div class="static-content index">
                        <div class="row">
                            <h1>Package</h1>
                            @foreach( $packages as $item )
                            <!--deal-->
                            <article class="one-third" id="be">

                                <figure><a href="activity/{{$item->id}}" title="">
                                <img style="width: 900px; height: 250px;" src="/images/tour.jpg" alt="tour" /></a></figure>

                                <div class="details" style="height: 245px;">
                                    <h3 class="phometitle">{{$item->package_name}}
                                        <span class="stars">
                                            <i class="material-icons"></i>
                                            <i class="material-icons"></i>
                                            <i class="material-icons"></i>
                                            <i class="material-icons"></i>
                                        </span>      
                                    </h3>
                                    <div class="description">
                                        <p class="phome">{{$item->desciption}}</p><a href="/package/{{$item->id}}">More info</a>
                                    </div>
                                    <span class="price">start from <em>{{$item->price_package}} THB</em></span>
                                    
                                    <a href="/booking/{{$item->id}}/create/1" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            @endforeach
                            @if($user != NULL)
                                @if($user->roles->role_name == "admin")
                                    <article class="one-fourth" id="be">
                                        <div class="details" style="height: 100%">  
                                            <a href="/package/create" class="gradient-button">create</a>
                                        </div>
                                    </article>
                                @endif
                            @endif

                        </div>
                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection