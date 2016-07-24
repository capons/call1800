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

        <p>Register toll free number</p>

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

        <div class="row">
            <div class="col-xs-12">
                <div style="height: 650px" class="col-xs-4 al-center">
                    <form action="{{action('Tollfree\RegistertollController@store')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.company')</label>
                            <input type="text" class="form-control" name="company-name" value="company" required>
                        </div>
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.number')</label>
                            <input type="number" class="form-control" name="toll-number" value="18003445" required>
                        </div>
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.address')</label>
                            <input type="text" name="address" class="form-control" value="some address" >
                        </div>
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.city')</label>
                            <input type="text" name="city" class="form-control" value="New York" >
                        </div>
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.state')</label>
                            <input type="text" name="state" class="form-control" value="Texas" >
                        </div>
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.country')</label>
                            <input type="text" name="country" class="form-control" value="USA" >
                        </div>
                        <div class="form-group">
                            <label >@lang('site/tollfreepage/site.tollreg.regform.zip')</label>
                            <input type="number" name="zip" class="form-control" value="43566" >
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
