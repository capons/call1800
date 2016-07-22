@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-primary t-w" href="{{ url('/')}}">@lang('site/tollfreepage/site.tollbuy.mainpage')<span class="sr-only"></span></a>
            </div>
        </div>
        <p>@lang('site/tollfreepage/site.tollbuy.test')</p>
    </div>



@endsection
