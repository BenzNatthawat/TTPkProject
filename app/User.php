<?php

namespace App;
use Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'user_name', 'password', 'email', 'telephone', 'town_city', 'country', 'roles_id',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function roles(){
        return $this->belongsTo('App\Models\Role');
    }

    public function bookings(){
        return $this->belongsToMany('App\Models\Booking');
    }

    public function maps(){
        return $this->hasOne('App\Models\Map', 'users_id');
    }
}
