@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('seller_index') ? 'active' : '' }}"><a href="{{ route('seller_index') }}">Home</a></li>
    <li class="{{ Request::is('seller_leading_properties') ? 'active' : '' }}"><a href="{{ route('seller_leading_properties') }}">Leading Own Properties</a></li>
    <li class="{{ Request::is('seller_all_dealers') ? 'active' : '' }}"><a href="{{ route('seller_all_dealers') }}">Dealers</a></li>
    <li class="{{ Request::is('seller_assign_property') ? 'active' : '' }}"><a href="{{ route('seller_assign_property') }}">Assign Property</a></li>
    <li class="{{ Request::is('seller_my_dealers') ? 'active' : '' }}"><a href="{{ route('seller_my_dealers') }}">My Dealers</a></li>
@endsection

@section('content')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{route('seller_index')}}">Home</a> /Leading Properties</span>
            <h2>List Of Leading Properties</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="properties-listing spacer">
            @if (request()->has('message'))
                <div class="alert alert-danger">
                    {{ request()->query('message') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3 col-sm-4 ">

                    <div class="hot-properties hidden-xs">
                        <h4>Hot Properties</h4>
                        @foreach($hot_properties as $hot_property)
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"><img src="{{asset($hot_property->images[0]['image_path'])}}" class="img-responsive img-circle" alt="properties"/></div>
                                <div class="col-lg-8 col-sm-7">
                                    <h5><a href="#">{{$hot_property['name']}}</a></h5>
                                    <p class="price">Rs.{{$hot_property['price']}}</p> </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-9 col-sm-8">
                    <div class="row">
                        @foreach ($properties as $property)
                            <!-- properties -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder"><img src="{{ asset($property->images[0]['image_path']) }}" class="img-responsive" alt="properties">
                                        <div class="status sold">Sold</div>
                                    </div>
                                    <h4><a href="{{ route('seller_property_detail', ['id' => $property['id']]) }}">{{ $property['name'] }}</a></h4>
                                    <p class="price">Price: Rs.{{ $property['price'] }}</p>
                                    <div class="listing-detail">
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{ $property['bed'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{ $property['living_room'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{ $property['parking'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{ $property['kitchen'] }}</span>
                                    </div>
                                    <a class="btn btn-primary" href="{{ route('seller_property_detail', ['id' => $property['id']]) }}">View Details</a>
                                    <a class="btn btn-primary" style="margin-top: 5px" href="{{ route('seller_property_permissions', ['id' => $property['id']]) }}">Set Permissions</a>
                                </div>
                            </div>
                            <!-- properties -->
                        @endforeach
                    </div>
                    <div class="center">
                        {{ $properties->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
