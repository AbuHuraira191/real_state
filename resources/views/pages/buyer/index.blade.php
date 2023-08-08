@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('buyer_index') ? 'active' : '' }}"><a href="{{ route('buyer_index') }}">Home</a></li>
    <li class="{{ Request::is('buyer_property_list') ? 'active' : '' }}"><a href="{{ route('buyer_property_list') }}">All Properties</a></li>
{{--    <li class="{{ Request::is('buyer_index') ? 'active' : '' }}"><a href="{{ route('buyer_index') }}">My Bid Properties</a></li>--}}
@endsection

@section('content')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{route('dealer_index')}}">Home</a> / Dealer dashboard</span>
            <h2>Welcome On Buyer Dashboard: {{$user_data['name']}}</h2>
        </div>
    </div>
    <!-- banner -->

    <div class="container">
        <a style="margin-top: 10px" href="{{route('buyer_property_list')}}" class="pull-right viewall">View All Listing</a>
        <div class="properties-listing spacer">
            @if (request()->has('message'))
                <div class="alert alert-danger">
                    {{ request()->query('message') }}
                </div>
            @endif
            <div id="owl-example" class="owl-carousel">
                @if ($properties->isEmpty())
                    <p style="text-align: center"><strong>There is No Property present for bid yet.</strong></p>
                    <div class="sad-icon">
                        <img src="{{asset('assets/images/sad-icon.png')}}" alt="Sad Icon">
                    </div>
                @else
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
                @endif
            </div>
        </div>
    </div>
    <div style="margin-bottom: 175px"></div>
@endsection
