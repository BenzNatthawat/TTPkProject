<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shuttle extends Model
{
    protected $fillable = ['room_number', 'pick_up', 'drop_off', 'depart_date', 'return_date', 'depart_time', 'return_time', 'vehicle_type', 'round', 'maps_id', 'users_id',];

    public function userqu(){
   		return $this->hasOne('App\User','id', 'users_id');
   	}
}
