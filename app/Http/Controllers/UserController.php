<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use App\Mail\ContactEmail;
use App\Product;
use App\Order;
use App\OrderLine;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
        echo "helloe";
        return "view";
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
        $page = 'Setting';
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        switch ($page) {
            case 'Order':
                # code...
                $content = $this->get_user_order_history($id);
                break;

            case 'Cart':
                $content = $this->get_user_pending_order($id);
                break;

            case 'Customer Service':
                $content = Null;
                break;

            default:
                # code...
                $content = $this->get_user_account();
                break;
        }
        return view('user.account')->with(['page' => $page, 'content' => $content]);
    }

    protected function get_user_account() {
        return \Auth::user();
    }

    protected function get_user_order_history($id){
        return Order::where([['user_id', $id], ['status', '!=','pending']])->get();
    }

    protected function get_user_pending_order($id){
        return Order::firstOrCreate(
            ['user_id' => \Auth::user()->id, 'status' => 'pending'],
            ['order_number' => (string) Str::uuid()]
        );
    }

    public function contact(Request $request, $id)
    {
        $customer = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to($request->email)->send(new ContactEmail($customer));

        return redirect()->back()->with('success', 'Your Request Has Been Submitted');
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
        // should add validation to it

        $user = User::find($id);

        $user->name = $request['name'];
        $user->address = $request['address'];
        $user->city = $request['city'];
        $user->province = $request['province'];
        $user->zip = $request['zip'];
        $user->save();

        return $request;
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
