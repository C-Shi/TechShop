<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class AdminController extends Controller
{
    //

    public function index($user_id){
        $query = "";
        if(isset($_GET['page'])) {
            $query = $_GET['page'];
        }

        $orders = Order::all();
        return view('admin.index')->with(['query' => $query, 'orders' => $orders]);
    }
}
