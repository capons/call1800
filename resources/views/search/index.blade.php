@extends('layouts.app')

@section('title', 'login')

@section('sidebar')
@stop

@section('content')

    <div class="search-row-wrapper">
        <div class="container ">
            <form action="{{action('Search\SearchController@filter')}}"  method="POST">
                <div class="row"> <!--display form error -->
                    <div class="col-xs-12">
                        <div class="col-xs-12 al-center">

                            <!-- Display Validation Errors -->
                            @include('common.errors')
                                    <!--Display User information -->
                        </div>
                    </div>

                </div>
                {!! csrf_field() !!}
                <div class="col-sm-3">
                    <input class="form-control keyword" name="sc_name" type="text" placeholder="Company Name">
                </div>
                <div class="col-sm-3">
                    <select class="form-control selecter" name="sc_category" id="search-category">
                        <option selected="selected" value="">All Categories</option>
                        <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled">
                            - Vehicles -
                        </option>
                        <option value="Cars"> Cars</option>
                        <option value="Commercial vehicles"> Commercial vehicles</option>
                        <option value="Motorcycles"> Motorcycles</option>
                        <option value="Motorcycle Equipment"> Car &amp; Motorcycle Equipment</option>
                        <option value="Boats"> Boats</option>
                        <option value="Vehicles"> Other Vehicles</option>
                        <option value="House" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> -
                            House and Children -
                        </option>
                        <option value="Appliances"> Appliances</option>
                        <option value="Inside"> Inside</option>
                        <option value="Games"> Games and Clothing</option>
                        <option value="Garden"> Garden</option>
                        <option value="Multimedia" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled"> - Multimedia -
                        </option>
                        <option value="Telephony"> Telephony</option>
                        <option value="Image"> Image and sound</option>
                        <option value="Computers"> Computers and Accessories</option>
                        <option value="Video"> Video games and consoles</option>
                        <option value="Real" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> -
                            Real Estate -
                        </option>
                        <option value="Apartment"> Apartment</option>
                        <option value="Home"> Home</option>
                        <option value="Vacation"> Vacation Rentals</option>
                        <option value="Commercial"> Commercial offices and local</option>
                        <option value="Grounds"> Grounds</option>
                        <option value="Houseshares"> Houseshares</option>
                        <option value="Other real estate"> Other real estate</option>
                        <option value="Services" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled">
                            - Services -
                        </option>
                        <option value="Jobs"> Jobs</option>
                        <option value="Job application"> Job application</option>
                        <option value="Services"> Services</option>
                        <option value="Price"> Price</option>
                        <option value="Business"> Business and goodwill</option>
                        <option value="Professional"> Professional equipment</option>
                        <option value="dropoff" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled">
                            - Extra -
                        </option>
                        <option value="Other"> Other</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input class="form-control keyword" name="sc_number" type="text" placeholder="Toll Free Number">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-block btn-primary  "><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="categories-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
                                <ul class=" list-unstyled">
                                    <li><a href="#"><span
                                                    class="title">Electronics</span><span class="count">&nbsp;8626</span></a>
                                    </li>
                                    <li><a href="#"><span class="title">Automobiles </span><span
                                                    class="count">&nbsp;123</span></a></li>
                                    <li><a href="#"><span
                                                    class="title">Property </span><span class="count">&nbsp;742</span></a></li>
                                    <li><a href="#"><span
                                                    class="title">Services </span><span class="count">&nbsp;8525</span></a></li>
                                    <li><a href="#"><span
                                                    class="title">For Sale </span><span class="count">&nbsp;357</span></a></li>
                                    <li><a href="#"><span
                                                    class="title">Learning </span><span class="count">&nbsp;3576</span></a></li>
                                    <li><a href="#"><span class="title">Jobs </span><span
                                                    class="count">&nbsp;453</span></a></li>
                                    <li><a href="#"><span
                                                    class="title">Cars & Vehicles</span><span class="count">&nbsp;801</span></a>
                                    </li>
                                    <li><a href="#"><span class="title">Other</span><span
                                                    class="count">&nbsp;9803</span></a></li>
                                </ul>
                            </div>
                            <!--/.categories-list-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="#"> Atlanta </a></li>
                                    <li><a href="#"> Wichita </a></li>
                                    <li><a href="#"> Anchorage </a></li>
                                    <li><a href="#"> Dallas </a></li>
                                    <li><a href="#">New York </a></li>
                                    <li><a href="#"> Santa Ana/Anaheim </a></li>
                                    <li><a href="#"> Miami </a></li>
                                    <li><a href="#"> Virginia Beach </a></li>
                                    <li><a href="#"> San Diego </a></li>
                                    <li><a href="#"> Boston </a></li>
                                    <li><a href="#"> Houston </a></li>
                                    <li><a href="#">Salt Lake City </a></li>
                                    <li><a href="#"> Other Locations </a></li>
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-3 no-padding">
                                        <button class="btn btn-default pull-right btn-block-xs" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="#"><strong>Toll Free Number</strong> <span
                                                    class="count">228,705</span></a></li>
                                    <li><a href="#">Business <span
                                                    class="count">28,705</span></a></li>
                                    <li><a href="#">Personal <span
                                                    class="count">18,705</span></a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="#">New <span class="count">228,705</span></a>
                                    </li>
                                    <li><a href="#">Used <span class="count">28,705</span></a>
                                    </li>
                                    <li><a href="#">None </a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div style="clear:both"></div>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-sm-9 page-content col-thin-left">
                    <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <!-- 3 Окна
                            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                                <li class="active"><a href="ajax/1.html" data-url="ajax/1.html" role="tab"
                                                      data-toggle="tab">All Ads <span class="badge">228,705</span></a>
                                </li>
                                <li><a href="ajax/2.html" data-url="ajax/2.html" role="tab" data-toggle="tab">Business
                                        <span class="badge">22,805</span></a></li>
                                <li><a href="ajax/3.html" data-url="ajax/3.html" role="tab" data-toggle="tab">Personal
                                        <span class="badge">18,705</span></a></li>
                            </ul
                            -->



                            <div class="tab-filter">
                                <select class="selectpicker" data-style="btn-select" data-width="auto">
                                    <option>Short by</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"><a href="#" class="current"> <span>Toll Free Number</span></a> in
                                    New York <a href="#selectRegion" id="dropdownMenu1" data-toggle="modal"> <span class="caret"></span> </a></div>
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                        class="list-view active"><i class="  icon-th"></i></span> <span
                                        class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                        class="grid-view "><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->


                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-lg-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class=""><i class="  icon-th-list"></i>Filters</a>
                                </li>
                                <li>


                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i> Short
                                            by </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="" rel="nofollow">Relevance</a></li>
                                            <li><a href="" rel="nofollow">Date</a></li>
                                            <li><a href="" rel="nofollow">Company</a></li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->

                        <div class="adds-wrapper">
                            <div class="tab-content">
                                <div class="tab-pane active" id="allAds">

                                    @if(count($search_data) == 0)

                                        <?php

                                        for($i=0; $i<=10; $i++){
                                        ?>

                                        <!--search result here -->
                                        <div class="item-list">
                                            <div class="cornerRibbons topAds">
                                                <a href="#"> Top Ads</a>
                                            </div>
                                            <!--
                                            <div class="col-sm-2 no-padding photobox">
                                                <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00015.jpg" alt="img"></a> </div>
                                            </div>
                                            -->
                                            <!--/.photobox-->
                                            <div class="col-sm-7 add-desc-box">
                                                <div class="add-details">
                                                    <h5 class="add-title"> <a href="#">Brand New Samsung Phones </a> </h5>
                                                    <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
                                            </div>
                                            <!--/.add-desc-box-->
                                            <div class="col-sm-3 text-right  price-box">
                                                <h2 class="item-price"> $ 320 </h2>
                                                <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                                            <!--/.add-desc-box-->
                                        </div>
                                        <!--/.item-list-->
                                        <?php } ?>

                                    @else
                                        @foreach($search_data as $row)
                                                <!--search result here -->
                                            <div class="item-list">
                                                <div class="cornerRibbons topAds">
                                                    <a href="#"> Top Ads</a>
                                                </div>
                                                <!--
                                                <div class="col-sm-2 no-padding photobox">
                                                    <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.html"><img class="thumbnail no-margin" src="images/item/tp/Image00015.jpg" alt="img"></a> </div>
                                                </div>
                                                -->
                                                <!--/.photobox-->
                                                <div class="col-sm-7 add-desc-box">
                                                    <div class="add-details">
                                                        <h5 class="add-title"> <a href="#">{{$row->name}} </a> </h5>
                                                        <h5 class="add-title"> <a href="#">{{$row->number}} </a> </h5>
                                                        <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">{{$row->category}} </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
                                                </div>
                                                <!--/.add-desc-box-->
                                                <div class="col-sm-3 text-right  price-box">
                                                    <h2 class="item-price"> $ 320 </h2>
                                                    <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                                                <!--/.add-desc-box-->
                                            </div>
                                            <!--/.item-list-->
                                        @endforeach

                                    @endif












                                </div>
                            </div>
                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                                Save Search </a></div>
                    </div>
                    <div class="pagination-bar text-center">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"> ...</a></li>
                            <li><a class="pagination-btn" href="#">Next &raquo;</a></li>
                        </ul>
                    </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->


@stop