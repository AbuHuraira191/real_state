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
            <span class="pull-right"><a href="{{route('seller_index')}}">Home</a> / Add-Property</span>
            <h2>Add Property</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row register">
                <div>
                    <form id="propertyForm" method="POST" action="{{ route('seller_submit_property') }}" enctype="multipart/form-data">
                        @csrf
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


                        {{--        First Row         --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="property_name">Property name</label>
                                    <input type="text" name="name" class="form-control" id="property_name" placeholder="Enter the Property name" required value="{{ old('name', $property['name'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="property_price">Price in Rs.</label>
                                    <input type="number" name="price" class="form-control" id="property_price" placeholder="Enter the price of property" required min="0" oninput="validity.valid||(value='');"  value="{{ old('price', $property['price'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="no_bed">No. Of Bed</label>
                                    <input type="number" name="bed" class="form-control" id="no_bed" placeholder="No. of Bed" required min="0" oninput="validity.valid||(value='');"  value="{{ old('bed', $property['bed'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="no_room">No. Of Leaving Room</label>
                                    <input type="number" name="room" class="form-control" id="no_room" placeholder="No. of Leaving Room" required min="0" oninput="validity.valid||(value='');"  value="{{ old('room', $property['living_room'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="no_parking">No. Of Parking</label>
                                    <input type="number" name="parking" class="form-control" id="no_parking" placeholder="No. of Parking" required min="0" oninput="validity.valid||(value='');"  value="{{ old('parking', $property['parking'] ?? '') }}">
                                </div>
                            </div>
                        </div>

                        {{--        Second Row         --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="images">Images</label>
                                    <input class="form-control" name="images[]" type="file" id="images" accept=".jpg,.jpeg,.png" multiple >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="type">Type</label>
                                    <select class="form-control" name="type" required>
                                        <option value="" selected disabled hidden>Select type</option>
                                        <option value="new" {{ (old('type', $property['type'] ?? '') == 'new') ? 'selected' : '' }}>New</option>
                                        <option value="old" {{ (old('type', $property['type'] ?? '') == 'old') ? 'selected' : '' }}>Old</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="location">Location City</label>
                                    <input type="text" name="location_city" class="form-control" id="location" placeholder="Enter Location" required  value="{{ old('location_city', $property['location_city'] ?? '') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="act">Act as dealer</label>
                                    <select class="form-control" name="act" required>
                                        <option value="" selected disabled hidden>Select Act</option>
{{--                                        <option value="dealer" {{ (!empty(old('act')) || isset($property['act_seller_id'])) ? 'selected' : '' }}>Yes</option>--}}
{{--                                        <option value="seller" {{ (!empty(old('act')) || isset($property['act_dealer_id'])) ? 'selected' : '' }}>No</option>--}}

                                        <option value="seller" {{ (old('act', $property['act_dealer_id'] ?? null) !== null) ? 'selected' : '' }}>No</option>
                                        <option value="dealer" {{ (old('act', $property['act_seller_id'] ?? null) !== null) ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="kitchen">No. Of kitchen</label>
                                    <input type="number" name="kitchen" class="form-control" id="kitchen" placeholder="No. Of kitchen" required min="0" oninput="validity.valid||(value='');"  value="{{ old('kitchen', $property['kitchen'] ?? '') }}">
                                </div>
                            </div>
                        </div>

                        {{--         3rd Row               --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">Address</label>
                                    <textarea rows="6" class="form-control" placeholder="Enter Address of property" name="address" required>{{ old('address', $property['address'] ?? '') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea rows="6" class="form-control" placeholder="Enter Description of property" name="detail" required>{{ old('detail', $property['detail'] ?? '') }}</textarea>
                                </div>

                                <input type="hidden" name="id" value="{{ $property->id ?? -1 }}">

                            @if(isset($property) && $property)
{{--                                    <a href="{{ route('seller_property_detail', ['id' => $property->id]) }}" class="btn btn-success">Back</a>--}}
                                    <a href="{{ route('seller_index') }}" class="btn btn-success">Back</a>
                                @else
                                    <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                                @endif
                            </div>

                        </div>

{{--                        <button type="submit" class="btn btn-success">Add</button>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')
    @if ($errors->any())
        <script>
            // JavaScript to display the validation errors as an alert
            document.addEventListener('DOMContentLoaded', function () {
                const errorMessages = @json($errors->all());
                if (errorMessages.length > 0) {
                    const alertContainer = document.createElement('div');
                    alertContainer.classList.add('alert-container');
                    errorMessages.forEach(message => {
                        const alert = document.createElement('div');
                        alert.classList.add('alert', 'alert-danger');
                        alert.textContent = message;
                        alertContainer.appendChild(alert);
                    });
                    document.body.appendChild(alertContainer);

                    setTimeout(function () {
                        document.body.removeChild(alertContainer);
                    }, 10000); // Adjust the time in milliseconds (5 seconds in this example)
                }
            });
        </script>
    @endif
@endsection
