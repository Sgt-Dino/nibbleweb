<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = false;
    protected $fillable = ['itemname', 'itemdescription', 'itemprice', 'menucategoryid'];
    protected $table = 'menuitem';
    protected $primaryKey = 'menuitemid';
}
