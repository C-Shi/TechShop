<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    //
    function order(){
        return $this->belongsTo('App\Order');
    }
}