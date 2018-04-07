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
                            <form action="/BookingActivity" method="post" enctype="multipart/form-data">
                                @foreach($book as $index => $item)
                                    <input type="hidden" name="{{$index}}" value="{{$item}}" />
                                @endforeach
                                <h2><span> 02:Confirmation </span> {{$booking->activity_name}}</h2>
                                <div class="row">
                                    <fieldset>
                                        <table id="customers">
                                            
                                            <tr>
                                                <td>E-mail</td>
                                                <td>{{$book['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone number:</td>
                                                <td>{{$book['telephone']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Town / City: </td>
                                                <td>{{$book['town_city']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Country:</td>
                                                <td>{{$book['country']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Adult (s):</td>
                                                <td>{{$book['number_adult']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Child (s):</td>
                                                <td>{{$book['number_child']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Infant(s) / Baby(s):</td>
                                                <td>{{$book['number_baby']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Travel Date:</td>
                                                <td>{{$book['booking_date']}}</td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </div>
                                <div class="full-width">
                                    <input type="checkbox" id="chkCon" onClick="check(this)" />
                                    I have read and agree to these terms and conditions.
                                    <a href="/conditions">here</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                                <div class="full-width">
								    <input type="submit" id="btnSend" value="Booking" disabled/>
                                </div>
							</form>
                        </div>
                        </article>
                        <!--//deal-->

                        @include('booking.footercreatebook')

                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection

@section('js')
<script type="text/javascript">
  function check(e){
    if(e.checked == true) {
        document.getElementById('btnSend').disabled=false;
    } else {
        document.getElementById('btnSend').disabled=true;
    }   
}
</script>

@endsection