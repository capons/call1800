<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{!! asset('public/assets/web/frontTheme/assets/ico/apple-touch-icon-144-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{!! asset('public/assets/web/frontTheme/assets/ico/apple-touch-icon-144-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{!! asset('public/assets/web/frontTheme/assets/ico/apple-touch-icon-72-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" href="{!! asset('public/assets/web/frontTheme/assets/ico/apple-touch-icon-57-precomposed.png') !!}">
    <link rel="shortcut icon" href="{!! asset('public/assets/web/frontTheme/assets/ico/favicon.png') !!}">

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('public/assets/web/frontTheme/assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{!! asset('public/assets/web/frontTheme/assets/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/assets/web/css/style.css') !!}" rel="stylesheet" type="text/css">


    <!-- styles needed for carousel slider -->
    <link href="{!! asset('public/assets/web/frontTheme/assets/css/owl.carousel.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/assets/web/frontTheme/assets/css/owl.theme.css') !!}" rel="stylesheet">

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="{!! asset('public/assets/web/frontTheme/assets/js/pace.min.js') !!}"></script>



    <script> //for ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


</head>
<body>


<div id="wrapper">


    <div class="header">
        <nav class="navbar   navbar-site navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <a href="index.html" class="navbar-brand logo logo-title">
                        <!-- Original Logo will be placed here  -->
                        <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
                        BOOT<span>CLASSIFIED </span> </a></div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('auth/login')}}">Login</a></li>
                        <li><a href="{{ url('auth/register') }}">Signup</a></li>
                        <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="{{ url('toll/reg')}}">Post Free Add</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- /.header -->


    @section('sidebar')
        Main side bar.
    @show
    @yield('content') <!-- app content -->

    <div class="page-info hasOverly" style="background: url(images/bg.jpg); background-size:cover">
        <div class="bg-overly ">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>2200</span></h5>

                                    <div class="iconbox-wrap-text">Trusted Seller</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>100</span></h5>

                                    <div class="iconbox-wrap-text">Categories</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>700</span></h5>

                                    <div class="iconbox-wrap-text">Location</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-facebook"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>50,000</span></h5>

                                    <div class="iconbox-wrap-text"> Facebook Fans</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">

            <div class="page-bottom-info-content text-center">
                <h1>If you have any questions, comments or concerns, please call the Classified Advertising department
                    at (000) 555-5555</h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                    <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555 </a>
            </div>

        </div>
    </div>


    <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li>
                    <a href="#"> Home </a>
                    <a href="#"> About us </a>
                    <a href="#"> Terms and Conditions </a>
                    <a href="#"> Privacy Policy </a>
                    <a href="#"> Contact us </a>
                    <a href="#"> FAQ </a>
            </ul>
            <ul class=" pull-right navbar-link footer-nav">
                <li> &copy; 2016 BootClassified</li>
            </ul>
        </div>

    </div>
    <!-- /.footer -->





</div> <!-- ./wrapper -->




<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


<script src="{!! asset('public/assets/web/frontTheme/assets/bootstrap/js/bootstrap.min.js') !!}"></script>

<!-- include carousel slider plugin  -->
<script src="{!! asset('public/assets/web/frontTheme/assets/js/owl.carousel.min.js') !!}"></script>

<!-- include equal height plugin  -->
<script src="{!! asset('public/assets/web/frontTheme/assets/js/jquery.matchHeight-min.js') !!}"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="{!! asset('public/assets/web/frontTheme/assets/js/hideMaxListItem.js') !!}"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="{!! asset('public/assets/web/frontTheme/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') !!}"></script>
<script src="{!! asset('public/assets/web/frontTheme/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') !!}"></script>


<!-- include custom script for site  -->
<script src="{!! asset('public/assets/web/frontTheme/assets/js/script.js') !!}"></script>


<!-- include jquery autocomplete plugin  -->

<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/jquery.mockjax.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/jquery.autocomplete.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/usastates.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/autocomplete-demo.js') !!}"></script>







</body>
</html>