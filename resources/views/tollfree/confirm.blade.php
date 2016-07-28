@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-primary t-w" href="{{ url('/')}}">@lang('site/tollfreepage/site.tollbuy.mainpage')<span class="sr-only"></span></a>
                    <div style="margin-top: 50px" class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 style="text-align: center">Paiment Page</h1>
                        </div>
                        <?php
                        if(isset($buy_tf_data)){
                            print_r($buy_tf_data);
                        ?>
                            <div class="col-xs-6 al-center">
                                <div class="col-xs-12">
                                    <div class="col-xs-8 no-padding">
                                        <h4 style="text-align: left">First Month Toll free number Fee </h4>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <h4 style="text-align: left"><span>&nbsp;&nbsp;</span>= 1 USD</h4>
                                    </div>
                                </div>
                                <div style="margin-top: 30px;border-bottom: 3px solid cornflowerblue;" class="col-xs-12">
                                    <div class="col-xs-8 no-padding">
                                        <h4 style="text-align: left">Monthly Fee</h4>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <h4 style="text-align: left"><span>&nbsp;&nbsp;</span>= 100 USD</h4>
                                    </div>
                                </div>
                                <div style="margin-top: 30px;" class="col-xs-12">
                                    <div class="col-xs-8 no-padding">
                                        <h4 style="text-align: left">Total</h4>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <h4 style="text-align: left"><span>&nbsp;&nbsp;</span>= 101 USD</h4>
                                    </div>
                                </div>
                                <div style="margin-top: 30px" class="col-xs-12">
                                    <div class="col-xs-6 no-padding">

                                        <form style="text-align: center" action="{{action('TollFree\ConfirmController@store')}}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="ctfn_type" value="<?php echo $buy_tf_data['tfn_type']; ?>"> <!--value = 2 = Fee per month -->
                                            <input type="hidden" name="ctfn_pay_type" value="1"> <!--1 = PayPal payment -->
                                            <input type="hidden" name="ctfn_prefix" value="<?php echo $buy_tf_data['tfn_prefix']; ?>">
                                            <input type="hidden" name="ctfn_min" value="<?php echo $buy_tf_data['tfn_min']; ?>">
                                            <input type="hidden" name="ctfn_month_count" value="<?php echo $buy_tf_data['tfn_month_count']; ?>">
                                            <input type="hidden" name="ctfn_price" value="<?php echo $buy_tf_data['tfn_price']; ?>">
                                            <input type="hidden" name="c_user_id" value="<?php echo Auth::user()->id; ?>">
                                            <button type="submit" class="btn btn-primary">Pay with PayPal</button>
                                        </form>
                                    </div>
                                    <div class="col-xs-6 no-padding">
                                        <form style="text-align: center" action="{{action('TollFree\ConfirmController@store')}}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="ctfn_type" value="<?php echo $buy_tf_data['tfn_type']; ?>"> <!--value = 2 = Fee per month -->
                                            <input type="hidden" name="ctfn_pay_type" value="2"> <!--2 = Stripe payment -->
                                            <input type="hidden" name="ctfn_prefix" value="<?php echo $buy_tf_data['tfn_prefix']; ?>">
                                            <input type="hidden" name="ctfn_min" value="<?php echo $buy_tf_data['tfn_min']; ?>">
                                            <input type="hidden" name="ctfn_month_count" value="<?php echo $buy_tf_data['tfn_month_count']; ?>">
                                            <input type="hidden" name="ctfn_price" value="<?php echo $buy_tf_data['tfn_price']; ?>">
                                            <input type="hidden" name="c_user_id" value="<?php echo Auth::user()->id; ?>">
                                            <button type="submit" class="btn btn-primary">Pay with PayPal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop