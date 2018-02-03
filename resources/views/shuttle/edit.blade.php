@extends('layouts.body')

@section('title', 'Travel Transport Phuket - create activities')

@section('bgmenu', ' ')

@section('activity', 'active bottonmenu')

@section('content')

	<div class="iBannerFix">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="divbox divbox-mp">
					<h3>edit activity</h3>
					<form action="/activity/{{$activities->id}}" method="post">
						<label for="activity name">activity name</label>
							<input type="text1" name="activity_name" value="{{$activities->activity_name}}">
						<label for="price adult">price adult</label>
							<input type="number" name="price_adult" value="{{$activities->price_adult}}">
						<label for="price child">price child</label>
							<input type="number" name="price_child" value="{{$activities->price_child}}"><br>
						<label for="desciption">desciption</label>
							<textarea name="desciption">{{$activities->desciption}}</textarea>

							<input type="hidden" name="_method" value="PUT">
							{{csrf_field()}}
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>


<script>


@endsection