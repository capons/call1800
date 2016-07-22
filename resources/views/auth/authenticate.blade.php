@extends('layouts.app')

@section('title', 'login')

@section('sidebar')
@stop

@section('content')
    <div class="col-xs-12">
        <a class="btn btn-primary t-w" href="{{ url('/')}}">@lang('site/tollfreepage/site.tollbuy.mainpage')<span class="sr-only"></span></a>
    </div>
    <div class="col-xs-12">
        <div style="float: none;margin: 0 auto" class="col-xs-4">
            <form method="POST" action="{{ url('/auth/login')}}">
                {!! csrf_field() !!}

                <div>
                    @lang('site/authpage/site.login.email')
                    <input type="text" name="r_email" value="">
                </div>

                <div>
                    @lang('site/authpage/site.login.pass')
                    <input type="password" name="r_password" id="password">
                </div>

                <div>
                    <input type="checkbox" name="remember"> @lang('site/authpage/site.login.remember')
                </div>

                <div>
                    <button type="submit"> @lang('site/authpage/site.login.login')</button>
                </div>
            </form>
        </div>

    </div>


    <div class="row">
        <div style="float: none;margin: 0 auto" class="col-xs-6">
            <!-- Display Validation Errors -->
            @include('common.errors')

                    <!--Display User information -->
            @if(Session::has('user-info'))
                <div class="alert-box success">
                    <h2 style="text-align: center">{{ Session::get('user-info') }}</h2>

                </div>
            @endif
        </div>
    </div>

@stop