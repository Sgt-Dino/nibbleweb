<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //protected $fillable =['numofguests','date'];

    protected $table = "specialday";
    public $timestamps = false;
    protected $fillable = ['dayid', 'specialid'];
    protected $primaryKey = 'specialdayid';
}
