<header class="d-flex align-items-center">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-2 col-sm-6 col-6">
                <a href="{{ url('/') }}">
                    <div class="logo">veadigop</div>
                </a>
            </div>

            <div class="menu-wrapper col-md-6 col-sm-6 col-6 text-center">

                <nav class="navbar navbar-expand-lg main-navigation">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ url('/') }}" class="{{Request::is('/') ? 'active': ''}}">Home</a></li>
                        <li class="nav-item"><a href="{{ url('/blog') }}" class="{{Request::is('blog') ? 'active': ''}}">Blog</a></li>
                        <li class="nav-item"><a href="{{ url('/portfolio') }}" class="{{Request::is('portfolio') ? 'active': ''}}">Portfolio</a></li>
                        <li class="nav-item"><a href="{{ url('/about') }}" class="{{Request::is('about') ? 'active': ''}}">About Us</a></li>
                        <li class="nav-item"><a href="{{ url('/contact') }}" class="{{Request::is('contact') ? 'active': ''}}">Contact</a></li>
                    </ul>
                    </div>
                </nav>
            </div>

            <div class="col-md-4 col-12 col-sm-12 text-right justify-content-end">

                @if (Route::has('login'))
                    <div class="top-right links">
                        <ul>
                            @if (Auth::check())
                                <li><a href="{{ url('/logout') }}" class="{{Request::is('logout') ? 'active': ''}}">Logout : {{ Auth::user()->name }}</a></li>
                                <li><a href="{{ url('/admin') }}" class="{{Request::is('admin') ? 'active': ''}}">Dashboard</a></li>
                            @else
                                <li><a href="{{ url('/login') }}" class="{{Request::is('login') ? 'active': ''}}">Login</a></li>
                                <li><a href="{{ url('/register') }}" class="{{Request::is('register') ? 'active': ''}}">Register</a></li>
                            @endif
                        </ul>
                    </div>
                @endif

            </div>

        </div>

    </div>

</header>

<div class="site-wrapper">