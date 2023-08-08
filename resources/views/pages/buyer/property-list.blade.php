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
            <span class="pull-right"><a href="{{route('buyer_index')}}">Home</a> / List</span>
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
                        @if ($hot_properties->isEmpty())
                            <p style="text-align: center"><strong>No Hot properties present yet.</strong></p>
                            <div class="sad-icon">
                                <img src="{{asset('assets/images/sad-icon.png')}}" alt="Sad Icon">
                            </div>
                        @else
                            @foreach($hot_properties as $property)
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"><img src="{{asset($property->images[0]['image_path'])}}" class="img-responsive img-circle" alt="properties"/></div>
                                <div class="col-lg-8 col-sm-7">
                                    <h5><a href="#">{{$property['name']}}</a></h5>
                                    <p class="price">Rs.{{$property['price']}}</p> </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-lg-9 col-sm-8">
                    <div class="row">
                        @if ($properties->isEmpty())
                            <p style="text-align: center"><strong>There is No Property present for bid yet.</strong></p>
                            <div class="sad-icon">
                                <img src="{{asset('assets/images/sad-icon.png')}}" alt="Sad Icon">
                            </div>
                        @else
                            @foreach ($properties as $property)
                            <!-- properties -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder"><img src="{{ asset($property->images[0]['image_path']) }}" class="img-responsive" alt="properties" style="height: 175px">
                                        <div class="status sold">Sold</div>
                                    </div>
                                    <h4><a href="{{ route('buyer_property_detail', ['id' => $property['id']]) }}">{{ $property['name'] }}</a></h4>
                                    <p class="price">Price: Rs.{{ $property['price'] }}</p>
                                    <div class="listing-detail">
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{ $property['bed'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{ $property['living_room'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{ $property['parking'] }}</span>
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{ $property['kitchen'] }}</span>
                                    </div>
                                    <a class="btn btn-primary" href="{{ route('buyer_property_detail', ['id' => $property['id']]) }}">View Details</a>
                                </div>
                            </div>
                            <!-- properties -->
                        @endforeach
                        @endif
                    </div>
                    <div class="center">
                        {{ $properties->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
