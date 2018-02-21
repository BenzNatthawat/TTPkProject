@extends('layouts.header')

@section('title', 'Travel Transport Phuket')

@section('content')
<!--slider-->
<div class="slider">
    <ul id="hero-gallery" class="cS-hidden">
        <li data-thumb="images/slider4.jpg"> 
            <img src="images/slider4.jpg" alt="" />
        </li>
        <li data-thumb="images/slider5.jpg"> 
            <img src="images/slider5.jpg" alt="" />
        </li>
        <li data-thumb="images/slider6.jpg"> 
            <img src="images/slider6.jpg" alt="" />
        </li>   
    </ul>
</div>
<!--//slider-->
<!--search-->
<div class="main-search">
    <div class="wrap">
        <form id="main-search" method="post" action="/reservation/create/1">
            <div class="row">
                <!--column-->
                <div class="column radios one-fourth">
                    <h5><span>01</span> What?</h5>
                    <div class="row" style="margin-left: 10px">
                        <div class="f-item one-full">
                            <input type="radio" name="radio" id="driver" value="form1" checked required />
                            <label for="hotel">Shuttles</label>
                        </div>
                        <div class="f-item one-full">
                            <input type="radio" name="radio" id="rent_a_car" value="form3" required/>
                            <label for="rent_a_car">Rent a Car</label>
                        </div>
                    </div>
                </div>
                <!--//column-->
                
                <div class="three-fourth">
                    <!--form rent a driver-->
                    <div class="form row" id="form1">
                        <!--column-->
                        <div class="column one-third">
                            <h5><span>02</span> Where?</h5>
                            <div class="row">
                                <div class="f-item full-width">
                                    <label for="destination7">Pick Up</label>
                                    <input type="text" placeholder="Where the place that pick up you." id="destination7" name="pick_up" required/>
                                </div>
                                <div class="f-item full-width">
                                    <label for="destination8">Drop Off</label>
                                    <input type="text" placeholder="Where the place that drop off you." id="destination8" name="drop_off" required/>
                                </div>
                            </div>
                        </div>
                        <!--//column-->
                        
                        <!--column-->
                        <div class="column one-third">
                            <h5><span>03</span> When?</h5>
                            <div class="row">
                                <div class="f-item full-width datepicker">
                                    <label for="datepicker1">Pick up time</label>
                                    <div class="row">
                                        <div class="f-item one-half">
                                            <div class="datepicker-wrap">
                                                <input type="text" placeholder="" id="datepicker1" name="depart_date" required/>
                                            </div>
                                        </div>
                                        <div class="f-item one-half">
                                            <div class="indexpicker">
                                                <input id="timepicker1" type="text" name="depart_time" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="f-item full-width datepicker">
                                    <label for="datepicker2">Drop of time</label>
                                    <div class="row">
                                        <div class="f-item one-half">
                                            <div class="datepicker-wrap">
                                                <input type="text" placeholder="" id="datepicker2" name="return_date" required/>
                                            </div>
                                        </div>
                                        <div class="f-item one-half">
                                            <div class="indexpicker">
                                                <input id="timepicker2" type="text" name="return_time" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//column-->
                    
                        <!--column-->
                        <div class="column one-third">
                            <h5><span>04</span> Who?</h5>
                            <div class="row">
                                <div class="f-item full-width">
                                    <label for="spinner2">Vehicle Type:</label>
                                    <select name="vehicle_type">
                                        <option>No Preference</option>
                                        <option>Van</option>
                                        <option>Taxi</option>
                                    </select>
                                </div>
                                <div class="f-item full-width">
                                    <label for="spinner2">One-Way Or Round-Rrip:</label>
                                    <select name="round">
                                        <option>One-Way</option>
                                        <option selected>Round-Trip</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--//column-->
                    </div>  
                    <!--//form rent a driver-->

                    
                    <!--form rent a car-->
                    <div class="form row" id="form3">
                        <!--column-->
                        <div class="column one-third">
                            <h5><span>02</span> Where?</h5>
                            <div class="row">
                                <div class="f-item full-width">
                                    <label for="destination7">Place To Pick Up Car</label>
                                    <input type="text" placeholder="I want to pick up car in" id="destination7" name="place_pick_up" />
                                </div>
                                <div class="f-item full-width">
                                    <label for="destination8">Place To Drop Off Car</label>
                                    <input type="text" placeholder="I want to pick drop off car in" id="destination8" name="place_drop_off" />
                                </div>
                            </div>
                        </div>
                        <!--//column-->
                        
                        <!--column-->
                        <div class="column one-third">
                            <h5><span>03</span> When?</h5>
                            <div class="row">
                                <div class="f-item full-width datepicker">
                                    <label for="datepicker4">Car Pick Up Date</label>
                                    <div class="row">
                                        <div class="f-item one-half">
                                            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker4" name="pick_up_date" /></div>
                                        </div>
                                        <div class="f-item one-half">
                                            <div class="indexpicker">
                                                <input id="timepicker3" type="text" name="pick_up_time"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="f-item full-width datepicker">
                                    <label for="datepicker5">Car Drop Off Date</label>
                                    <div class="row">
                                        <div class="f-item one-half">
                                            <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker5" name="drop_off_date"/>
                                                <!-- <img class="ui-datepicker-trigger" src="images/calendar.png" alt="..." title="..."> -->
                                            </div>
                                        </div>
                                        <div class="f-item one-half">
                                            <div class="indexpicker">
                                                <input id="timepicker4" type="text" name="drop_off_time"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//column-->
                    
                        <!--column-->
                        <div class="column one-third">
                            <h5><span>04</span> Who?</h5>
                            <div class="row">
                                <div class="f-item full-width">
                                    <label for="spinner2">Car type:</label>
                                    <select name="car_type">
                                        <option>No Preference</option>
                                        <option>Economy</option>
                                        <option>Compact</option>
                                        <option>Midsize</option>
                                        <option>Standard</option>
                                        <option>Full Size</option>
                                        <option>Premium</option>
                                        <option>Luxury</option>
                                        <option>Convertible</option>
                                        <option>MiniSUV</option>
                                        <option>Sports Car</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--//column-->
                    </div>  
                    <!--//form rent a car-->
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Proceed to results" class="gradient-button search-submit" id="search-submit" />
            </div>
        </form>
    </div>
</div>
<!--//search-->
@endsection

@section('js')
<script src="js/timepicki.js"></script>
<script type="text/javascript"> 
    $('#timepicker1').timepicki();
    $('#timepicker2').timepicki();
    $('#timepicker3').timepicki();
    $('#timepicker4').timepicki();
        (function( $ ) {
            $(document).ready(function(){
                $('.form').hide();
                $('#form1').show();
                $('.f-item:nth-child(1)').addClass('active');
                $('.f-item:nth-child(1) span').addClass('checked');     

                $('#hero-gallery').lightSlider({
                    gallery:true,
                    item:1,
                    pager:false,
                    gallery:false,
                    slideMargin: 0,
                    speed:2000,
                    pause:6000,
                    mode: 'fade',
                    auto:true,
                    loop:true,
                    onSliderLoad: function() {
                        $('#hero-gallery').removeClass('cS-hidden');
                    }  
                });         
            });
        })(jQuery);
    </script>
@endsection
