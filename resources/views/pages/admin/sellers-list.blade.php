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
            <span class="pull-right"><a href="{{route('admin_index')}}">Home</a> / Sellers</span>
            <h2>All Sellers</h2>
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
                                    <a style="margin-top: 10px" class="btn btn-primary" href="{{route('admin_deleteSeller',['id' => $seller['id']])}}">Delete Seller</a>
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
