@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('dealer_index') ? 'active' : '' }}"><a href="{{ route('dealer_index') }}">Home</a></li>
    <li class="{{ Request::is('dealer_my_sellers') ? 'active' : '' }}"><a href="{{ route('dealer_my_sellers') }}">My Seller</a></li>
    <li class="{{ Request::is('dealer_leading_properties') ? 'active' : '' }}"><a href="{{ route('dealer_leading_properties') }}">My Properties</a></li>
@endsection

@section('content')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="#">Home</a> / Sellers</span>
            <h2>My Sellers</h2>
        </div>
    </div>
    <!-- banner  dealers -->


    <div class="container">
        <div class="properties-listing spacer">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($sellers as $seller)
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder"><img src="{{asset('assets/images/properties/dealer.png')}}" style="height: 40%;width: 40%" alt="properties">
                                    </div>
                                    <h4><a>{{$seller['name']}}</a></h4>
                                    <p class="price">Phone: {{$seller['phone']}}</p>
                                    <p class="price">Email: {{$seller['email']}} </p>
                                </div>
                            </div>
                        @endforeach

                        <div class="center">
                            <ul class="pagination">
                                {{ $sellers->links() }}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 175px"></div>
@endsection
