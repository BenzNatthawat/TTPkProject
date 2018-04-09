<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function createAandP()
    {
        if (Auth::user()->roles->role_name == "admin"){
            $user = Auth::user();
            return view('admin.index')->with('user',$user);
        }
        else {
            $message = array('head' => 'You do not have role','detail' => 'You do not have role in create page');
            return view('error.dohaverole')->with('message', $message);
        }

    }
}
