<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
{{--                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a></li>--}}
{{--                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>--}}
{{--                    <li class="{{ Request::is('agents') ? 'active' : '' }}"><a href="{{ route('agents') }}">Agents</a></li>--}}
                    @yield('nav_line_item')
                    {{--                    <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>--}}
{{--                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>--}}
                    <li><a href="{{ route('logout') }}">LogOut</a></li>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">
    <!-- Header Starts -->
    <div class="header">
        <a href="index"><img src="{{asset('assets/images/logo.png')}}" alt="Realestate"></a>

        {{--        <ul class="pull-right">--}}
        {{--            <li><a href="{{route('buysalerent')}}">Buy</a></li>--}}
        {{--            <li><a href="{{route('buysalerent')}}">Sale</a></li>--}}
        {{--            <li><a href="{{route('buysalerent')}}">Rent</a></li>--}}
        {{--        </ul>--}}
    </div>
    <!-- #Header Starts -->
</div>

@yield('content')

@include('partials.footer')
</body>
</html>
