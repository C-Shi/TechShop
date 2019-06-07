<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Category;
use DB;

class AdminController extends Controller
{
    //

    public function index($user_id){
        $query = "";
        if(isset($_GET['page'])) {
            $query = $_GET['page'];
        }

        switch($query) {
            case 'user':
                break;
            case 'product':
                break;
            case 'order':
                break;
            case 'category':
                break;
            default:
                $categories = Category::select('categories.name', DB::Raw('COUNT(category_id) AS number'))->leftJoin('products', 'categories.id', '=', 'products.category_id')->groupBy('categories.name')->get();
                // $categories = DB::select(DB::raw("SELECT categories.name, COUNT(category_id) FROM products LEFT JOIN categories ON categories.id = products.category_id GROUP BY category_id"));
        }

        $orders = Order::all();
        return view('admin.index')->with([
            'query' => $query,
            'orders' => $orders,
            'categories' => $categories,
            ]);
    }
}
