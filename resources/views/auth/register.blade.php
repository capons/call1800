@extends('layouts.app')

@section('title', 'login')

@section('sidebar')
@stop

@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2"><i class="icon-user-add"></i> Create your account, Its free </h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{action('Auth\AuthController@postRegister')}}" method="post" class="form-horizontal">
                                    <div class="row"> <!--display form error -->
                                        <div class="col-xs-12">
                                            <div class="col-xs-4 al-center">

                                                <!-- Display Validation Errors -->
                                                @include('common.errors')
                                                        <!--Display User information -->
                                            </div>
                                        </div>

                                    </div>
                                    <fieldset>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <!-- Text input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">First Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="f_name" placeholder="First Name" class="form-control input-md" value="Name" required type="text">
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Last Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="l_name" placeholder="Last Name" class="form-control input-md" value="Last Name" type="text">
                                            </div>
                                        </div>

                                        <!--Email -->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Email<sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>





                                        <!-- Country input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Country <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <!--
                                                <input name="u_country" placeholder="Country" class="form-control input-md" value="Some Country" type="text">
                                                -->

                                                <select name="u_country" class="form-control">
                                                    <option></option>
                                                    @if(isset($country))
                                                        @if(count($country) > 0)
                                                            @foreach($country as $key)
                                                                <option>{{$key}}</option>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </select>

                                            </div>
                                        </div>

                                        <!-- Post code input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Postal code <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="f_postcode" placeholder="Postal code" class="form-control input-md" value="" type="text">
                                            </div>
                                        </div>

                                        <!-- State input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">State <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="u_state" placeholder="State" class="form-control input-md" value="Some State" type="text">
                                            </div>
                                        </div>

                                        <!-- City input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">City <sup>*</sup></label>

                                            <div class="col-md-6">

                                                <input name="u_city" placeholder="City" class="form-control input-md" value="Some city" type="text">
                                                <!--
                                                <select name="u_city" class="form-control">
                                                    <option>City 1</option>
                                                    <option>City 2</option>
                                                    <option>City 3</option>
                                                    <option>City 4</option>
                                                    <option>City 5</option>
                                                </select>
                                                -->
                                            </div>
                                        </div>


                                        <!-- Address input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Address <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="u_address" placeholder="Address" class="form-control input-md" value="some user address"  type="text">
                                            </div>
                                        </div>

                                        <!-- Phone input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Phone Number <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="f_number" placeholder="Phone Number" class="form-control input-md" value="" type="text">
                                            </div>
                                        </div>


                                        <div class="form-group required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Password <sup>*</sup> </label>

                                            <div class="col-md-6">
                                                <input type="password" name="u_pass" class="form-control" id="inputPassword3" placeholder="Password">

                                                <p class="help-block">At least 5 characters <!--Example block-level help text here.--></p>
                                            </div>
                                        </div>

                                        <div class="form-group required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Confirm password <sup>*</sup> </label>

                                            <div class="col-md-6">
                                                <input type="password" name="u_pass_re" class="form-control" placeholder="Confirm Password">

                                                <p class="help-block">At least 5 characters <!--Example block-level help text here.--></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <!--
                                                <div class="termbox mb10">
                                                    <label class="checkbox-inline" for="checkboxes-1">
                                                        <input name="checkboxes" id="checkboxes-1" value="1" type="checkbox">I have read and agree to the <a href="terms-conditions.html">Terms& Conditions</a> </label>
                                                </div>
                                                <div style="clear:both"></div>
                                                -->
                                                <button class="btn btn-primary" type="submit">Register</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-4 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>
                        <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                            <h3><strong>Create and Manage Items</strong></h3>

                            <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                                Praesent tristique elit pharetra magna efficitur laoreet.</p>
                        </div>
                        <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                            <h3><strong>Create your Favorite ads list.</strong></h3>

                            <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                                Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->

@stop