<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'menuitem';
    protected $primaryKey = 'menuitemid';
}
