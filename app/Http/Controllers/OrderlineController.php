<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\OrderLine;
use App\Order;

class OrderlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id, $item_id, Request $request)
    {
        //
        $quantity = $request->quantity;
        $cart = Order::where([
            ['user_id', '=', $user_id],
            ['status', '=', 'pending']
            ])->first();

        if(!$cart) {
            $cart = new Order;
            $cart->user_id = $user_id;
            $cart->order_number = (string) Str::uuid();
            $cart->status = 'pending';
            $cart->save();
            $cart = Order::where([
                ['user_id', '=', $user_id],
                ['status', '=', 'pending']
                ])->first();
        }

        $order_id = $cart->id;

        $orderline = Orderline::where([['order_id', '=', $order_id], ['product_id', '=', $item_id]])->first();
        if (!$orderline) {
            $orderline = new Orderline;
            $orderline->product_id = $item_id;
            $orderline->order_id = $order_id;
            $orderline->quantity = $quantity;
            $orderline->save();
        } else {
            $orderline->quantity += $quantity;
            $orderline->save();
        }

        return redirect('/users/' . $user_id . '/cart')->with('success', 'Item Added To Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $order_id, $product_id)
    {
        //
        $order_line = OrderLine::where([['order_id', $order_id], ['product_id', $product_id]]);
        $order_line->delete();

        return redirect('/users/'. $user_id .'/cart');
    }
}
