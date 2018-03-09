<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packagesservice;
use App\Models\Booking;
use Auth;
use App\Http\Requests\StorePostRequest;

class BookingPackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_package,$id_book,Request $request)
    {
        $booking = Packagesservice::findOrFail($id_package);

        if($id_book == 2){
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
                "booking_date" => "required",
            ];
            $this->validate($request, $rules);
        }
            
        if($id_book == 1){
            return view('booking.createpackage1')  ->with('booking', $booking);
        }
        else if($id_book == 2){
            $book = $request->all();
            return view('booking.createpackage2')  ->with('booking', $booking)
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
        //
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
        if($Book->users[0]->id === Auth::user()->id){
            return view('booking.editdelect.editpackage')->with('Book', $Book);
            // dd($Book);
        }
        echo("benz");
        // dd($Book[0]);
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
}
