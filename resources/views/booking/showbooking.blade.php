@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">

                    <!-- ++++++++++++++++++++++++++++++++ Activity ++++++++++++++++++++++++++++++++ -->
                    @if($statusbooking == 1)
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
                                    @if($Book->payment != 'no')
                                    <tr>
                                        <td>payment</td>
                                        <td>
                                            <div class="w3-tag w3-round w3-green" style="padding:3px">
                                                <div class="w3-tag w3-round w3-green w3-border w3-border-white">
                                                    {{$Book->payment}} : ฿{{$total}} 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif

                                </table>
                            </div>

                            @include('booking.footershow')
                            <!--//deal-->

                        </div>
                    </div>
                    <!--//latest offers-->

                    <!-- ++++++++++++++++++++++++++++++++++ Packet ++++++++++++++++++++++++++++++++++ -->
                    @elseif($statusbooking == 2)
                    <!--latest offers-->
                    <div class="static-content index">
                        <div class="row">
                            <h1>Packet</h1>
                                
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
                                        <td>Adult (s):</td>
                                        <td>{{$Book->number_adult}} <=> {{$Book->package->price_packet}}฿</td>
                                    </tr>
                                    @endif
                                    @if($Book->number_child!=0)
                                    <tr>
                                        <td>Child (s):</td>
                                        <td>{{$Book->number_child}} <=> {{$Book->package->price_packet}}฿</td>
                                    </tr>
                                    @endif
                                    @if($Book->number_baby!=0)
                                    <tr>
                                        <td>Infant(s) / Baby(s):</td>
                                        <td>{{$Book->number_baby}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Travel Date:</td>
                                        <td>{{$Book->booking_date}}</td>
                                    </tr>
                                    @if($Book->payment != 'no')
                                    <tr>
                                        <td>payment</td>
                                        <td>
                                            <div class="w3-tag w3-round w3-green" style="padding:3px">
                                                <div class="w3-tag w3-round w3-green w3-border w3-border-white">
                                                    {{$Book->payment}} : ฿{{$total}} 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>

                            @include('booking.footershow')
                            <!--//deal-->

                        </div>
                    </div>
                    <!--//latest offers-->

                    <!-- +++++++++++++++++++++++++++++++ Resservation +++++++++++++++++++++++++++++++ -->
                    @elseif($statusbooking == 3)
                    <!--latest offers-->
                    <div class="static-content index">
                        <div class="row">
                            <h1>Resservation</h1>
                                
                            <div class="detailstable">
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
                                        <td>Adult (s):</td>
                                        <td>{{$Book->number_adult}}</td>
                                    </tr>
                                    @endif
                                    @if($Book->number_child!=0)
                                    <tr>
                                        <td>Child (s):</td>
                                        <td>{{$Book->number_child}}</td>
                                    </tr>
                                    @endif
                                    @if($Book->number_baby!=0)
                                    <tr>
                                        <td>Infant(s) / Baby(s):</td>
                                        <td>{{$Book->number_baby}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Pick Up:</td>
                                        <td>{{$Book->shuttle->pick_up}}</td>
                                    </tr>
                                    <tr>
                                        <td>Drop Off:</td>
                                        <td>{{$Book->shuttle->drop_off}}</td>
                                    </tr>
                                    <tr>
                                        <td>Depart Date:</td>
                                        <td>{{$Book->shuttle->depart_date}}
                                            {{$Book->shuttle->depart_time}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Return Date:</td>
                                        <td>{{$Book->shuttle->return_date}} 
                                            {{$Book->shuttle->return_time}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Vehicle Type:</td>
                                        <td>{{$Book->shuttle->vehicle_type}}</td>
                                    </tr>
                                </table>
                            </div>

                            <!--//deal-->

                        </div>
                    </div>
                    <!--//latest offers-->
                    @endif
                    
                </div>
            </div>
        </div>
    </main>
    <!--//main-->
@endsection