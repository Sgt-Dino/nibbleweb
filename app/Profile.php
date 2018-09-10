<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'restaurant';
    protected $fillable = ['restaurantname', 'phone', 'restauranttype', 'restaurantadmin', 'email', 'addressline1', 'subrub', 'websiteurl'];
    protected $primaryKey = 'restaurantid';
}
