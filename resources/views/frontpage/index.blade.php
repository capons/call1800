@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <p>@lang('site/site.home')</p>
    </div>



@endsection
