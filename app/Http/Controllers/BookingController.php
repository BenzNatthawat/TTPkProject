<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }
    
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::all();
        return view('booking.index')    ->with('user',$user)
                                        ->with('bookings',$bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_activity,$id_book,Request $request)
    {
        $booking = Activity::findOrFail($id_activity);
        if($id_book == 1)
            return view('booking.create1')  ->with('booking', $booking);
        else if($id_book == 2){
            $book = $request->all();
            return view('booking.create2')  ->with('booking', $booking)
                                            ->with('book', $book);
        }
        else if($id_book == 3){
            $book = $request->all();
            return view('booking.create3')  ->with('booking', $booking)
                                            ->with('book', $book);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        Booking::create( $request->all() );
        $bookid = Booking::all()->last();
        $bookid->users()->sync(Auth()->user()->id);
        return redirect('/booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Bookings = Booking::findOrFail($id);      
        $Bookings->booking_status = $request->booking_status;
        $Bookings->update();
        return redirect('/booking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
