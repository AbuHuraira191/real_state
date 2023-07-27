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
            <span class="pull-right"><a href="#">Home</a> / Dealers</span>
            <h2>My Dealers</h2>
        </div>
    </div>
    <!-- banner  dealers -->


    <div class="container">
        <div class="properties-listing spacer">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($dealers as $dealer)
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder"><img src="{{asset('assets/images/properties/dealer.png')}}" style="height: 40%;width: 40%" alt="properties">
                                    </div>
                                    <h4><a>{{$dealer['name']}}</a></h4>
                                    <p class="price">Phone: {{$dealer['phone']}}</p>
                                    <p class="price">Email: {{$dealer['email']}} </p>
                                </div>
                            </div>
                        @endforeach

                        <div class="center">
                            <ul class="pagination">
                                {{ $dealers->links() }}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
