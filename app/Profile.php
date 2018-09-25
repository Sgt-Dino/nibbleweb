<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;
    protected $fillable = ['restaurantname', 'phone', 'restauranttype', 'restaurantadmin', 'gpslocation', 'email', 'addressline1', 'addressline2', 'subrub','opentime','closetime', 'websiteurl', 'active'];
    protected $table = 'restaurant';
    protected $primaryKey = 'restaurantid';
}
