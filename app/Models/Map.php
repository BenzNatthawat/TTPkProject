<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = ['location_name', 'latitude', 'longitude','activities_id',];

    public function Activity(){
    	return $this->hasOne('App\Models\Activity', 'id');
    }
}