@extends('layouts.app')

@section('title', 'login')

@section('sidebar')
@stop

@section('content')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 login-box">
                    <div class="panel panel-default">
                        <div class="panel-intro text-center">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12"> <!--Display user error -->
                                <div  class="col-xs-6 al-center">
                                            <!--Display User information -->
                                    @if(Session::has('user-info'))
                                        <div class="alert-box success">
                                            <h2 style="text-align: center">{{ Session::get('user-info') }}</h2>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <form action="{{action('Auth\AuthController@postLogin')}}" method="post" role="form">

                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="sender-email" class="control-label">Username:</label>
                                    <div class="input-icon"><i class="icon-user fa"></i>
                                        <input id="sender-email" type="text" placeholder="Email" name="l_email" class="form-control email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user-pass" class="control-label">Password:</label>
                                    <div class="input-icon"><i class="icon-lock fa"></i>
                                        <input type="password" class="form-control" name="l_pass" placeholder="Password" id="user-pass">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-primary  btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <!--
                            <div class="checkbox pull-left">
                                <label> <input type="checkbox" value="1" name="remember" id="remember"> Keep me logged in</label>
                            </div>
                            -->
                            <p class="text-center pull-right"><a href="forgot-password.html"> Lost your password? </a></p>
                            <div style=" clear:both"></div>
                        </div>
                    </div>
                    <div class="login-box-btm text-center">
                        <p> Don't have an account? <br>
                            <a href="{{url('auth/register')}}"><strong>Sign Up !</strong> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

@stop