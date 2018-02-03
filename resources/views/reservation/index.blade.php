@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

<!--main-->
    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                    @foreach( $user->bookings as $book)
                        {{$book}}
                        <input type="submit" name="" value="{{$book->booking_status}}...">
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <!--//main-->

@endsection