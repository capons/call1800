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

    <!--Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('public/assets/web/frontTheme/assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{!! asset('public/assets/web/frontTheme/assets/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/assets/web/css/app.css') !!}" rel="stylesheet" type="text/css">


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
    <script src="{!! asset('accountpage.jsjs') !!}"></script>

    <!--default js -->
    <script src="{!! asset('public/assets/web/js/accountpage.js') !!}"></script>
    <script src="{!! asset('public/assets/web/js/stripe_payment.js') !!}"></script>



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
    @include('account.header')
    <!-- /.header -->

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 page-sidebar">

                    @include('account.sidebar');

                </div> <!-- ./sidebar-->
                <div class="col-sm-9 page-content">

                    @yield('content')

                </div> <!-- ./content-->
            </div>
        </div>
    </div>

    @include('account.footer');
    <!--/.footer-->

</div>





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
<!--
<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/jquery.mockjax.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/jquery.autocomplete.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/usastates.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/assets/web/frontTheme/assets/plugins/autocomplete/autocomplete-demo.js') !!}"></script>
-->






</body>
</html>