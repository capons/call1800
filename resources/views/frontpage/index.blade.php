@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')
    <div class="container-fluid">

        <div class="row"> <!--error display block -->
            <div class="col-xs-12">
                <div class="col-xs-4 al-center">
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

        </div>


        <div id="search-m-c" class="col-xs-12">
            <div  class="col-lg-5 al-center">
                <div class="col-xs-12">
                    <p class="front-logo-t-c"><span>C</span><span>a</span><span>l</span><span>l</span><span>1800</span><span>.org</span></p>
                </div>
                <div class="col-xs-12">
                    <form method="POST" action="{{ url('/auth/login')}}">
                        {!! csrf_field() !!}


                        <div class="form-group has-success has-feedback">
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
                                <span class="input-group-addon"><button class="clear-bottom" type="submit"><span class="glyphicon glyphicon-earphone"></span></button></span>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-xs-12 f-call-block">
                    <div class="row">
                        <div style="background-color: #0a6ebd;border-right:1px solid white; " class="col-xs-4">
                            <p style="color:white;padding: 10px;margin: 0px;text-align: center">@lang('site/frontpage/site.content.company')</p>
                        </div>
                        <div style="background-color: #0a6ebd;border-right:1px solid white" class="col-xs-4">
                            <p style="color:white;padding: 10px;margin: 0px;text-align: center">@lang('site/frontpage/site.content.number')</p>
                        </div>
                        <div style="background-color: #0a6ebd;min-height: 40px" class="col-xs-4">

                        </div>
                    </div>
                    <div class="row">
                        <div style="background-color: rgba(231, 230, 233, 0.6);min-height: 40px;border-right: 1px solid white;border-bottom: 1px solid white" class="col-xs-4">

                        </div>
                        <div style="background-color: rgba(231, 230, 233, 0.6);min-height: 40px;border-right: 1px solid white;border-bottom: 1px solid white" class="col-xs-4">

                        </div>
                        <div style="background-color: rgba(231, 230, 233, 0.6);min-height: 40px;text-align: center;border-bottom: 1px solid white" class="col-xs-4">
                            <button style="margin-top: 3px;" class="btn btn-primary">@lang('site/frontpage/site.content.call')</button>
                        </div>
                    </div>
                    <div class="row">
                        <div style="background-color: rgba(231, 230, 233, 0.6);min-height: 40px;border-right: 1px solid white" class="col-xs-4">

                        </div>
                        <div style="background-color: rgba(231, 230, 233, 0.6);min-height: 40px;border-right: 1px solid white" class="col-xs-4">

                        </div>
                        <div style="background-color: rgba(231, 230, 233, 0.6);min-height: 40px;text-align: center" class="col-xs-4">
                            <button style="margin-top: 3px;" class="btn btn-primary">@lang('site/frontpage/site.content.call')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
