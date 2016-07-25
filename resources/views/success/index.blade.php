@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <div class="inner-box category-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success pgray  alert-lg" role="alert">
                                    <h2 class="no-margin no-padding">
                                        @if(Session::has('user-info'))
                                            <div class="alert-box success">
                                                <h2 style="text-align: center"><span>&#10004;</span>{{ Session::get('user-info') }}</h2>
                                            </div>
                                        @endif
                                        </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.page-content -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
    </div>
    <!-- /.main-container -->



@endsection
