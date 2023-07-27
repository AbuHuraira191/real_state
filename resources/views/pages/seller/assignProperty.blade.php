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
            <span class="pull-right"><a href="{{route('seller_index')}}">Home</a> / Assign property</span>
            <h2>Assign Property To Dealer</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row register">
                <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                    <form method="POST" action="{{route('seller_assign_property_store')}}">
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
                            <label class="form-label" for="dealer_id">Select Dealer</label>
                            <select class="form-control" name="dealer_id" required>
                                <option value="" selected disabled hidden>Select Dealer</option>
                                @foreach($dealers as $dealer)
                                    <option value="{{$dealer['id']}}" @if(isset($id) && $id == $dealer['id']) selected @endif>{{$dealer['name']}}</option>
                                @endforeach
                            </select>

                            <label class="form-label" for="dealer_id">Select Property</label>
                            <select class="form-control" name="property_id" required>
                                <option value="" selected disabled hidden>Select Your Property</option>
                                @foreach($properties as $property)
                                    <option value="{{$property['id']}}">{{$property['name']}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="seller_id" value="{{ $seller_id }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Assign Him/her</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 175px">

    </div>

@endsection
