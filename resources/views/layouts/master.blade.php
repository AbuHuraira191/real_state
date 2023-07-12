<!DOCTYPE html>
<html lang="en">
    @include('partials.head')
    <body>
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
    </body>
</html>
