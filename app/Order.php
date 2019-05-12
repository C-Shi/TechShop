<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderLine;

class Order extends Model
{
    //
    function order_line(){
        return $this->hasMany('App\OrderLine');
    }
}
