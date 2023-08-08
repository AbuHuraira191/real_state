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
                    @yield('nav_line_item')
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
        <a href="index"><img style="width: 400px" src="{{asset('assets/images/logo.png')}}" alt="Dreamlands Dealing"></a>
    </div>
    <!-- #Header Starts -->
</div>

@yield('content')

@include('partials.footer')
</body>
@yield('script')
</html>
