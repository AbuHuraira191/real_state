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
            <span class="pull-right"><a href="{{ route('admin_index') }}">Home</a> / Detail</span>
            <h2>Property Details Of {{$property['name']}}</h2>
        </div>

    </div>
    <!-- banner -->


    <div class="container">
        <div class="properties-listing spacer">

            <div class="row">
                <div class="col-lg-3 col-sm-4 hidden-xs">

                    <div class="hot-properties hidden-xs">
                        <h4>Hot Properties</h4>
                        @foreach($hot_properties as $hot_property)
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"><img src="{{asset($hot_property->images[0]['image_path'])}}" class="img-responsive img-circle" alt="properties"/></div>
                                <div class="col-lg-8 col-sm-7">
                                    <h5><a href="#">{{$hot_property['name']}}</a></h5>
                                    <p class="price">Rs.{{$hot_property['price']}}</p> </div>
                            </div>
                        @endforeach
                    </div>



                    <div class="advertisement">
                        <h4>Advertisements</h4>
                        <img src="{{asset('assets/images/advertisements.jpg')}}" class="img-responsive" alt="advertisement">

                    </div>

                </div>

                <div class="col-lg-9 col-sm-8 ">

                    <h2>{{$property['living_room']}} living room and {{$property['bed']}}  bed property</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="property-images">
                                <!-- Slider Starts -->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators hidden-xs">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        @if(count($property->images) > 1)
                                            <?php
                                                $i=1;
                                            ?>
                                            @foreach($property->images as $image)
                                                <li data-target="#myCarousel" data-slide-to="{{$i}}" class=""></li>

                                                <?php
                                                    $i++;
                                                ?>
                                            @endforeach
                                        @endif
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php
                                        $j=1;
                                        ?>
                                        @foreach($property->images as $image)
                                            @if($j === 1)
                                                <div class="item active">
                                                    <img src="{{asset($image['image_path'])}}" class="properties" alt="properties" />
                                                </div>
                                            @else
                                                <div class="item">
                                                    <img src="{{asset($image['image_path'])}}" class="properties" alt="properties" />
                                                </div>
                                            @endif

                                            <?php
                                                $j++;
                                            ?>
                                        @endforeach
                                    </div>
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>

                                <!-- #Slider Ends -->
                            </div>

                            <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
                                <p>{{$property['detail']}}</p>
                            </div>
                            <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
                                <div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12  col-sm-6">
                                <div class="property-info">
                                    <p class="price">Rs. {{$property['price']}}</p>
                                    <p class="area"><span class="glyphicon glyphicon-map-marker"></span> {{$property['address']}}, {{$property['location_city']}}</p>

                                    <div class="profile">
                                        <span class="glyphicon glyphicon-user"></span> Dealer Details
                                        <p>{{$dealer_detail['name']}}<br>{{$dealer_detail['phone']}}</p>
                                    </div>
                                </div>

                                <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
                                <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property['bed']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property['living_room']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property['parking']}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property['kitchen']}}</span> </div>

                            </div>
                            <div class="col-lg-12 col-sm-6 ">
                                <div class="enquiry">
                                    <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
                                    <form  class="form-inline" role="form" action="{{ route('admin_index') }}" method="GET">
                                        <input type="text" class="form-control" placeholder="Full Name"/>
                                        <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                                        <input type="text" class="form-control" placeholder="your number"/>
                                        <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
                                        <input type="hidden" name="message" value="Your Email has Successfully Sent.">
                                        <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
