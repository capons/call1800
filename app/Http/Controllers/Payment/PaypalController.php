<?php

namespace App\Http\Controllers\Payment;

use App\Models\DB\Buytollfree;
use App\Models\DB\Payment;
use App\Models\DB\Prefix;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Netshell\Paypal\Facades\Paypal;
use Illuminate\Routing\Route;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;


class PaypalController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(

            config('services.paypal.client_id'),

            config('services.paypal.secret'));


        $this->_apiContext->setConfig(array(

            'mode' => 'sandbox',

            'service.EndPoint' => 'https://api.sandbox.paypal.com',

            'http.ConnectionTimeOut' => 40,

            'log.LogEnabled' => true,

            'log.FileName' => storage_path('logs/paypal.log'),

            'log.LogLevel' => 'FINE'

        ));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        //
    }
    */
    public function getCheckout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ctfn_type' => 'integer',
            'ctfn_pay_type' => 'integer',
            'ctfn_prefix' => 'integer',
            'ctfn_min' => 'integer',
            'ctfn_month_count' => 'integer',
            'ctfn_price' => 'integer',
            'c_user_id' => 'integer',
        ]);

        if ($validator->fails()) {

            //Log some data to check error

            return redirect('toll/confirm')
                ->withErrors($validator)
                ->withInput();
        }
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        */
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');  //Или все это поместить в метод  getDone и в нем если success то сохранять в базу данных
        DB::beginTransaction();      //update table request and promise by Transaction
        try {
            $buyrollfree = Buytollfree::create(['user_id' => $request->input('c_user_id'), 'plan_type' => $request->input('ctfn_type'), 'month_count' => $request->input('ctfn_month_count'), 'minute' => $request->input('ctfn_min')]);

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
            $payment = Payment::create(['buytollfree_id' => $buyrollfree->id, 'payment_status' => 'not paid', 'payment_type' => 'paypal', 'price' => $request->input('ctfn_price')]);

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
        
        


       // echo $buyrollfree->id;
       // die();







        $payer = PayPal::Payer();

        $payer->setPaymentMethod('paypal');


        $amount = PayPal:: Amount();

        $amount->setCurrency('USD');

        $amount->setTotal($request->input('ctfn_price'));


        $transaction = PayPal::Transaction();

        $transaction->setAmount($amount);

        $transaction->setDescription('Buy Premium '.$request->input('ctfn_type').' Plan on '.$request->input('ctfn_price'));


        $redirectUrls = PayPal:: RedirectUrls();



        //$redirectUrls->setReturnUrl(route('getdone'));
        //$redirectUrls->setReturnUrl('http://localhost/bogdan/call1800/en/getdone');
        $locali = new LaravelLocalization(); //localization instance class
        $redirectUrls->setReturnUrl(url($locali->setLocale().'/getdone/'.$buyrollfree->id)); //redirect to payment success url with localization => $buyrollfree->id last inser id send to method getDone

        //$redirectUrls->setCancelUrl(route('getcancel'));
        $redirectUrls->setCancelUrl(url($locali->setLocale().'/getcancel')); //redirect to cancel payment with localization


        $payment = PayPal::Payment();

        $payment->setIntent('sale');

        $payment->setPayer($payer);

        $payment->setRedirectUrls($redirectUrls);

        $payment->setTransactions(array($transaction));


        $response = $payment->create($this->_apiContext);

        $redirectUrl = $response->links[1]->href;




        return redirect()->to( $redirectUrl );

        //session()->forget('tf_buy');
    }

    /**
     * @param Request $request
     */
    public function getDone(Request $request,$buy_id) //$buy_id buttollfree table last insert id

    {


        $id = $request->get('paymentId');

        $token = $request->get('token');

        $payer_id = $request->get('PayerID');


        $payment = PayPal::getById($id, $this->_apiContext);


        $paymentExecution = PayPal::PaymentExecution();


        $paymentExecution->setPayerId($payer_id);

        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        //print_r($executePayment->state);



        //echo '<br>';
        if ($executePayment->state == 'approved'){

           $payment_success = Payment::where('buytollfree_id', $buy_id)
                //->where('destination', 'San Diego')
                ->update(['payment_status' => 'success']);

            if (!$payment_success)
            {
                //save to log -> Payment success but not update in database
            }
            Session::flash('user-info', Lang::get('site/payment/site.paypal.success')); //send message to user via flash data
            session()->forget('tf_buy'); //destroy session -> send buytollfree data to buy
            return redirect('/success');
        } else {
            //if payment false
            //save to log
            echo 'проплата прошла не успешно';
        }

    }

    /**
     * @return mixed
     */
    public function getCancel()

    {

        return redirect('toll/confirm');


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
