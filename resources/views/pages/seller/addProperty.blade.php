@extends('layouts.main')

@section('nav_line_item')
    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('seller_index') }}">Home</a></li>
    <li class="{{ Request::is('agents') ? 'active' : '' }}"><a href="{{ route('agents') }}">Agents</a></li>
    <li class="{{ Request::is('seller_my_agents') ? 'active' : '' }}"><a href="{{ route('seller_my_agents') }}">My Agents</a></li>
@endsection

@section('content')
    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{route('index')}}">Home</a> / Add-Property</span>
            <h2>Add Property</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row register">
                <div>
                    <form method="POST" action="{{ route('seller_submit_property') }}">
                        @csrf

                        {{--        First Row         --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="property_name">Property name</label>
                                    <input type="text" name="property_name" class="form-control" id="property_name" placeholder="Enter the Property name" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="property_price">Price in Rs.</label>
                                    <input type="number" name="property_price" class="form-control" id="property_price" placeholder="Enter the price of property" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="no_bed">No. Of Bed</label>
                                    <input type="number" name="no_bed" class="form-control" id="no_bed" placeholder="No. of Bed" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="no_room">No. Of Leaving Room</label>
                                    <input type="number" name="no_room" class="form-control" id="no_room" placeholder="No. of Leaving Room" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="no_parking">No. Of Parking</label>
                                    <input type="number" name="no_parking" class="form-control" id="no_parking" placeholder="No. of Parking" required>
                                </div>
                            </div>
                        </div>

                        {{--        Second Row         --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="images">Images</label>
                                    <input class="form-control" type="file" id="images" multiple>
{{--                                    <input type="text" name="field1" class="form-control" id="exampleInputField1" placeholder="Field 1" required>--}}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="" selected disabled hidden>Select status</option>
                                        <option value="new">New</option>
                                        <option value="old">Old</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="images">Location City</label>
                                    <input type="text" name="location" class="form-control" id="location" placeholder="Enter Location" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-label" for="act">Act as seller</label>
                                    <select class="form-control" name="act" required>
                                        <option value="" selected disabled hidden>Select Act</option>
                                        <option value="new">Yes</option>
                                        <option value="old">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{--         3rd Row               --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">Address</label>
                                    <textarea rows="6" class="form-control" placeholder="Enter Address of property" name="address" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea rows="6" class="form-control" placeholder="Enter Description of property" name="description" required></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Add</button>
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
                    }, 5000); // Adjust the time in milliseconds (5 seconds in this example)
                }
            });
        </script>
    @endif
@endsection
