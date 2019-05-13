<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    //
    function order(){
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    function product() {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
