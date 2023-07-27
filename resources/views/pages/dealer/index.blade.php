@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('dealer_index') ? 'active' : '' }}"><a href="{{ route('dealer_index') }}">Home</a></li>
    <li class="{{ Request::is('my-dealer_my_sellers') ? 'active' : '' }}"><a href="{{ route('dealer_my_sellers') }}">My Seller</a></li>
    <li class="{{ Request::is('dealer_leading_properties') ? 'active' : '' }}"><a href="{{ route('dealer_leading_properties') }}">My Properties</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="properties-listing spacer"> <a href="{{route('dealer_property_list')}}" class="pull-right viewall">View All Listing</a>
            <h2>Welcome On Dealer Dashboard: {{$user_data['name']}}</h2>
            @if (request()->has('message'))
                <div class="alert alert-danger">
                    {{ request()->query('message') }}
                </div>
            @endif
            <div id="owl-example" class="owl-carousel">
                @if ($properties->isEmpty())
                    <p>No properties available.</p>
                @else
                    @foreach($properties as $property)
                        <div class="properties">
                            <div class="image-holder"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive" alt="properties"/>
                                <div class="status {{ $property['status'] === 'Sold' ? 'new' : 'sold' }}">{{$property['status']}}</div>
                            </div>
                            <h4><a href="{{route('dealer_property_detail',['id' => $property['id']])}}">{{$property['name']}}</a></h4>
                            <p class="price">Price: Rs.{{$property['price']}}</p>
                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property['bed']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property['living_room']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property['parking']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property['kitchen']}}</span> </div>
                            <a class="btn btn-primary" href="{{route('dealer_property_detail',['id' => $property['id']])}}">View Details</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div style="margin-bottom: 175px"></div>
@endsection
