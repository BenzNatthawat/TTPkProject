<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // protected $table = 'reviews';
    protected $fillable = ['review', 'score_review', 'users_id', 'activities_id', 'packagesservices_id',];

    public function user(){
        return $this->hasOne('App\User', 'id', 'users_id');
    }
}
