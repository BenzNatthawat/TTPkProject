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
                                        <td>Travel Date:</td>
                                        <td>{{$Book->booking_date}}</td>
                                    </tr>
                                </table>
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