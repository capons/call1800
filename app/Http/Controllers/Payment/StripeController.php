<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stripe\Stripe;


class StripeController extends Controller
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
    public function store(Request $request)
    {

        //ДОДЕЛАТЬ ПЛАТЕЖКУ
        
        //echo '<pre>';
        //print_r($request->all());
        //echo '</pre>';
        //die();
        //session()->forget('tf_buy');


        $token = $request->input('stripeToken');
        $price = $request->input('ctfn_price');
        $user_id = $request->input('c_user_id');
        \Stripe\Stripe::setApiKey(env('STRIPE_SK'));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $price,
                'currency' => 'usd',
                'source' => $token,
                //'customer' => $user_id,
                'metadata' => [
                    'product_name' => 'test'
                ]
            ]);
            echo '<pre>';
            print_r($charge->status);
            echo '<pre>';


        } catch (\Stripe\Error\Card $e) {
            return redirect()->route('toll/confirm')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        if($charge->status == 'succeeded'){
            echo 'ok save to DB need!';
        }

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
