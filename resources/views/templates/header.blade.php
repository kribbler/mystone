<div class="header">

    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
            <img src="{{ Multisite::getLogo() }}" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
            @if (Multisite::type('payments'))
                <ul class="loginbar pull-right">
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                </ul>
            @elseif (Multisite::type('keystone'))
                <ul class="loginbar pull-right">
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    <li class="topbar-devider"></li>
                    @if (Auth::check() && Auth::user()->type == 'admin')
                        <li><a href="{{ url('/admin') }}">Admin</a></li>
                        <li class="topbar-devider"></li>
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="topbar-devider"></li>
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    @elseif (Auth::check())
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="topbar-devider"></li>
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                        <li class="topbar-devider"></li>
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @endif 
                </ul>
            @elseif (Multisite::type('applications'))
                <ul class="loginbar pull-right">
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                </ul>
            @endif
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                @if (Multisite::type('keystone'))
                    <!-- Home -->
                    <li class="dropdown active">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Links
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('downloads') }}">Downloads</a></li>
                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                        </ul>
                    </li>
                    <!-- End Home -->
                @elseif (Multisite::type('members'))
                    <!-- Home -->
                    <li class="dropdown active">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Links
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('downloads') }}">Downloads</a></li>
                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                        </ul>
                    </li>
                    <!-- End Home -->
                @elseif (Multisite::type('applications'))
                    <div style="margin-top: 40px"></div>
                @endif 
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->

</div>