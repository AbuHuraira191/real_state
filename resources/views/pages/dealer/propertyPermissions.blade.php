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
            <span class="pull-right"><a href="{{route('dealer_index')}}">Home</a> / property Permissions</span>
            <h2>Set Property Permissions</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row register">
                <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                    <form method="POST" action="{{route('dealer_property_permissions_Store')}}">
                        @csrf
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


                        <div class="form-group">
                            <label class="form-label" for="status">Select Status</label>
                            <select class="form-control" name="status" required>
                                <option value="" selected disabled hidden>Select Status</option>
                                    <option value="Sold">Sold</option>
                                    <option value="For-Sale">For Sale</option>
                            </select>

                            <label class="form-label" for="bid_status">Select Bid Status</label>
                            <select class="form-control" name="bid_status" required>
                                <option value="" selected disabled hidden>Select Bid Status</option>
                                <option value="on">Open</option>
                                <option value="off">Off</option>
                            </select>

                            <label class="form-label" for="bid_status">Enter Bid Date</label>
                            <input type="date" id="on_bid_date" name="on_bid_date" class="form-control" required>

                            <label for="close_bid_date">Close Bid Date:</label>
                            <input type="date" id="close_bid_date" name="close_bid_date" class="form-control" required>

                            <input type="hidden" name="property_id" value="{{ $property_id }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 175px">

    </div>

@endsection
