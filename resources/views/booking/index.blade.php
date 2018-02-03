@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                    <h3>Bookings</h3>
                    <table id="customers" style="text-align: center;">
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
                        <td><input type="submit" name="" value="{{$book->booking_status}}"></td>
                        <td>
                            <input class="edit-button" type="button" name="" value="Edit">
                            <input class="delete-button" id="delete" type="button" name="" value="Delete">
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->shuttle->pick_up}} => {{$book->shuttle->drop_off}}</td>
                        <td>{{$book->created_at}}</td>
                        <td><input type="submit" name="" value="{{$book->booking_status}}"></td>
                        <td>
                            <input class="edit-button" type="button" name="" value="Edit">
                            <input class="delete-button" id="delete" type="button" name="" value="Delete">
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </table>

                    <!-- admin -->
                    @if(Auth::user()->roles->role_name === 'admin')
                    <h3>Admin Status</h3>
                    <table id="customers" style="text-align: center;">
                    <tr>
                        <th style="text-align: center;">Order</th>
                        <th style="text-align: center;">Name Booking</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;"></th>
                    </tr>
                    @foreach( $bookings as $index => $book)
                    @if($book->activities_id != NULL)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$book->first_name}} {{$book->last_name}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->booking_status}}</td>
                        <form action="/booking/{{$book->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="booking_status" value="Confirm">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td><input type="submit" name="" value="Confirm"></td>
                        </form>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection