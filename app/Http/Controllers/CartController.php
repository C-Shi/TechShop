<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id){
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

        $order_number = $cart->order_number;

        return view('user.cart')->with('cart', $cart);
    }

     /**
     * Creating Charge
     *
     * @return \Illuminate\Http\Response
     */

    public function charge(Request $request, $user_id){
        \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => 999,
            'currency' => 'cad',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        return $request;
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
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
