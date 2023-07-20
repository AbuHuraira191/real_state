<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
        <style>
        @yield('style')
        </style>
    </head>
    <body>
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
    </body>

        @yield('script')
</html>
