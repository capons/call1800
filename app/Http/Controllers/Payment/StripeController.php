<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Illuminate\Routing\Route;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;
use App\Models\DB\Buytollfree;
use App\Models\DB\Payment;
use App\Models\DB\Prefix;
use Illuminate\Support\Facades\DB;


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
        \Stripe\Stripe::setApiKey(config('services.stripe.secret')); //env('STRIPE_SK'

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

        } catch (\Stripe\Error\Card $e) {
            return redirect()->route('toll/confirm')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        if($charge->status == 'succeeded'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');  //Или все это поместить в метод  getDone и в нем если success то сохранять в базу данных
            DB::beginTransaction();      //update table request and promise by Transaction
            try {
                $to_change = '+ '.($request->input('ctfn_month_count')*30).' day';
                $date = date("Y-m-d H:i:s");
                $date = strtotime($date);
                $date = strtotime($to_change, $date); //date in future when auction is expired
                $buyrollfree = Buytollfree::create(['user_id' => $request->input('c_user_id'), 'plan_type' => $request->input('ctfn_type'), 'month_count' => $request->input('ctfn_month_count'), 'expires' => date("Y-m-d H:i:s",$date), 'minute' => $request->input('ctfn_min')]);

            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect::to('promise/buy')
                    ->withErrors( $e->getErrors() )
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            try {
                $prefix = Prefix::create(['buytollfree_id' => $buyrollfree->id, 'prefix' => $request->input('ctfn_prefix')]);

            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect::to('promise/buy')
                    ->withErrors( $e->getErrors() )
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            try {
                $payment = Payment::create(['buytollfree_id' => $buyrollfree->id, 'payment_status' => 'success', 'payment_type' => 'strip', 'price' => $request->input('ctfn_price')]);

            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect::to('promise/buy')
                    ->withErrors( $e->getErrors() )
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            DB::commit();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            Session::flash('user-info', Lang::get('site/payment/site.paypal.success')); //send message to user via flash data
            session()->forget('tf_buy'); //destroy session -> send buytollfree data to buy
            return redirect('/success');



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
