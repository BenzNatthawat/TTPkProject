<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packagesservice extends Model
{
    protected $fillable = ['package_name', 'price_package', 'desciption', 'start_time', 'finish_time	', 'take_time',];

    public function activities(){
        return $this->belongsToMany('App\Models\Activity');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review', 'packagesservices_id');
    }
}