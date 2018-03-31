<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // protected $table = 'bookings';
    protected $fillable = ['prefix','first_name','last_name','email','telephone','number_adult','number_child','number_baby','booking_date','town_city','country','booking_status','shuttles_id','packageservices_id','activities_id'];

    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    public function activity(){
        return $this->hasOne('App\Models\Activity', 'id', 'activities_id');
    }

    public function shuttle(){
        return $this->hasOne('App\Models\Shuttle', 'id', 'shuttles_id');
    }

    public function package(){
        return $this->hasOne('App\Models\Packagesservice', 'id', 'packageservices_id');
    }
}