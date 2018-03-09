@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                    <div>
                    <h3>Bookings</h3>
                    @if(!$user->bookings->isEmpty())
                    <table id="customers" style="text-align: center;"><!-- #0077c2 -->
                    <tr>
                        <th style="text-align: center;">Order</th>
                        <th style="text-align: center;">Packet</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;"> </th>
                    </tr>

                    @foreach( $user->bookings as $index => $book)
                    @if($book->activities_id != NULL)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->activity->activity_name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>
                            <a href="BookingActivity/{{$book->id}}">
                            <input type="submit" name="" value="{{$book->booking_status}}">
                            </a>
                        </td>
                        <td>
                        <form action="/BookingActivity/{{$book->id}}" method="POST">
                            <input class="edit-button" type="button" name="" value="Edit">
                            <input id="delete-button" type="submit" name="_method" value="DELETE">
                        </td>
                        {{ csrf_field() }}
                        </form>
                    </tr>
                    @elseif($book->shuttle != NULL)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->shuttle->pick_up}} => {{$book->shuttle->drop_off}} 
                            ({{$book->shuttle->userqu['user_name']}})
                        </td>
                        <td>{{$book->created_at}}</td>
                        <td>
                            <a href="reservation/{{$book->id}}">
                            <input type="submit" name="" value="{{$book->booking_status}}">
                            </a>
                        </td>
                        <td>
                        <form action="/reservation/{{$book->id}}" method="POST">
                            <input class="edit-button" type="button" name="" value="Edit">
                            <input id="delete-button" type="submit" name="_method" value="DELETE">
                        </td>
                        {{ csrf_field() }}
                        </form>
                    </tr>
                    @elseif($book->package != NULL)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->package->package_name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>
                            <a href="BookingPackage/{{$book->id}}">
                            <input type="submit" name="" value="{{$book->booking_status}}">
                            </a>
                        </td>
                        <td>
                        <form action="/BookingPackage/{{$book->id}}" method="POST">
                            <input class="edit-button" type="button" name="" value="Edit">
                            <input id="delete-button" type="submit" name="_method" value="DELETE">
                        </td>
                        {{ csrf_field() }}
                        </form>
                    </tr>
                    @else

                    @endif
                    @endforeach
                    </table>
                    @else
                    <table id="customers" style="text-align: center;">
                        <th style="text-align: center; background-color: #FF3232">Not Booking</th>
                    </table>
                    @endif
                    </div>

                    
                    <!-- admin -->
                    @if(Auth::user()->roles->role_name === 'admin')
                    @if(!$shubookings->isEmpty())
                    <h3>Admin Status</h3>

                    <div>
                    <h3>Booking Shuttles</h3>
                    <table id="customers" style="text-align: center;">
                    <tr>
                        <th style="text-align: center;">Order</th>
                        <th style="text-align: center;">Name Booking</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;"></th>
                    </tr>
                    @foreach( $shubookings as $index => $book)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->first_name}} {{$book->last_name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->booking_status}}</td>
                        <form action="/BookingActivity/{{$book->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="booking_status" value="Confirm">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td>
                                <input type="submit" name="" value="Confirm">
                                <input id="delete-button" type="submit" name="_method" value="DELETE">
                            </td>
                        </form>
                    </tr>
                    @endforeach
                    </table>
                    </div>
                    @endif

                    @if(!$pacbookings->isEmpty())
                    <div>
                    <h3>Booking Activities</h3>
                    <table id="customers" style="text-align: center;">
                    <tr>
                        <th style="text-align: center;">Order</th>
                        <th style="text-align: center;">Name Booking</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;"></th>
                    </tr>
                    @foreach( $pacbookings as $index => $book)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->first_name}} {{$book->last_name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->booking_status}}</td>
                        <form action="/BookingActivity/{{$book->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="booking_status" value="Confirm">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td>
                                <input type="submit" name="" value="Confirm">
                                <input id="delete-button" type="submit" name="_method" value="DELETE">
                            </td>
                        </form>
                    </tr>
                    @endforeach
                    </table>
                    </div>
                    @endif

                    @if(!$actbookings->isEmpty())
                    <div>
                    <h3>Booking Packageservices</h3>
                    <table id="customers" style="text-align: center;">
                    <tr>
                        <th style="text-align: center;">Order</th>
                        <th style="text-align: center;">Name Booking</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;"></th>
                    </tr>
                    @foreach( $actbookings as $index => $book)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->first_name}} {{$book->last_name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->booking_status}}</td>
                        <form action="/BookingActivity/{{$book->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="booking_status" value="Confirm">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td>
                                <input type="submit" name="" value="Confirm">
                                <input id="delete-button" type="submit" name="_method" value="DELETE">
                            </td>
                        </form>
                    </tr>
                    @endforeach
                    </table>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection