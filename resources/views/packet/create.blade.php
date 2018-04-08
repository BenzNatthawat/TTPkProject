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
                    	<article class="full-width">
                            <div class="static-content create"> 
                            <form action="/packet" method="post" enctype="multipart/form-data">
                                <h1>Create package</h1>

                                <div class="full-width">
    								<label for="package name">package name</label>
    								<input type="text" name="package_name" placeholder="package name">
                                </div>
                                <div class="one-half">
    								<label for="price package">price packet</label>
    								<input type="number" name="price_packet" placeholder="price package">
                                </div>
                                <div class="full-width">
    								<label for="desciption">desciption</label>
    								<textarea name="desciption"></textarea>
                                </div>
                                <div class="one-half">
    								<label for="start time">start time</label>
    								<input type="number" name="start_time" placeholder="start time">
                                </div>
                                <div class="one-half">
    								<label for="finish time">finish time</label>
    								<input type="number" name="finish_time" placeholder="finish time">
                                </div>

								<div class="full-width">
									<label for="Multiple selection">Multiple selection</label>
									<input  type="file" name="files[]" multiple="multiple">
								</div>

								<div class="full-width">
								@foreach( $activities as  $index => $item )
									<label class="checkbox-inline">
									<!-- <h4> {{$pagenum*($page-1) + $index+1}} : {{$item->id}}</h4> --><h4>
									<input type="checkbox" name="packages[]" value="{{$item->id}}"> {{$pagenum*($page-1) + $index+1}} : {{$item->activity_name}}</h4>
									</label>
								<hr>
								@endforeach
								{{ $activities->links() }}
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