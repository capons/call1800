@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')
        <!-- PARSLEY  for Strip form validate-->
        <script>
            window.ParsleyConfig = {
                errorsWrapper: '<div></div>',
                errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
                errorClass: 'has-error',
                successClass: 'has-success'
            };
        </script>
        <script src="http://parsleyjs.org/dist/parsley.js"></script>



<!-- Inlude Stripe.js -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('<?php echo config('services.stripe.key'); ?>');  //stripe key from config/services.php
</script>




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
                            //print_r($buy_tf_data);
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
                                        <h4 style="text-align: left"><span>&nbsp;&nbsp;</span>= <?php echo $buy_tf_data['tfn_price']; ?> USD</h4>
                                    </div>
                                </div>
                                <div style="margin-top: 30px;" class="col-xs-12">
                                    <div class="col-xs-8 no-padding">
                                        <h4 style="text-align: left">Total</h4>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <h4 style="text-align: left"><span>&nbsp;&nbsp;</span>= <?php echo $buy_tf_data['tfn_price'] + 1; ?> USD</h4>
                                    </div>
                                </div>
                                <div style="margin-top: 30px" class="col-xs-12">
                                    <div class="col-xs-6 no-padding">

                                        <form style="text-align: center" action="{{action('Payment\PaypalController@getCheckout')}}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="ctfn_type" value="<?php echo $buy_tf_data['tfn_type']; ?>"> <!--value = 2 = Fee per month -->
                                            <input type="hidden" name="ctfn_pay_type" value="1"> <!--1 = PayPal payment -->
                                            <input type="hidden" name="ctfn_prefix" value="<?php echo $buy_tf_data['tfn_prefix']; ?>">
                                            <input type="hidden" name="ctfn_min" value="<?php echo $buy_tf_data['tfn_min']; ?>">
                                            <input type="hidden" name="ctfn_month_count" value="<?php echo $buy_tf_data['tfn_month_count']; ?>">
                                            <input type="hidden" name="ctfn_price" value="<?php echo $buy_tf_data['tfn_price']; ?>">
                                            <input type="hidden" name="c_user_id" value="<?php echo Auth::user()->id; ?>">
                                            <button type="submit" class="btn btn-primary payment_b">Pay with PayPal</button>
                                        </form>
                                    </div>
                                    <div class="col-xs-6 no-padding">
                                        <!--
                                        <form style="text-align: center" action="" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="ctfn_type" value="<?php// echo $buy_tf_data['tfn_type']; ?>"> <!--value = 2 = Fee per month -->
                                        <!--
                                        <input type="hidden" name="ctfn_pay_type" value="2"> <!--2 = Stripe payment -->
                                        <!--
                                        <input type="hidden" name="ctfn_prefix" value="<?php// echo $buy_tf_data['tfn_prefix']; ?>">
                                            <input type="hidden" name="ctfn_min" value="<?php// echo $buy_tf_data['tfn_min']; ?>">
                                            <input type="hidden" name="ctfn_month_count" value="<?php// echo $buy_tf_data['tfn_month_count']; ?>">
                                            <input type="hidden" name="ctfn_price" value="<?php// echo $buy_tf_data['tfn_price']; ?>">
                                            <input type="hidden" name="c_user_id" value="<?php// echo Auth::user()->id; ?>">
                                            <button type="button" class="btn btn-primary payment_b">Pay with Stripe</button>
                                        </form>
                                        -->

                                        <button id="smsd" type="button" class="btn btn-primary payment_b">Pay with Stripe</button>
                                    </div>
                                </div>
                            </div>


                        <div id="stripe_f" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="payment-form" data-parsley-validate="data-parsley-validate" action="{{action('Payment\StripeController@store')}}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="ctfn_type" value="<?php echo $buy_tf_data['tfn_type']; ?>"> <!--value = 2 = Fee per month -->
                                            <input type="hidden" name="ctfn_pay_type" value="2"> <!--2 = Stripe payment -->
                                            <input type="hidden" name="ctfn_prefix" value="<?php echo $buy_tf_data['tfn_prefix']; ?>">
                                            <input type="hidden" name="ctfn_min" value="<?php echo $buy_tf_data['tfn_min']; ?>">
                                            <input type="hidden" name="ctfn_month_count" value="<?php echo $buy_tf_data['tfn_month_count']; ?>">
                                            <input type="hidden" name="ctfn_price" value="<?php echo $buy_tf_data['tfn_price']; ?>">
                                            <input type="hidden" name="c_user_id" value="<?php echo Auth::user()->id; ?>">

                                            <div class="form-group" id="cc-group">
                                                <label >Credit card number</label>
                                                <input type="text" class="form-control" data-stripe="number" data-parsley-type="number" maxlength="16" data-parsley-trigger="change focusout" data-parsley-class-handler="#cc-group"  required>
                                            </div>

                                            <div class="form-group" id="ccv-group">
                                                <label>Card Validation Code (3 or 4 digit number)</label>
                                                <input type="text" class="form-control" data-stripe="cvc" data-parsley-type="number" data-parsley-trigger="change focusout" maxlength="4" data-parsley-class-handler="#ccv-group">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" id="exp-m-group">
                                                        <label>Ex. Month</label>
                                                        <select required data-stripe="exp-month" class="form-control">
                                                            <option></option>
                                                            <?php
                                                            for($i=1; $i<=12; $i++) {
                                                            ?>
                                                                <option><?php echo $i ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" id="exp-y-group">
                                                        <label>Ex. Year</label>
                                                        <select required data-stripe="exp-year" class="form-control">
                                                            <option></option>
                                                            <?php
                                                            for($i=date('Y'); $i<=date('Y') + 10; $i++) {
                                                            ?>
                                                                <option><?php echo $i ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" id="submitBtn" class="btn btn-primary btn-order" value="Buy"  required>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <!--
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        -->
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('common.errors')
@stop