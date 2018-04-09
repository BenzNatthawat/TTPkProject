@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

	<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                
                    <!--latest offers-->
                    <div class="static-content create">
                        <div class="row">
                            <h2>Create <span>Activity & Packet</span></h2>
                            
                            @if($user != NULL)
                                @if($user->roles->role_name == "admin")

                                <article class="one-third" id="be">
                                    <figure><a href="packet/#" title="">
                                    <img style="width: 900px; height: 250px;" src="" alt="tour" /></a></figure>

                                    <div class="details" style="height: 245px;">
                                        <h3 class="phometitle">xxxxx</h3>

                                    </div>
                                </article>

                                    <article class="one-fourth" id="be">
                                        <div class="details" style="height: 100%">  
                                            <a href="/activity/create" class="gradient-button">create</a>
                                        </div>
                                    </article>
                                @endif

                                @if($user->roles->role_name == "admin")
                                    <article class="one-fourth" id="be">
                                        <div class="details" style="height: 100%">  
                                            <a href="/packet/create" class="gradient-button">create</a>
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