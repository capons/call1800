@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')



    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Toll Free Number</strong></h2>

                        <div class="row">
                            <div class="col-sm-12">

                                <form  action="{{action('Tollfree\RegistertollController@store')}}" method="post" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <!-- Select Basic -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">@lang('site/tollfreepage/site.tollreg.regform.category')</label>

                                            <div class="col-md-8">
                                                <select name="category-name" id="category-group" class="form-control">
                                                    <option value="0" selected="selected"> Select a category...</option>
                                                    <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Vehicles -
                                                    </option>
                                                    <option value="Cars"> Cars</option>
                                                    <option value="Commercial vehicles"> Commercial vehicles</option>
                                                    <option value="Motorcycles"> Motorcycles</option>
                                                    <option value="Motorcycle Equipment"> Car &amp; Motorcycle
                                                        Equipment
                                                    </option>
                                                    <option value="Boats"> Boats</option>
                                                    <option value="Vehicles"> Other Vehicles</option>
                                                    <option value="House"
                                                            style="background-color:#E9E9E9;font-weight:bold;"
                                                            disabled="disabled"> - House and Children -
                                                    </option>
                                                    <option value="Appliances"> Appliances</option>
                                                    <option value="Inside"> Inside</option>
                                                    <option value="Games"> Games and Clothing</option>
                                                    <option value="Garden"> Garden</option>
                                                    <option value="Multimedia"
                                                            style="background-color:#E9E9E9;font-weight:bold;"
                                                            disabled="disabled"> - Multimedia -
                                                    </option>
                                                    <option value="Telephony"> Telephony</option>
                                                    <option value="Image"> Image and sound</option>
                                                    <option value="Computers"> Computers and Accessories</option>
                                                    <option value="Video"> Video games and consoles</option>
                                                    <option value="Real"
                                                            style="background-color:#E9E9E9;font-weight:bold;"
                                                            disabled="disabled"> - Real Estate -
                                                    </option>
                                                    <option value="Apartment"> Apartment</option>
                                                    <option value="Home"> Home</option>
                                                    <option value="Vacation"> Vacation Rentals</option>
                                                    <option value="Commercial"> Commercial offices and local</option>
                                                    <option value="Grounds"> Grounds</option>
                                                    <option value="Houseshares"> Houseshares</option>
                                                    <option value="Other real estate"> Other real estate</option>
                                                    <option value="Services"
                                                            style="background-color:#E9E9E9;font-weight:bold;"
                                                            disabled="disabled"> - Services -
                                                    </option>
                                                    <option value="Jobs"> Jobs</option>
                                                    <option value="Job application"> Job application</option>
                                                    <option value="Services"> Services</option>
                                                    <option value="Price"> Price</option>
                                                    <option value="Business"> Business and goodwill</option>
                                                    <option value="Professional"> Professional equipment</option>
                                                    <option value="dropoff"
                                                            style="background-color:#E9E9E9;font-weight:bold;"
                                                            disabled="disabled"> - Extra -
                                                    </option>
                                                    <option value="Other"> Other</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">@lang('site/tollfreepage/site.tollreg.regform.company')</label>

                                            <div class="col-md-8">
                                                <input id="Adtitle"  placeholder="Ad title" class="form-control input-md" name="company-name" value="company" required type="text">
                                                <span class="help-block">A great title needs at least 60 characters. </span>
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">@lang('site/tollfreepage/site.tollreg.regform.desc')</label>

                                            <div class="col-md-8">
                                                <textarea class="form-control" id="textarea" name="company-desc">Describe what makes your ad unique</textarea>
                                            </div>
                                        </div>

                                        <!--
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >@lang('site/tollfreepage/site.tollreg.regform.address')</label>
                                            <div class="col-md-8">
                                                <input type="text" name="address" class="form-control" value="some address" >
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">@lang('site/tollfreepage/site.tollreg.regform.city')</label>
                                            <div class="col-md-8">
                                                <input type="text" name="city" class="form-control" value="New York" >
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label  class="col-md-3 control-label">@lang('site/tollfreepage/site.tollreg.regform.state')</label>
                                            <div class="col-md-8">
                                                <input type="text" name="state" class="form-control" value="Texas" >
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">@lang('site/tollfreepage/site.tollreg.regform.country')</label>
                                            <div class="col-md-8">
                                                <input type="text" name="country" class="form-control" value="USA" >
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">@lang('site/tollfreepage/site.tollreg.regform.zip')</label>
                                            <div class="col-md-8">
                                                <input type="number" name="zip" class="form-control" value="43566" >
                                            </div>
                                        </div>
                                        -->

                                        <!-- Prepended text-->
                                        <!--
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Price">Website</label>
                                            <div class="col-md-8">
                                                <input id="Adtitle" name="Adtitle" placeholder="Phone number" class="form-control input-md" required="" type="text">
                                            </div>
                                        </div>
                                        -->

                                        <!-- Website-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Price">@lang('site/tollfreepage/site.tollreg.regform.web')</label>
                                            <div class="col-md-8">
                                                <input  name="web-number"  placeholder="Phone number" class="form-control input-md" required type="number">
                                            </div>
                                        </div>

                                        <!-- Toll free number-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Price">@lang('site/tollfreepage/site.tollreg.regform.number')</label>
                                            <div class="col-md-8">
                                                <input  name="toll-number"   placeholder="Phone number" class="form-control input-md" required type="number">
                                            </div>
                                        </div>


                                        <!-- terms -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Terms</label>

                                            <div class="col-md-8">
                                                <label class="checkbox-inline" for="checkboxes-0">
                                                    <input name="checkbox" id="checkboxes-0" value="Remember above contact information." type="checkbox" required>Remember above contact information. </label>
                                            </div>
                                        </div>

                                        <div class="row"> <!--display form error -->
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 al-center">

                                                    <!-- Display Validation Errors -->
                                                    @include('common.errors')
                                                            <!--Display User information -->
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Button  -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8">
                                                <!--
                                                <a href="posting-success.html" id="button1id" class="btn btn-success btn-lg">Submit</a>
                                                -->
                                                <button type="submit"  class="btn btn-success btn-lg">Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>

                        <div class="panel sidebar-panel">
                            <div class="panel-heading uppercase">
                                <small><strong>How to sell quickly?</strong></small>
                            </div>
                            <div class="panel-content">
                                <div class="panel-body text-left">
                                    <ul class="list-check">
                                        <li> Use a brief title and description of the item</li>
                                        <li> Make sure you post in the correct category</li>
                                        <li> Add nice photos to your ad</li>
                                        <li> Put a reasonable price</li>
                                        <li> Check the item before publish</li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--/.reg-sidebar-->


            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->








@endsection
