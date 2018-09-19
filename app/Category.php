<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'menucategory';
    protected $fillable = ['restaurantid', 'name', 'description','active'];
    protected $primaryKey = 'menucategoryid';
}
