<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specials extends Model
{
    public $timestamps = false;
    protected $fillable = ['itemname','Description','cost','startdate', 'enddate'];
    protected $table = 'special';
    protected $primaryKey = 'specialid';
}
