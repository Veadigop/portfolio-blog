<header class="d-flex align-items-center">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-3">
                <a href="{{ url('/') }}">
                    <div class="logo">veadigop</div>
                </a>
            </div>

            <div class="col-md-5">
                <nav class="main-navigation">
                    <ul>
                        <li><a href="{{ url('/') }}" class="{{Request::is('/') ? 'active': ''}}">Home</a></li>
                        <li><a href="{{ url('/blog') }}" class="{{Request::is('blog') ? 'active': ''}}">Blog</a></li>
                        <li><a href="{{ url('/portfolio') }}" class="{{Request::is('portfolio') ? 'active': ''}}">Portfolio</a></li>
                        <li><a href="{{ url('/about') }}" class="{{Request::is('about') ? 'active': ''}}">About Us</a></li>
                        <li><a href="{{ url('/contact') }}" class="{{Request::is('contact') ? 'active': ''}}">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-md-4 text-right justify-content-end">

                @if (Route::has('login'))
                    <div class="top-right links">
                        <ul>
                            @if (Auth::check())
                                <li><a href="{{ url('/logout') }}" class="{{Request::is('logout') ? 'active': ''}}">Logout</a></li>
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