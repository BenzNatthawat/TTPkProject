<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packagesservice extends Model
{
    protected $fillable = ['package_name', 'price_package', 'desciption', 'start_time', 'finish_time	', 'take_time',];
}