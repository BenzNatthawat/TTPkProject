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
                                <h2>Create <span>package</span></h2>

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
                                    <label for="start_time">start time</label>
                                    <input id="timepicker1" type="text" name="start_time" placeholder="start_time">
                                </div>
                                <div class="one-half">
                                    <label for="finish_time">finish time</label>
                                    <input id="timepicker3" type="text" name="finish_time" placeholder="finish_time">
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

@section('js')

<script src="../js/timepicki.js"></script>
<script type="text/javascript"> 
    $('#timepicker1').timepicki();
    $('#timepicker2').timepicki();
    $('#timepicker3').timepicki();
    $('#timepicker4').timepicki();
</script>

@endsection