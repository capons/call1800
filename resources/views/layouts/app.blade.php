<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{!! asset('public/assets/web/css/style.css') !!}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--style js -->
    <script type="text/javascript" src="{!! asset('public/assets/web/js/frontpage.js') !!}"></script>
    <script> //for ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
<!--nav menu -->
<section>
    <nav style="margin-bottom: 0px" class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if(Route::getCurrentRoute()->getPath() == LaravelLocalization::setLocale().'/toll/reg'){ echo 'class=active';} else { echo '';} ?>><a href="{{ url('toll/reg')}}">@lang('site/frontpage/site.header.regtoll')<span class="sr-only"></span></a></li>
                    <li <?php if(Route::getCurrentRoute()->getPath() == LaravelLocalization::setLocale().'/toll/buy'){ echo 'class=active';} else { echo '';} ?>><a href="{{ url('toll/buy')}}">@lang('site/frontpage/site.header.buytoll')<span class="sr-only"></span></a></li>
                    <li <?php if(Route::getCurrentRoute()->getPath() == LaravelLocalization::setLocale().'/auth/login'){ echo 'class=active';} else { echo '';} ?>><a class="btn btn-primary t-w" href="{{ url('auth/login')}}">@lang('site/frontpage/site.header.login')<span class="sr-only"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-language"></i> @lang('site/frontpage/site.header.language') <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>
@section('sidebar')
    Это - главный сайдбар.
@show
@yield('content')


<!--footer -->
    <footer class="footer-container">
        <nav id="footer-nav-v" class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav navbar-left">
                        <li <?php if(Route::getCurrentRoute()->getPath() == LaravelLocalization::setLocale().'/'){ echo 'class=active';} else { echo '';} ?>><a href="{{ url('/')}}">@lang('site/frontpage/site.footer.about')<span class="sr-only"></span></a></li>
                        <li <?php if(Route::getCurrentRoute()->getPath() == LaravelLocalization::setLocale().'/'){ echo 'class=active';} else { echo '';} ?>><a href="{{ url('/')}}">@lang('site/frontpage/site.footer.privacy')<span class="sr-only"></span></a></li>
                        <li <?php if(Route::getCurrentRoute()->getPath() == LaravelLocalization::setLocale().'/'){ echo 'class=active';} else { echo '';} ?>><a href="{{ url('/')}}">@lang('site/frontpage/site.footer.terms')<span class="sr-only"></span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </footer>

<!-- ./footer-->




</body>
</html>