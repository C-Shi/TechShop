<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    //
    protected $table = 'products';

    public function format_price() {
        return money_format('$%i', $this->price / 100);
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
