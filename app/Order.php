<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderLine;

class Order extends Model
{
    //
    public function order_line(){
        return $this->hasMany('App\OrderLine');
    }

    public function sum(){
        $products = $this->order_line;
        $sum = 0;
        foreach($products as $product) {
            $unit_price = $product->product->price;
            $quantity = $product->quantity;
            $unit_sum = $quantity * $unit_price;
            $sum += $unit_sum;
        }
        return $sum;
    }
}
