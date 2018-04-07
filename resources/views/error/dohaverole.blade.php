@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')

    <main class="main">
        <div class="wrap">
            <div class="row">
                <div class="full-width">
                    <div class="static-content">
                        <h1 class="headlabel nothave">{{$message['head']}}.</h1>
                        <h3>
                            @if(!empty($message['detail']->id))
                                Id: {{$message['detail']->id}}<br>
                                Activity: {{$message['detail']->activity->activity_name}}.
                            @else
                                {{$message['detail']}}.
                            @endif
                        </h3>
                        <div>
                            <ul>
                                <li><a href="/activity">activity</a></li>
                                <li><a href="/packet">packet</a></li>
                                <li><a href="/reservation">reservation</a></li>
                                <li><a href="/booking">booking</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>

@endsection