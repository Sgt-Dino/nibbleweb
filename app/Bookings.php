<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //protected $fillable =['numofguests','date'];

    protected $table = "bookingrequest";
    public $timestamps = false;
    protected $fillable = ['status', 'accepted'];
    protected $primaryKey = 'bookingrequestid';
}
