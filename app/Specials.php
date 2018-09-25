<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specials extends Model
{
    public $timestamps = false;
    protected $fillable = ['itemname','description','cost','startdate', 'enddate','specificday','active', 'restaurantid'];
    protected $table = 'special';
    protected $primaryKey = 'specialid';
}
