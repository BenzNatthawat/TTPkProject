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
                            <h1>Activity</h1>

                            <div class="search-body">
                                <!--search-->
                                <div class="search">
                                    <form id="search-form" method="post" action="searchform">
                                        <input type="search" placeholder="Search entire site here" name="site_search" id="site_search" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        <input type="submit" id="submit-site-search" value="submit-site-search" name="submit-site-search"/>
                                    </form>
                                </div>
                                <!--//search-->
                            </div>
                            
                            @foreach( $activities as $item )
                            @if($item->destroy != 0)
                            <!--deal-->
                            <article class="one-fourth" id="be">
                                @foreach( $item->images as $index => $img)
                                @if($img->activities_id == $item->id && $index == 1)
                                    <figure><a href="activity/{{$item->id}}" title=""><img style="width: 900px; height: 180px;" src="img/{{$img->image_name}}" alt="{{$item->activity_name}}" /></a></figure>
                                @endif
                                @endforeach 
                                <div class="details" style="height: 245px;">
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

                                    <h3 class="phometitle">{{$item->activity_name}}
                                        <span class="stars">
                                            @for($i=0; $i<=$score; $i++)
                                            <i class="material-icons"></i>
                                            @endfor
                                        </span>                                    
                                    </h3>
                                    <div class="description">
                                        <p class="phome">{{$item->desciption}}</p><a href="activity/{{$item->id}}">More info</a>
                                    </div>
                                    <span class="price">start from <em>{{$item->price_adult}} THB</em></span>
                                    
                                    <a href="/booking/{{$item->id}}/create/1" title="Book now" class="gradient-button">Book now</a>

                                    @if($user != NULL)
                                        @if($user->roles->role_name == "admin")
                                            <a href="/activity/{{$item->id}}/edit" class="edit-button">Edit</a>

                        <form action="/activity/{{$item->id}}" method="post" enctype="multipart/form-data">

                                            <input id="delete-button" type="submit" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        </form>

                                        @endif
                                    @endif

                                </div>
                            </article>
                            <!--//deal-->
                            @endif
                            @endforeach
                            @if($user != NULL)
                                @if($user->roles->role_name == "admin")
                                    <article class="one-fourth" id="be">
                                        <div class="details" style="height: 100%">  
                                            <a href="/activity/create" class="gradient-button">create</a>
                                        </div>
                                    </article>
                                @endif
                            @endif

                        </div>
                        <div class="full-width-page">
                            {{ $activities->links() }}
                        </div>
                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection