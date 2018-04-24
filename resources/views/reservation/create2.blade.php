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
                            <form action="/reservation" method="post" enctype="multipart/form-data">
                                @foreach($book as $index => $item)
                                    <input type="hidden" name="{{$index}}" value="{{$item}}" />
                                @endforeach
                                <h2><span> 02:Confirmation </span></h2>
                                <div class="row">
                                    <fieldset>
                                        <table id="customers">
                                            <tr>
                                                <td>First name: </td>
                                                <td>{{$book['first_name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Last name:</td>
                                                <td>{{$book['last_name']}}</td>
                                            </tr>
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
                                            @if($book['radio'] == 'form1')
                                                <tr>
                                                    <td>Pick up</td>
                                                    <td>{{$book['pick_up']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Drop off:</td>
                                                    <td>{{$book['drop_off']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Depart:</td>
                                                    <td>{{$book['depart_date']}} {{$book['depart_time']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Return:</td>
                                                    <td>{{$book['return_date']}} {{$book['return_time']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Vehicle type:</td>
                                                    <td>{{$book['vehicle_type']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Round:</td>
                                                    <td>{{$book['round']}}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>Pick up</td>
                                                    <td>{{$book['place_pick_up']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Drop off:</td>
                                                    <td>{{$book['place_drop_off']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Depart:</td>
                                                    <td>{{$book['pick_up_date']}} {{$book['pick_up_time']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Return:</td>
                                                    <td>{{$book['drop_off_date']}} {{$book['drop_off_time']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Car type:</td>
                                                    <td>{{$book['car_type']}}</td>
                                                </tr>
                                            @endif
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