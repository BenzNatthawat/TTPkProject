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
                                    <figure><a href="/activity/create" title="">
                                    <img style="width: 900px; height: 250px;" src="/images/create.png" alt="tour" /></a></figure>

                                    <div class="details" style="height: 245px;">
                                        <h3 class="phometitle">Name Activity</h3>

                                        <div class="description">
                                        <p class="phome">Wep page activity</p><a href="/activity/create">More info</a>
                                    </div>
                                    <span class="price">start from <em>500 THB</em></span>
                                    
                                    <a href="/activity/create" title="Book now" class="gradient-button">create activity</a>

                                    </div>
                                    
                                </article>

                                <article class="one-third" id="be">
                                    <figure><a href="/packet/create" title="">
                                    <img style="width: 900px; height: 250px;" src="/images/create.png" alt="tour" /></a></figure>

                                    <div class="details" style="height: 245px;">
                                        <h3 class="phometitle">Name Packet</h3>

                                        <div class="description">
                                        <p class="phome">Wep page packet</p><a href="/packet/create">More info</a>
                                    </div>
                                    <span class="price">start from <em>500 THB</em></span>
                                    
                                    <a href="/packet/create" title="Book now" class="gradient-button">create packet</a>

                                    </div>

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