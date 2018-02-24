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
                            <form action="/activity/{{$activities->id}}" method="post" enctype="multipart/form-data">
                                <h2>Edit Activity:<span>{{$activities->activity_name}}</span></h2>

                                <div class="full-width">
    								<label for="activity name">activity name</label>
    								<input type="text" name="activity_name" placeholder="activity name" value="{{$activities->activity_name}}">
                                </div>
                                <div class="one-half">
    								<label for="price adult">price adult</label>
    								<input type="number" name="price_adult" placeholder="price adult" value="{{$activities->price_adult}}">
                                </div>
                                <div class="one-half">
    								<label for="price child">price child</label>
    								<input type="number" name="price_child" placeholder="price child" value="{{$activities->price_child}}">
                                </div>
                                <div class="full-width">
    								<label for="desciption">desciption</label>
    								<textarea name="desciption">{{$activities->desciption}}</textarea>
                                </div>

								<div class="full-width">
									<label for="Multiple selection">Multiple selection</label>
									<input  type="file" name="files[]" multiple="multiple">
								</div>
									<input type="hidden" name="_method" value="PUT">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="full-width">
								    <input type="submit" value="Submit">
                                </div>
							</form>
                        </div>
                        </article>
                        <!--//deal-->

						<article class="one-third">
                            <!--latest offers-->
                            <div class="static-content index">
                                <div class="row">
                                    <!--deal-->
                                    <div class="details">
                                        <h3 class="phometitle">{{$activities->activity_name}} :image                             
                                        </h3>
                                    </div>
                                    <hr>
                                    @foreach($activities->images as $image)
                                    	<img src="/img/{{$image->image_name}}">
                                    @endforeach
                                    <!--//deal-->
                                </div>
                            </div>
                            <!--//latest offers-->
                        </article>

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection