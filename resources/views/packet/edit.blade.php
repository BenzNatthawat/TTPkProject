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
                            <form action="/packet/{{$packages->id}}" method="post" enctype="multipart/form-data">
                                <h2>Edit packet:<span>{{$packages->package_name}}</span></h2>

                                <div class="full-width">
    								<label for="packet_name">packet name</label>
    								<input type="text" name="package_name" placeholder="packet name" value="{{$packages->package_name}}">
                                </div>
                                <div class="full-width">
    								<label for="price_packet">price packet</label>
    								<input type="number" name="price_packet" placeholder="price packet" value="{{$packages->price_packet}}">
                                </div>
                                <div class="full-width">
    								<label for="desciption">desciption</label>
    								<textarea name="desciption">{{$packages->desciption}}</textarea>
                                </div>

                                <div class="one-third">
    								<label for="start_time">start time</label>
    								<input type="text" name="start_time" placeholder="start time" value="{{$packages->start_time}}">
                                </div>
                                <div class="one-third">
    								<label for="finish_time">finish time</label>
    								<input type="text" name="finish_time" placeholder="finish time" value="{{$packages->finish_time}}">
                                </div>
                                <div class="one-third">
    								<label for="take_time">take time</label>
    								<input type="text" name="take_time" placeholder="take time" value="{{$packages->take_time}}">
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

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection