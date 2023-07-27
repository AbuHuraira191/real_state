@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('seller_index') ? 'active' : '' }}"><a href="{{ route('seller_index') }}">Home</a></li>
    <li class="{{ Request::is('seller_leading_properties') ? 'active' : '' }}"><a href="{{ route('seller_leading_properties') }}">Leading Own Properties</a></li>
    <li class="{{ Request::is('seller_all_dealers') ? 'active' : '' }}"><a href="{{ route('seller_all_dealers') }}">Dealers</a></li>
    <li class="{{ Request::is('seller_assign_property') ? 'active' : '' }}"><a href="{{ route('seller_assign_property') }}">Assign Property</a></li>
    <li class="{{ Request::is('seller_my_dealers') ? 'active' : '' }}"><a href="{{ route('seller_my_dealers') }}">My Dealers</a></li>
@endsection

@section('content')

        <div class="container">
            <div class="properties-listing spacer"> <a href="{{route('seller_property_list')}}" class="pull-right viewall">View All Listing</a>
                <h2>Welcome On Seller Dashboard: {{$user_data['name']}}</h2>
                @if (request()->has('message'))
                    <div class="alert alert-danger">
                        {{ request()->query('message') }}
                    </div>
                @endif
                <div id="owl-example" class="owl-carousel">
                    @foreach($properties as $property)
                        <div class="properties">
                            <div class="image-holder"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive" alt="properties"/>
                                <div class="status {{ $property['status'] === 'Sold' ? 'new' : 'sold' }}">{{$property['status']}}</div>
                            </div>
                            <h4><a href="{{route('seller_property_detail',['id' => $property['id']])}}">{{$property['name']}}</a></h4>
                            <p class="price">Price: Rs.{{$property['price']}}</p>
                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property['bed']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property['living_room']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property['parking']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property['kitchen']}}</span> </div>
                            <a class="btn btn-primary" href="{{route('seller_property_detail',['id' => $property['id']])}}">View Details</a>
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-success" href="{{route('seller_add_property')}}">Add New Property</a>
            </div>
        </div>
        <div style="margin-bottom: 175px"></div>
@endsection
