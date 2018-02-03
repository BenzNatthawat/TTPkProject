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
                            @foreach( $activities as $index => $item )
                            <!--deal-->
                            <article class="one-fourth" id="be">
                                <input type="hidden" value="{{$index = 1}}">
                                @foreach( $item->images as $img)
                                @if($img->activities_id === $item->id && $index === 1)
                                    <figure><a href="activity/{{$item->id}}" title=""><img style="width: 900px; height: 180px;" src="img/{{$img->image_name}}" alt="{{$item->activity_name}}" /></a></figure>
                                    <input type="hidden" value="{{$index=0}}">
                                @endif
                                @endforeach 
                                <div class="details" style="height: 245px;">
                                    <h3 class="phometitle">{{$item->activity_name}}
                                        <span class="stars">
                                            <i class="material-icons"></i>
                                            <i class="material-icons"></i>
                                            <i class="material-icons"></i>
                                            <i class="material-icons"></i>
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
                                        @endif
                                    @endif

                                </div>
                            </article>
                            <!--//deal-->
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