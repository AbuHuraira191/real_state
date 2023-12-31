<!-- Header Starts -->
<div class="navbar-wrapper">

    @if ($errors->any())
        <div id="error-container" data-errors="{{ $errors->toJson() }}"></div>
    @endif

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
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a></li>
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
{{--                    <li class="{{ Request::is('agents') ? 'active' : '' }}"><a href="{{ route('agents') }}">Dealer</a></li>--}}
{{--                    <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>--}}
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
{{--                    <li><a data-toggle="modal" data-target="#loginpop">Login</a></li>--}}
                    <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('loginPage') }}">Login</a></li>
                    <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ route('register') }}">Register</a></li>
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
{{--            <li><a href="{{route('buysalerent')}}">Agent</a></li>--}}
{{--        </ul>--}}
    </div>
    <!-- #Header Starts -->
</div>
