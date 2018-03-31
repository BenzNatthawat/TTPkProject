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
                                
                            <div class="details">
                                <table id="customers">
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{$Book->prefix}} {{$Book->first_name}} {{$Book->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td>{{$Book->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Telephone: </td>
                                        <td>
                                            @for($i = 0; $i < 10; $i++)@if($i==3||$i==6) -
                                            @endif{{$Book->telephone[$i]}}@endfor
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Booking Status:</td>
                                        <td>
                                            @if($Book->booking_status === "Confirm")
                                            <div class="w3-tag w3-round w3-green" style="padding:3px">
                                                <div class="w3-tag w3-round w3-green w3-border w3-border-white">
                                                    {{$Book->booking_status}}
                                                </div>
                                            </div>
                                            @else
                                            <div class="w3-tag w3-round w3-deep-orange" style="padding:3px">
                                                <div class="w3-tag w3-round w3-deep-orange w3-border w3-border-white">
                                                    {{$Book->booking_status}}
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @if($Book->number_adult!=0)
                                    <tr>
                                        <td>Adult (s)/{{$Book->activity->price_adult}}:</td>
                                        <td>{{$Book->number_adult}} <=> {{$Book->number_adult * $Book->activity->price_adult}}฿</td>
                                    </tr>
                                    @endif
                                    @if($Book->number_child!=0)
                                    <tr>
                                        <td>Child (s)/{{$Book->activity->price_child}}:</td>
                                        <td>{{$Book->number_child}} <=> {{$Book->number_child * $Book->activity->price_child}}฿</td>
                                    </tr>
                                    @endif
                                    @if($Book->number_baby!=0)
                                    <tr>
                                        <td>Infant(s) / Baby(s):</td>
                                        <td>{{$Book->number_baby}} <=> (Free)</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Travel Date:</td>
                                        <td>{{$Book->booking_date}}</td>
                                    </tr>

                                </table>
                            </div>

                            <div style="float: right; margin-top: 10px;">
                                                             
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="upload" value="1">
                                    <input type="hidden" name="currency_code" value="THB">
                                    <input type="hidden" name="business" value="Travel_Transport_Phuket@mail.com">

                                    <span style="font-size: 2em; color: blue; margin-right: 20px;">
                                        {{$Book->number_child*$Book->activity->price_child+$Book->number_adult*$Book->activity->price_adult}}THB
                                    </span>
                                    
                                    @if($Book->number_adult!=0)
                                    <input type="hidden" name="item_name_1" value="Adult(s)/{{$Book->activity->price_adult}}:">
                                    <input type="hidden" name="amount_1" value="{{$Book->number_adult*$Book->activity->price_adult}}">
                                    @endif

                                    @if($Book->number_child!=0)
                                    <input type="hidden" name="item_name_2" value="Child(s)/{{$Book->activity->price_child}}:">
                                    <input type="hidden" name="amount_2" value="{{$Book->number_child*$Book->activity->price_child}}">
                                    @endif

                                    @if($Book->number_baby!=0)
                                    <input type="hidden" name="item_name_3" value="Body(s)/{{$Book->activity->price_baby}}:">
                                    <input type="hidden" name="amount_3" value="{{$Book->number_baby*$Book->activity->price_baby}}">
                                    @endif

                                    <input type="hidden" name="return" value="DOMAIN/success.php">
                                    <input type="hidden" name="cancel_return" value="DOMAIN/cancel.php">
                                    
                                    <input class="edit-button" type="submit" value="฿ PAYPAL">
                                </form>
                                                                
                            </div>

                            <!--//deal-->

                        </div>
                    </div>
                    <!--//latest offers-->
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection