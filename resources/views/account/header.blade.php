<div class="header">
    <nav class="navbar navbar-site navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <a href="index.html" class="navbar-brand logo logo-title">
                    <!-- Original Logo will be placed here  -->
                    <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
                    BOOT<span>CLASSIFIED </span>
                </a>
            </div>
            <div class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('auth/logout')}}">Signout <i class="glyphicon glyphicon-off"></i> </a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span><?php echo Auth::user()->name; ?></span> <i class="icon-user fa"></i> <i
                                    class=" icon-down-open-big fa"></i></a>
                        <ul class="dropdown-menu user-menu">
                            <!--
                            <li class="active">
                                <a href="#"><i class="icon-home"></i> Personal Home</a>
                            </li>
                            -->

                            <li>
                                <a href="#"><i class="glyphicon glyphicon-pencil"></i>Edit profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-refresh"></i>Change password</a>
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-book"></i>Help</a>
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-wrench"></i>Report a problem</a>
                            </li>
                            <!--
                            <li>
                                <a href="#"><i class="icon-hourglass"></i> Pending approval </a>
                            </li>
                            <li>
                                <a href="#"><i class=" icon-money "></i> Payment history </a>
                            </li>
                            -->
                        </ul>
                    </li>
                    <li style="border-left:none;" class="postadd"><a style="padding: 12px 0px;" class="btn btn-block   btn-border btn-post btn-danger" href="{{url('toll/reg')}}">Post Free Add</a></li>
                    <li style="border-left:none;" class="postadd"><a style="padding: 12px 0px;" class="btn btn-block   btn-border btn-post btn-danger" href="{{url('toll/buy')}}">Buy Toll Free Number</a></li>
                    <li style="border-left:none;" class="postadd"><a style="padding: 12px 0px;" class="btn btn-block   btn-border btn-post btn-danger" href="#">Port Toll Free Number</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>