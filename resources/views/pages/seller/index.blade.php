@extends('layouts.main')

@section('content')
        <!-- banner -->
        <div class="container">
            <div class="properties-listing spacer"> <a href="{{route('buysalerent')}}" class="pull-right viewall">View All Listing</a>
                <h2>My Properties</h2>
                <div id="owl-example" class="owl-carousel">
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/1.jpg')}}" class="img-responsive" alt="properties"/>
                            <div class="status sold">Sold</div>
                        </div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/2.jpg')}}" class="img-responsive" alt="properties"/>
                            <div class="status new">New</div>
                        </div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/3.jpg')}}" class="img-responsive" alt="properties"/></div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/4.jpg')}}" class="img-responsive" alt="properties"/></div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/1.jpg')}}" class="img-responsive" alt="properties"/>
                            <div class="status sold">Sold</div>
                        </div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/2.jpg')}}" class="img-responsive" alt="properties"/>
                            <div class="status sold">Sold</div>
                        </div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/3.jpg')}}" class="img-responsive" alt="properties"/>
                            <div class="status new">New</div>
                        </div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/4.jpg')}}" class="img-responsive" alt="properties"/></div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/1.jpg')}}" class="img-responsive" alt="properties"/></div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/2.jpg')}}" class="img-responsive" alt="properties"/></div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                    <div class="properties">
                        <div class="image-holder"><img src="{{asset('assets/images/properties/3.jpg')}}" class="img-responsive" alt="properties"/></div>
                        <h4><a href="{{route('property-detail')}}">Royal Inn</a></h4>
                        <p class="price">Price: $234,900</p>
                        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
                        <a class="btn btn-primary" href="{{route('property-detail')}}">View Details</a>
                    </div>
                </div>
                <a class="btn btn-success" href="{{route('seller_add_property')}}">Add New Property</a>
            </div>
        </div>
@endsection
