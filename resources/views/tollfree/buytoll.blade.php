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
                        <div class="col-xs-12"> <!-- select Toll Free Number Prefix-->
                            <div class="col-xs-6 al-center">
                                <div class="row"> <!--display form error -->
                                    <div class="col-xs-12">
                                        <div class="col-xs-8 al-center">
                                            <!-- Display Validation Errors -->
                                            @include('common.errors')
                                                    <!--Display User information -->
                                        </div>
                                    </div>

                                </div>
                                <label style="margin-top: 10px" class="col-md-6 control-label" for="selectbasic">Select Number Prefix</label>

                                <div class="col-md-6">
                                    <select id="tollfree-prefix" name="s_tf_number"  class="form-control">
                                        <option value="">Select Toll Free Number</option>
                                        <option value="1800">1800</option>
                                        <option value="1888">1888</option>
                                        <option value="1866">1866</option>
                                        <option value="1877">1877</option>
                                        <option value="1855">1855</option>
                                        <option value="1844">1844</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- ./select Toll Free Number Prefix-->

                        <div style="margin-top: 50px" class="col-xs-12"> <!-- Fee per minute -->
                            <div class="col-xs-8 al-center">
                                <table class="table">
                                    <tr>
                                        <th style="background-color: cornflowerblue;border-right: 1px solid aliceblue;" class="table-center">
                                            Plan
                                        </th>
                                        <th style="background-color: cornflowerblue;border-right: 1px solid aliceblue;" class="table-center">
                                            Monthly Fee
                                        </th>
                                        <th style="background-color: cornflowerblue;" class="table-center">
                                            Per Minute Fee
                                        </th>
                                        <th class="no-border">

                                        </th>

                                    </tr>
                                    <tr>
                                        <td class="table-center">
                                            Per minute Plan
                                        </td>
                                        <td class="table-center">
                                            1
                                        </td>
                                        <td class="table-center">
                                            0.015 usd
                                        </td>
                                        <td class="no-border">
                                            <form action="{{action('Tollfree\BuytollController@store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="tfn_type" value="2"> <!--value = 2 = Fee per minute -->
                                                <input type="hidden" name="tfn_prefix" value="">
                                                <input type="hidden" name="tfn_min" value="">
                                                <input type="hidden" name="tfn_month_count" value="1">
                                                <input type="hidden" name="tfn_price" value="0.015">
                                                <input type="hidden" name="user_id" value="<?php echo Auth::user()->id; ?>">
                                                <button type="submit" class="btn btn-primary">Buy</button>
                                            </form>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>  <!-- ./Fee per minut-->

                        <div style="margin-top: 50px" class="col-xs-12"> <!-- Fee per month -->
                            <div class="col-xs-8 al-center">
                                <table class="table">
                                    <tr>
                                        <th style="background-color: cornflowerblue;border-right: 1px solid aliceblue;" class="table-center">
                                            Plan
                                        </th>
                                        <th style="background-color: cornflowerblue;border-right: 1px solid aliceblue;" class="table-center">
                                            Monthly Fee
                                        </th>
                                        <th style="background-color: cornflowerblue;" class="table-center">
                                            Per Month Fee
                                        </th>
                                        <th class="no-border">

                                        </th>

                                    </tr>
                                    <tr>
                                        <td class="table-center">
                                            1000 Min
                                        </td>
                                        <td class="table-center">
                                            1
                                        </td>
                                        <td class="table-center">
                                            100 usd
                                        </td>
                                        <td class="no-border">
                                            <form action="{{action('Tollfree\BuytollController@store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="tfn_type" value="1"> <!--value = 1 = Fee per month -->
                                                <input type="hidden" name="tfn_prefix" value="">
                                                <input type="hidden" name="tfn_min" value="1000">
                                                <input type="hidden" name="tfn_month_count" value="1">
                                                <input type="hidden" name="tfn_price" value="100">
                                                <input type="hidden" name="user_id" value="<?php echo Auth::user()->id; ?>">
                                                <button type="submit" class="btn btn-primary">Buy</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-center">
                                            2000 Min
                                        </td>
                                        <td class="table-center">
                                            1
                                        </td>
                                        <td class="table-center">
                                            200 usd
                                        </td>
                                        <td class="no-border">
                                            <form action="{{action('Tollfree\BuytollController@store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="tfn_type" value="1">
                                                <input type="hidden" name="tfn_prefix" value="">
                                                <input type="hidden" name="tfn_min" value="2000">
                                                <input type="hidden" name="tfn_month_count" value="1">
                                                <input type="hidden" name="tfn_price" value="200">
                                                <input type="hidden" name="user_id" value="<?php echo Auth::user()->id; ?>">
                                                <button type="submit" class="btn btn-primary">Buy</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-center">
                                            5000 Min
                                        </td>
                                        <td class="table-center">
                                            1
                                        </td>
                                        <td class="table-center">
                                            500 usd
                                        </td>
                                        <td class="no-border">
                                            <form action="{{action('Tollfree\BuytollController@store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="tfn_type" value="1">
                                                <input type="hidden" name="tfn_prefix" value="">
                                                <input type="hidden" name="tfn_min" value="5000">
                                                <input type="hidden" name="tfn_month_count" value="1">
                                                <input type="hidden" name="tfn_price" value="500">
                                                <input type="hidden" name="user_id" value="<?php echo Auth::user()->id; ?>">
                                                <button type="submit" class="btn btn-primary">Buy</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-center">
                                            10000 Min
                                        </td>
                                        <td class="table-center">
                                            1
                                        </td>
                                        <td class="table-center">
                                            1000 usd
                                        </td>
                                        <td class="no-border">
                                            <form action="{{action('Tollfree\BuytollController@store')}}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="tfn_type" value="1">
                                                <input type="hidden" name="tfn_prefix" value="">
                                                <input type="hidden" name="tfn_min" value="10000">
                                                <input type="hidden" name="tfn_month_count" value="1">
                                                <input type="hidden" name="tfn_price" value="1000">
                                                <input type="hidden" name="user_id" value="<?php echo Auth::user()->id; ?>">
                                                <button type="submit" class="btn btn-primary">Buy</button>
                                            </form>
                                        </td>

                                    </tr>


                                </table>
                            </div>
                        </div>  <!-- ./Fee per month-->




                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
