<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $fillable = ['activity_name', 'price_adult', 'price_child', 'desciption', 'start_time', 'finish_time', 'take_time',];
    
    public function images(){
    	return $this->hasMany('App\Models\Image', 'activities_id');
    }

    public function map_location(){
    	return $this->hasOne('App\Models\Map', 'activities_id');
    }
    
    public function bookings(){
        return $this->hasOne('App\Models\Booking', 'id');
    }
}