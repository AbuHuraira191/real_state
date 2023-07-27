@extends('layouts.master')

@section('content')
{{--{{--}}
{{--    dd($properties[0]->images[0]['image_path'])--}}
{{--}}--}}
{{--<img src="{{ asset($properties[0]->images[0]['image_path']) }}" alt="Image">--}}

<div class="">
        <div id="slider" class="sl-slider-wrapper">
            <div class="sl-slider">
                @php
                    $i = 1;
                @endphp
                @foreach($properties as $property)
                    @php
                        $i++;
                    @endphp
                    @if($i < 7)
                        @if($i%2 === 0)
                            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                                <div class="sl-slide-inner">
                                    <div class="bg-img" style="background-image: url('{{ asset($property->images[0]['image_path']) }}');"></div>
                                    <h2><a href="#">{{$property['bed']}} Bed Rooms and {{$property['living_room']}} Living Room Property on Sale</a></h2>
                                    <blockquote>
                                        <p class="location"><span class="glyphicon glyphicon-map-marker"></span> {{$property['address']}}, {{$property['location_city']}}</p>
                                        <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
                                        <cite>RS. {{$property['price']}}</cite>
                                    </blockquote>
                                </div>
                            </div>
                        @else
                            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                                <div class="sl-slide-inner">
                                    <<div class="bg-img" style="background-image: url('{{ asset($property->images[0]['image_path']) }}');"></div>
                                    <h2><a href="#">{{$property['bed']}} Bed Rooms and {{$property['living_room']}} Living Room Property on Sale</a></h2>
                                    <blockquote>
                                        <p class="location"><span class="glyphicon glyphicon-map-marker"></span> {{$property['address']}}, {{$property['location_city']}}</p>
                                        <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
                                        <cite>RS. {{$property['price']}}</cite>
                                    </blockquote>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach

            <!-- /sl-slider -->



            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </nav>

        </div><!-- /slider-wrapper -->
    </div>



    <div class="banner-search">
        <div class="container">
            <!-- banner -->
            <div class="searchbar">
                <div class="row">
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                        <p>Join now and get updated with all the properties deals.</p>
                        <a href="{{ route('loginPage') }}" class="btn btn-info">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner -->
    @if (request()->has('message'))
        <div class="alert alert-danger">
            {{ request()->query('message') }}
        </div>
    @endif
    <div class="container">
        <div class="properties-listing spacer"> <a href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}" class="pull-right viewall">View All Listing</a>
            <h2>Featured Properties</h2>
            <div id="owl-example" class="owl-carousel">
                @foreach($properties as $property)
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive" alt="properties" style="height: 175px">
                            <div class="status {{ $property['status'] === 'Sold' ? 'new' : 'sold' }}">{{$property['status']}}</div>
                        </div>
                        <h4><a href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}">{{$property['name']}}</a></h4>
                        <p class="price">Price: Rs.{{$property['price']}}</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property['bed']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property['living_room']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property['parking']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property['kitchen']}}</span> </div>
                        <a class="btn btn-primary" href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}">View Details</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="spacer">
            <div class="row">
                <div class="col-lg-6 col-sm-9 recent-view">
                    <h3>About Us</h3>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="{{route('about')}}">Learn More</a></p>

                </div>
                <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
                    <h3>Recommended Properties</h3>
                    <div id="myCarousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            @php
                                $i = 0;
                            @endphp
                            @foreach($properties as $property)
                                @php
                                    $i++;
                                @endphp
                                @if($i < 5)
                                    @if($i == 1)
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-lg-4"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive" alt="properties"/></div>
                                                <div class="col-lg-8">
                                                    <h5><a href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}">{{$property['name']}}</a></h5>
                                                    <p class="price">Rs.{{$property['price']}}</p>
                                                    <a href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}" class="more">More Detail</a> </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive" alt="properties"/></div>
                                                <div class="col-lg-8">
                                                    <h5><a href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}">{{$property['name']}}</a></h5>
                                                    <p class="price">Rs.{{$property['price']}}</p>
                                                    <a href="{{ route('loginPage', ['message' => 'Please login first or make an account to visit pages.']) }}" class="more">More Detail</a> </div>
                                            </div>
                                        </div>
                                    @endif

                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if ($errors->any())
        <script>
            // JavaScript to display the validation errors as an alert
            document.addEventListener('DOMContentLoaded', function () {
                const errorMessages = @json($errors->all());
                if (errorMessages.length > 0) {
                    const alertContainer = document.createElement('div');
                    alertContainer.classList.add('alert-container');
                    errorMessages.forEach(message => {
                        const alert = document.createElement('div');
                        alert.classList.add('alert', 'alert-danger');
                        alert.textContent = message;
                        alertContainer.appendChild(alert);
                    });
                    document.body.appendChild(alertContainer);

                    setTimeout(function () {
                        document.body.removeChild(alertContainer);
                    }, 5000); // Adjust the time in milliseconds (5 seconds in this example)
                }
            });
        </script>
    @endif
@endsection
