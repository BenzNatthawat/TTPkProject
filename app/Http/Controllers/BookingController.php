<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;
use App\Http\Requests\StorePostRequest;

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
        $this->middleware('auth')->only('position');
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

        if($id_book == 2){
            $rules = [
                "first_name" => "required|max:20|min:3",
                "last_name" => "required|max:20|min:3",
                "email" => "required|max:20|min:5|email",
                "telephone" => "required|digits:10",
                "town_city" => "required|max:20|min:5",
                "country" => "required|max:20|min:5",
                "number_adult" => "required|numeric",
                "number_child" => "required|numeric",
                "number_baby" => "required|numeric",
                "booking_date" => "required",
            ];
            $this->validate($request, $rules);
        }
            
        if($id_book == 1){
            return view('booking.create1')  ->with('booking', $booking);
        }
        else if($id_book == 2){
            $book = $request->all();
            return view('booking.create2')  ->with('booking', $booking)
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
        $book = Booking::findOrFail($id);
        $book->users()->sync([]);
        $book->delete();
        return redirect('/booking');
    }

    public function position()
    {
        $user = Auth::user();
        // dd($user);
        return view('booking.position')->with('user', $user);
    }
}
