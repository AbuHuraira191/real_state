<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
    </body>

        @yield('script')
</html>
