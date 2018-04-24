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
                            <h1>Packet</h1>

                            <div class="search-body">
                                <!--search-->
                                <div class="search">
                                    <form id="search-form" method="post" action="searchformP">
                                        <input type="search" placeholder="Search entire site here" name="site_search" id="site_search" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        <input type="submit" id="submit-site-search" value="submit-site-search" name="submit-site-search"/>
                                    </form>
                                </div>
                                <!--//search-->
                            </div>

                            @foreach( $packages as $item )
                            @if($item->destroy != 0)
                            <!--deal-->
                            <article class="one-third" id="be">

                                @if($item->images->isNotEmpty())
                                    <figure>
                                    <a href="packet/{{$item->id}}" title="">
                                        <img style="width: 900px; height: 250px;" src="img/{{$item->images[0]->image_name}}" alt="{{$item->activity_name}}" />
                                    </a>
                                    </figure>
                                @else
                                    <figure>
                                    <a href="packet/{{$item->id}}" title="">
                                        <img style="width: 900px; height: 250px;" src="/images/showactivity.jpg" alt="{{$item->activity_name}}" />
                                    </a>
                                    </figure>
                                @endif

                                <div class="details" style="height: 245px;">
                                    <h3 class="phometitle">{{$item->package_name}}
                                        <span class="stars">
                                        <?php
                                            $Excellent = $item->reviews->where('score_review', 'Excellent')->count();
                                            $Verygood = $item->reviews->where('score_review', 'Very good')->count();
                                            $Average = $item->reviews->where('score_review', 'Average')->count();
                                            $Poor = $item->reviews->where('score_review', 'Poor')->count();
                                            $Terrible = $item->reviews->where('score_review', 'Terrible')->count();
                                            $sum = $item->reviews->count();
                                            $sum!=0?$sum:$sum=1;
                                            $score = round(($Excellent*1+$Verygood*0.8+$Average*0.6+$Poor*0.4+$Terrible*0.2)/$sum*4,0);
                                        ?>

                                        @for($i=0; $i<=$score; $i++)
                                        <i class="material-icons"></i>
                                        @endfor
                                        </span>      
                                    </h3>
                                    <div class="description">
                                        <p class="phome">{{$item->desciption}}</p><a href="/packet/{{$item->id}}">More info</a>
                                    </div>
                                    <span class="price">start from <em>{{$item->price_packet}} THB</em></span>

                                    <form action="/packet/{{$item->id}}" method="post" enctype="multipart/form-data">
                                    <a href="/BookingPackage/{{$item->id}}/create/1" title="Book now" class="gradient-button">Book now</a>

                                    @if($user != NULL)
                                        @if($user->roles->role_name == "admin")
                                            <a href="/packet/{{$item->id}}/edit" class="edit-button">Edit</a>
                                            <input id="delete-button" type="submit" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @endif
                                    @endif
                                    </form>

                                </div>
                            </article>
                            <!--//deal-->
                            @endif
                            @endforeach

                        </div>
                        <div class="full-width-page">
                            {{ $packages->links() }}
                        </div>
                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection