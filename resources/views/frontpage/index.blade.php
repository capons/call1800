@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!!  trans('main page') !!} :: @parent @stop

@section('sidebar') @stop

{{-- Content --}}
@section('content')

    <div class="intro" style="background-image: url({!! asset('public/assets/web/frontTheme/images/bg3.jpg') !!});">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title animated fadeInDown"> Find Classified Ads </h1>

                    <p class="sub animateme fittext3 animated fadeIn"> Find local classified ads on bootclassified in Minutes </p>

                    <div class="row search-row animated fadeInUp">
                        <!--
                        <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                            <i class="icon-location-2 icon-append"></i>
                            <input type="text" name="country" id="autocomplete-ajax" class="form-control locinput input-rel searchtag-input has-icon" placeholder="City/Zipcode..." value="">
                        </div>
                        -->
                        <form id="fsf" action="{{action('Search\SearchController@filter')}}" method="post">
                            {!! csrf_field() !!}
                            <!-- default-search-bar   hide-search-button-->



                            <div id="msi" class="col-lg-8 col-sm-8 search-col relative default-search-bar"><i class="icon-docs icon-append"></i>
                                <div id="container-si">
                                    <input id="fsf-input"  type="text" name="sc_number"  class="form-control has-icon" placeholder="I'm looking for a ..." value="">
                                </div>

                                <!-- col-lg-6 col-sm-6 -->
                                <div id="msi-b" class="col-lg-3 search-col hide-search-button">
                                    <div id="container-find" style="border-right: 1px solid antiquewhite;" class="col-lg-12 col-sm-12 no-padding">
                                        <button id="f-find" type="submit" style="border-radius: 0px" class="btn btn-primary btn-find-f btn-block"><i class="icon-search"></i><strong>Find</strong></button>
                                    </div>
                                    <div id="container-call" class="col-lg-12 col-sm-12 no-padding">
                                        <button id="f-call" type="submit" class="btn btn-primary btn-search btn-block"><i class="icon-search"></i><strong>Call Now</strong></button>
                                    </div>
                                </div>

                            </div>



                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 page-content col-thin-right">
                    <div class="inner-box category-content">
                        <h2 class="title-2">Find Toll Free Numbers In Us</h2>

                        <div class="row">
                            <div class="col-md-4 col-sm-4 ">
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i class="fa fa-car ln-shadow"></i>Automobiles <span class="count">277,959</span> </a>
                                        <span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-1">
                                        <li><a href="{{url('/search')}}">Car Parts &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Campervans &amp; Caravans</a></li>
                                        <li><a href="{{url('/search')}}">Motorbikes &amp; Scooters</a></li>
                                        <li><a href="{{url('/search')}}">Motorbike Parts &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Vans, Trucks &amp; Plant</a></li>
                                        <li><a href="{{url('/search')}}">Wanted</a></li>
                                    </ul>
                                </div>
                                <!--
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i class="icon-home ln-shadow"></i>
                                            Property <span class="count">228,705</span></a> <span
                                                data-target=".cat-id-2"
                                                data-toggle="collapse"
                                                class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span></h3>


                                    <ul class="cat-collapse collapse in cat-id-2">
                                        <li><a href="category.html">House for Rent</a></li>
                                        <li><a href="category.html">House for Sale </a></li>
                                        <li><a href="category.html"> Apartments For Sale </a></li>
                                        <li><a href="category.html">Apartments for Rent </a></li>
                                        <li><a href="category.html">Farms-Ranches </a></li>
                                        <li><a href="category.html">Land </a></li>
                                        <li><a href="category.html">Vacation Rentals </a></li>
                                        <li><a href="category.html">Commercial Building</a></li>
                                    </ul>
                                </div>
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i class="icon-home ln-shadow"></i>
                                            Jobs <span class="count">6375</span></a>

                                        <span data-target=".cat-id-3" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-3">
                                        <li><a href="category.html">Full Time Jobs</a></li>
                                        <li><a href="category.html">Internet Jobs </a></li>
                                        <li><a href="category.html">Learn &amp; Earn jobs </a></li>
                                        <li><a href="category.html"> Manual Labor Jobs </a></li>
                                        <li><a href="category.html">Other Jobs </a></li>
                                        <li><a href="category.html">OwnBusiness </a></li>
                                    </ul>
                                </div>
                                -->
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i class="fa fa-car ln-shadow"></i>Automobiles <span class="count">277,959</span> </a>
                                        <span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-1">
                                        <li><a href="{{url('/search')}}">Car Parts &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Campervans &amp; Caravans</a></li>
                                        <li><a href="{{url('/search')}}">Motorbikes &amp; Scooters</a></li>
                                        <li><a href="{{url('/search')}}">Motorbike Parts &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Vans, Trucks &amp; Plant</a></li>
                                        <li><a href="{{url('/search')}}">Wanted</a></li>
                                    </ul>
                                </div>
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i class="fa fa-car ln-shadow"></i>Automobiles <span class="count">277,959</span> </a>
                                        <span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-1">
                                        <li><a href="{{url('/search')}}">Car Parts &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Campervans &amp; Caravans</a></li>
                                        <li><a href="{{url('/search')}}">Motorbikes &amp; Scooters</a></li>
                                        <li><a href="{{url('/search')}}">Motorbike Parts &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Vans, Trucks &amp; Plant</a></li>
                                        <li><a href="{{url('/search')}}">Wanted</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i class="fa fa-briefcase ln-shadow"></i> Services <span class="count">45,526</span></a>
                                        <span data-target=".cat-id-4" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-4">
                                        <li><a href="{{url('/search')}}">Building, Home &amp; Removals</a></li>
                                        <li><a href="{{url('/search')}}">Entertainment</a></li>
                                        <li><a href="{{url('/search')}}">Health &amp; Beauty</a></li>
                                        <li><a href="{{url('/search')}}">Miscellaneous</a></li>
                                        <li><a href="{{url('/search')}}">Property &amp; Shipping</a></li>
                                        <li><a href="{{url('/search')}}">Tax, Money &amp; Visas</a></li>
                                        <li><a href="{{url('/search')}}">Telecoms &amp; Computers</a></li>
                                        <li><a href="{{url('/search')}}">Travel Services &amp; Tours</a></li>
                                        <li><a href="{{url('/search')}}">Tuition &amp; Lessons</a></li>
                                    </ul>
                                </div>
                                <!--
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i
                                                    class="icon-book-open ln-shadow"></i> Learning <span
                                                    class="count">26,529</span></a> <span data-target=".cat-id-5"
                                                                                          data-toggle="collapse"
                                                                                          class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-5">
                                        <li><a href="category.html"> Automotive Classes </a></li>
                                        <li><a href="category.html"> Computer Multimedia Classes </a></li>
                                        <li><a href="category.html"> Sports Classes </a></li>
                                        <li><a href="category.html"> Home Improvement Classes </a></li>
                                        <li><a href="category.html"> Language Classes </a></li>
                                        <li><a href="category.html"> Music Classes </a></li>
                                        <li><a href="category.html"> Personal Fitness </a></li>
                                        <li><a href="category.html"> Other Classes </a></li>
                                    </ul>
                                </div>

                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="category.html"><i
                                                    class="icon-guidedog ln-shadow"></i> Pets <span
                                                    class="count">42,111</span></a>
                                        <span data-target=".cat-id-6" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-6">
                                        <li><a href="category.html">Pets for Sale</a></li>
                                        <li><a href="category.html">Petsitters &amp; Dogwalkers</a></li>
                                        <li><a href="category.html">Equipment &amp; Accessories</a></li>
                                        <li><a href="category.html">Missing, Lost &amp; Found</a></li>
                                    </ul>
                                </div>
                                -->
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i class="fa fa-briefcase ln-shadow"></i> Services <span class="count">45,526</span></a>
                                        <span data-target=".cat-id-4" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-4">
                                        <li><a href="{{url('/search')}}">Building, Home &amp; Removals</a></li>
                                        <li><a href="{{url('/search')}}">Entertainment</a></li>
                                        <li><a href="{{url('/search')}}">Health &amp; Beauty</a></li>
                                        <li><a href="{{url('/search')}}">Miscellaneous</a></li>
                                        <li><a href="{{url('/search')}}">Property &amp; Shipping</a></li>
                                        <li><a href="{{url('/search')}}">Tax, Money &amp; Visas</a></li>
                                        <li><a href="{{url('/search')}}">Telecoms &amp; Computers</a></li>
                                        <li><a href="{{url('/search')}}">Travel Services &amp; Tours</a></li>
                                        <li><a href="{{url('/search')}}">Tuition &amp; Lessons</a></li>
                                    </ul>
                                </div>
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i class="fa fa-briefcase ln-shadow"></i> Services <span class="count">45,526</span></a>
                                        <span data-target=".cat-id-4" data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-4">
                                        <li><a href="{{url('/search')}}">Building, Home &amp; Removals</a></li>
                                        <li><a href="{{url('/search')}}">Entertainment</a></li>
                                        <li><a href="{{url('/search')}}">Health &amp; Beauty</a></li>
                                        <li><a href="{{url('/search')}}">Miscellaneous</a></li>
                                        <li><a href="{{url('/search')}}">Property &amp; Shipping</a></li>
                                        <li><a href="{{url('/search')}}">Tax, Money &amp; Visas</a></li>
                                        <li><a href="{{url('/search')}}">Telecoms &amp; Computers</a></li>
                                        <li><a href="{{url('/search')}}">Travel Services &amp; Tours</a></li>
                                        <li><a href="{{url('/search')}}">Tuition &amp; Lessons</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4   last-column">
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i
                                                    class=" icon-basket-1 ln-shadow"></i> For Sale <span
                                                    class="count">64,526</span></a> <span data-target=".cat-id-7"
                                                                                          data-toggle="collapse"
                                                                                          class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-7">
                                        <li><a href="{{url('/search')}}">Audio &amp; Stereo</a></li>
                                        <li><a href="{{url('/search')}}">Baby &amp; Kids Stuff</a></li>
                                        <li><a href="{{url('/search')}}">CDs, DVDs, Games &amp; Books</a></li>
                                        <li><a href="{{url('/search')}}">Clothes, Footwear &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Computers &amp; Software</a></li>
                                        <li><a href="{{url('/search')}}">Home &amp; Garden</a></li>
                                        <li><a href="{{url('/search')}}">Music &amp; Instruments</a></li>
                                        <li><a href="{{url('/search')}}">Office Furniture &amp; Equipment</a></li>
                                        <li><a href="{{url('/search')}}">Phones, Mobile Phones &amp; Telecoms</a></li>
                                        <li><a href="{{url('/search')}}">Sports, Leisure &amp; Travel</a></li>
                                        <li><a href="{{url('/search')}}">Tickets</a></li>
                                        <li><a href="{{url('/search')}}">TV, DVD &amp; Cameras</a></li>
                                    </ul>
                                </div>
                                <!--
                                <div class="cat-list ">
                                    <h3 class="cat-title"><a href="category.html"><i
                                                    class=" icon-theatre ln-shadow"></i> Community <span
                                                    class="count">5,30</span> </a> <span data-target=".cat-id-8"
                                                                                         data-toggle="collapse"
                                                                                         class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-8">
                                        <li><a href="category.html">Announcements </a></li>
                                        <li><a href="category.html">Car Pool - Bike Ride </a></li>
                                        <li><a href="category.html">Charity - Donate - NGO </a></li>
                                        <li><a href="category.html">Lost - Found </a></li>
                                        <li><a href="category.html">Tender Notices </a></li>
                                    </ul>
                                </div>
                                -->
                                <div class="cat-list">
                                    <h3 class="cat-title"><a href="{{url('/search')}}"><i
                                                    class=" icon-basket-1 ln-shadow"></i> For Sale <span
                                                    class="count">64,526</span></a> <span data-target=".cat-id-7"
                                                                                          data-toggle="collapse"
                                                                                          class="btn-cat-collapsed collapsed">   <span
                                                    class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse collapse in cat-id-7">
                                        <li><a href="{{url('/search')}}">Audio &amp; Stereo</a></li>
                                        <li><a href="{{url('/search')}}">Baby &amp; Kids Stuff</a></li>
                                        <li><a href="{{url('/search')}}">CDs, DVDs, Games &amp; Books</a></li>
                                        <li><a href="{{url('/search')}}">Clothes, Footwear &amp; Accessories</a></li>
                                        <li><a href="{{url('/search')}}">Computers &amp; Software</a></li>
                                        <li><a href="{{url('/search')}}">Home &amp; Garden</a></li>
                                        <li><a href="{{url('/search')}}">Music &amp; Instruments</a></li>
                                        <li><a href="{{url('/search')}}">Office Furniture &amp; Equipment</a></li>
                                        <li><a href="{{url('/search')}}">Phones, Mobile Phones &amp; Telecoms</a></li>
                                        <li><a href="{{url('/search')}}">Sports, Leisure &amp; Travel</a></li>
                                        <li><a href="{{url('/search')}}">Tickets</a></li>
                                        <li><a href="{{url('/search')}}">TV, DVD &amp; Cameras</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inner-box relative">
                        <h2 class="title-2">Featured Listings

                            <a id="nextItem" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
                            <a id="prevItem" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i>
                            </a>

                        </h2>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="no-margin item-carousel owl-carousel owl-theme">
                                    <div class="item"><a href="ads-details-automobile.html">
                     <span class="item-carousel-thumb">
                    	<img class="img-responsive" src="images/auto/2012-mercedes-benz-sls-amg.jpg" alt="img">
                     </span>
                                            <span class="item-name"> 2011 Mercedes-Benz SLS AMG  </span>
                                            <span class="price">  $204,990 </span>
                                        </a>
                                    </div>

                                    <div class="item"><a href="{{url('/search')}}">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="images/item/tp/Image00006.jpg"
                                                                                alt="img"> </span>
                                            <span class="item-name"> consectetuer adipiscing elit </span>
                                            <span class="price"> $ 240 </span></a></div>


                                    <div class="item"><a href="{{url('/search')}}">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="images/item/tp/Image00022.jpg"
                                                                                alt="img"> </span> <span
                                                    class="item-name"> sed diam nonummy  </span> <span
                                                    class="price"> $ 140</span></a></div>

                                    <div class="item"><a href="{{url('/search')}}">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="images/item/tp/Image00013.jpg"
                                                                                alt="img">  </span><span
                                                    class="item-name"> feugiat nulla facilisis  </span> <span
                                                    class="price"> $ 140 </span></a>
                                    </div>

                                    <div class="item"><a href="{{url('/search')}}">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="images/item/FreeGreatPicture.com-46404-google-drops-nexus-4-by-100-offers-15-day-price-protection-refund.jpg"
                                                                                alt="img"> </span> <span
                                                    class="item-name"> praesent luptatum zzril  </span> <span
                                                    class="price"> $ 220 </span></a>
                                    </div>

                                    <div class="item"><a href="{{url('/search')}}">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="images/item/FreeGreatPicture.com-46405-google-drops-price-of-nexus-4-smartphone.jpg"
                                                                                alt="img"> </span> <span
                                                    class="item-name"> delenit augue duis dolore  </span> <span
                                                    class="price"> $ 120 </span></a>
                                    </div>

                                    <div class="item"><a href="{{url('/search')}}">
                                        <span class="item-carousel-thumb"> <img class="item-img"
                                                                                src="images/item/FreeGreatPicture.com-46407-nexus-4-starts-at-199.jpg"
                                                                                alt="img"> </span> <span
                                                    class="item-name"> te feugait nulla facilisi </span> <span
                                                    class="price"> $ 251 </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="inner-box relative">
                        <div class="row">
                            <div class="col-md-5">
                                <div>
                                    <h3 class="title-2"><i class="icon-location-2"></i> Popular locations </h3>

                                    <div class="row">
                                        <ul class="cat-list col-xs-6">
                                            <li><a href="{{url('/search')}}">Atlanta</a></li>
                                            <li><a href="{{url('/search')}}">Wichita </a></li>
                                            <li><a href="{{url('/search')}}"> Anchorage </a></li>
                                            <li><a href="{{url('/search')}}"> Dallas </a></li>
                                            <li><a href="{{url('/search')}}"> New York </a></li>
                                            <li><a href="{{url('/search')}}">Santa Ana/Anaheim </a></li>
                                            <li><a href="{{url('/search')}}"> Miami </a></li>
                                            <li><a href="{{url('/search')}}">Los Angeles</a></li>
                                        </ul>

                                        <ul class="cat-list cat-list-border col-xs-6">
                                            <li><a href="{{url('/search')}}">Atlanta</a></li>
                                            <li><a href="{{url('/search')}}">Wichita </a></li>
                                            <li><a href="{{url('/search')}}"> Anchorage </a></li>
                                            <li><a href="{{url('/search')}}"> Dallas </a></li>
                                            <li><a href="{{url('/search')}}"> New York </a></li>
                                            <li><a href="{{url('/search')}}">Santa Ana/Anaheim </a></li>
                                            <li><a href="{{url('/search')}}"> Miami </a></li>
                                            <li><a href="{{url('/search')}}">Los Angeles</a></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-7 ">
                                <h3 class="title-2"><i class="icon-search-1"></i> Popular Makes </h3>

                                <div class="row">
                                    <ul class="cat-list col-md-4 col-xs-4 col-xxs-6">
                                        <li><a href="{{url('/search')}}">free </a></li>
                                        <li><a href="{{url('/search')}}">furniture </a></li>
                                        <li><a href="{{url('/search')}}">general </a></li>
                                        <li><a href="{{url('/search')}}">household </a></li>
                                        <li><a href="{{url('/search')}}">jewelry </a></li>
                                        <li><a href="{{url('/search')}}">materials </a></li>
                                        <li><a href="{{url('/search')}}">sporting </a></li>
                                        <li><a href="{{url('/search')}}">tickets </a></li>
                                    </ul>
                                    <ul class="cat-list col-md-4 col-xs-4 col-xxs-6">
                                        <li><a href="{{url('/search')}}">free </a></li>
                                        <li><a href="{{url('/search')}}">furniture </a></li>
                                        <li><a href="{{url('/search')}}">general </a></li>
                                        <li><a href="{{url('/search')}}">household </a></li>
                                        <li><a href="{{url('/search')}}">jewelry </a></li>
                                        <li><a href="{{url('/search')}}">materials </a></li>
                                        <li><a href="{{url('/search')}}">sporting </a></li>
                                        <li><a href="{{url('/search')}}">tickets </a></li>
                                    </ul>
                                    <ul class="cat-list col-md-4 col-xs-4 col-xxs-6">
                                        <li><a href="{{url('/search')}}">free </a></li>
                                        <li><a href="{{url('/search')}}">furniture </a></li>
                                        <li><a href="{{url('/search')}}">general </a></li>
                                        <li><a href="{{url('/search')}}">household </a></li>
                                        <li><a href="{{url('/search')}}">jewelry </a></li>
                                        <li><a href="{{url('/search')}}">materials </a></li>
                                        <li><a href="{{url('/search')}}">sporting </a></li>
                                        <li><a href="{{url('/search')}}">tickets </a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box no-padding">
                            <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                            src="images/site/app.jpg" alt="tv"></a>
                            </div>
                        </div>
                        <div class="inner-box">
                            <h2 class="title-2">Popular Categories </h2>

                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                    <li><a href="{{url('/search')}}"> Apparel (1,386) </a></li>
                                    <li><a href="{{url('/search')}}"> Art (1,163) </a></li>
                                    <li><a href="{{url('/search')}}"> Business Opportunities (4,974) </a>
                                    </li>
                                    <li><a href="{{url('/search')}}"> Community and Events (1,258) </a></li>
                                    <li><a href="{{url('/search')}}"> Electronics and Appliances
                                            (1,578) </a></li>
                                    <li><a href="{{url('/search')}}"> Jobs and Employment (3,609) </a></li>
                                    <li><a href="{{url('/search')}}"> Motorcycles (968) </a></li>
                                    <li><a href="{{url('/search')}}"> Pets (1,188) </a></li>
                                    <li><a href="{{url('/search')}}"> Services (7,583) </a></li>
                                    <li><a href="{{url('/search')}}"> Vehicles (1,129) </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->



@endsection
