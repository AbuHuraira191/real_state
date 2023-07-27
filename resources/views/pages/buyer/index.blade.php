@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('buyer_index') ? 'active' : '' }}"><a href="{{ route('buyer_index') }}">Home</a></li>
    <li class="{{ Request::is('buyer_property_list') ? 'active' : '' }}"><a href="{{ route('buyer_property_list') }}">All Properties</a></li>
{{--    <li class="{{ Request::is('buyer_index') ? 'active' : '' }}"><a href="{{ route('buyer_index') }}">My Bid Properties</a></li>--}}
@endsection

@section('content')
    <div class="container">
        <div class="properties-listing spacer"> <a href="{{route('buyer_property_list')}}" class="pull-right viewall">View All Listing</a>
            <h2>Welcome On Buyer Dashboard : {{$user_data['name']}}</h2>
            @if (request()->has('message'))
                <div class="alert alert-danger">
                    {{ request()->query('message') }}
                </div>
            @endif
            <div id="owl-example" class="owl-carousel">
                @foreach($properties as $property)
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive" alt="properties" style="height: 175px">
                            <div class="status {{ $property['status'] === 'Sold' ? 'new' : 'sold' }}">{{$property['status']}}</div>
                        </div>
                        <h4><a href="{{route('buyer_property_detail',['id' => $property['id']])}}">{{$property['name']}}</a></h4>
                        <p class="price">Price: Rs.{{$property['price']}}</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property['bed']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property['living_room']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property['parking']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property['kitchen']}}</span> </div>
                        <a class="btn btn-primary" href="{{route('buyer_property_detail',['id' => $property['id']])}}">View Details</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div style="margin-bottom: 175px"></div>
@endsection
