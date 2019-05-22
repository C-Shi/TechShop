<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Order;
use App\User;
use Mail;
use App\Mail\OrderCompleted;
use Exception;

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
        $order_number = $request['order_number'];

        $order = Order::where('order_number', '=', $order_number)->first();

        if(!$order) {
            return redirect()->back()->with('error', 'Unable to find order');
        }

        if(!$order->status != 'pending') {
            return redirect()->back()->with('error', 'Invalid Order Status');
        }


        if($order->user_id != $user_id) {
            return redirect()->back()->with('error', 'This is not your order');
        }

        try {
            foreach($order->order_line as $order_line) {
                if($order_line->product->stock - $order_line->quantity < 0) {
                    throw new Exception('Insufficient Stock Quantity');
                }
            }
        } catch(Exception $e) {
            $err = $e->getMessage();
            return redirect()->back()->with('error', $err);
        }

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $order->sum(),
                'currency' => 'cad',
                'description' => 'Example charge',
                'source' => $token,
            ]);
            // Use Stripe's library to make requests...
          } catch(\Stripe\Error\Card $e) {
            // Since it's a decline, \Stripe\Error\Card will be caught
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
          } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            return redirect()->back()->with('error', 'Unable to process your payment due to server error');
          } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            return redirect()->back()->with('error', 'Unable to process your payment due to server error');
          } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            return redirect()->back()->with('error', 'Unable to process your payment due to server error');
          } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            return redirect()->back()->with('error', 'Unable to process your payment due to server error');
          } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            return redirect()->back()->with('error', 'Unable to process your payment due to server error');
            // yourself an email
          } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            return redirect()->back()->with('error', 'Unable to process your payment due to server error');
          }

        // success redirect
        $order->status = 'paid';
        $order->save();

        foreach($order->order_line as $order_line) {
            $order_line->product->stock -= $order_line->quantity;
            $order_line->product->save();
        }

        $recipient = User::find($user_id);

        Mail::to($recipient->email)->send(new OrderCompleted($order, $recipient));
        return redirect('/users/' . $user_id . '?page=Order')->with('success', 'Your Payment Will Be Processed');
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
