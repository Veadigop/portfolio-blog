<!doctype html>
    <html lang="{{ app()->getLocale() }}">

        @include('layouts.head')

    <body>

            @include('layouts.header')

                <div class="container">
                    @yield('content')
                </div>

            @include('layouts.footer')

            @include('layouts.scripts')

    </body>

</html>