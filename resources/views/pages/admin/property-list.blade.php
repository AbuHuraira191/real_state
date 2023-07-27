@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('admin_index') ? 'active' : '' }}"><a href="{{ route('admin_index') }}">Home</a></li>
    <li class="{{ Request::is('admin_allDealers') ? 'active' : '' }}"><a href="{{ route('admin_allDealers') }}">Dealers</a></li>
    <li class="{{ Request::is('admin_allSellers') ? 'active' : '' }}"><a href="{{ route('admin_allSellers') }}">Sellers</a></li>
    <li class="{{ Request::is('admin_allBuyers') ? 'active' : '' }}"><a href="{{ route('admin_allBuyers') }}">Buyers</a></li>
    <li class="{{ Request::is('admin_property_list') ? 'active' : '' }}"><a href="{{ route('admin_property_list') }}">All Properties</a></li>
@endsection

@section('content')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{route('admin_index')}}">Home</a> / List</span>
            <h2>List Of Properties</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="properties-listing spacer">
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
                        @foreach($hot_properties as $property)
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive img-circle" alt="properties"/></div>
                                <div class="col-lg-8 col-sm-7">
                                    <h5><a href="#">{{$property['name']}}</a></h5>
                                    <p class="price">Rs.{{$property['price']}}</p> </div>
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
                                    <div class="image-holder"><img src="{{ asset($property->images[0]['image_path']) }}" class="img-responsive" alt="properties" style="height: 175px">
                                        <div class="status sold">Sold</div>
                                    </div>
                                    <h4><a href="{{ route('admin_property_detail', ['id' => $property['id']]) }}">{{ $property['name'] }}</a></h4>
                                    <p class="price">Price: Rs.{{ $property['price'] }}</p>
                                    <div class="listing-detail">
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{ $property['bed'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{ $property['living_room'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{ $property['parking'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{ $property['kitchen'] }}</span>
                                    </div>
                                    <a class="btn btn-primary" href="{{ route('admin_property_detail', ['id' => $property['id']]) }}">View Details</a>
                                    <a style="margin-top: 10px" class="btn btn-primary" href="{{route('admin_property_delete',['id' => $property['id']])}}">Delete Property</a>
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
