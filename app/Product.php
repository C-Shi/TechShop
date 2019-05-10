<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function format_price() {
        return money_format('$%i', $this->price / 100);
    }
}
