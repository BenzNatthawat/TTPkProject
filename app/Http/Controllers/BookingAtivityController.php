<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;
use App\Http\Requests\StorePostRequest;
use Carbon\Carbon;

class BookingAtivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        $shubookings = Booking::where('shuttles_id','NOT LIKE',NULL)->get();
        $pacbookings = Booking::where('packageservices_id','NOT LIKE',NULL)->get();
        $actbookings = Booking::where('activities_id','NOT LIKE',NULL)->get();

        return view('booking.index')    ->with('user',$user)
                                        ->with('shubookings',$shubookings)
                                        ->with('pacbookings',$pacbookings)
                                        ->with('actbookings',$actbookings);
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
            $carbon = new Carbon();  
            $today = $carbon->format('m/d/Y');
            $rules = [
                "first_name" => "required|max:20|min:3",
                "last_name" => "required|max:20|min:3",
                "email" => "required|min:5|email",
                "telephone" => "required|digits:10",
                "town_city" => "required|max:20|min:5",
                "country" => "required|max:20|min:5",
                "number_adult" => "required|numeric",
                "number_child" => "required|numeric",
                "number_baby" => "required|numeric",
                "booking_date" => "required|after:$today",
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
        $Book = Booking::findOrFail($id);
        $statusbooking = 1;

        if($Book->users[0]->id === Auth::user()->id){
            $total = $Book->number_child*$Book->activity->price_child+$Book->number_adult*$Book->activity->price_adult;
            return view('booking.showbooking')  ->with('Book', $Book)
                                                ->with('total',$total)
                                                ->with('statusbooking',$statusbooking);
            // dd($Book);
        }
        else{
            $message = array('head' => 'You do not have role','detail' => $Book);
            return view('error.dohaverole')->with('message', $message);
        }
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
        //
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

    public function confirmpayment($id)
    {
        $Booking = Booking::findOrFail($id);      
        $Booking->payment = 'pay';
        $Booking->save();
        return back();
    }

    public function statusbooking($id)
    {
        $Bookings = Booking::findOrFail($id);    
        $Bookings->booking_status = 'Confirm';
        $Bookings->update();
        return redirect('/booking');
    }
}
