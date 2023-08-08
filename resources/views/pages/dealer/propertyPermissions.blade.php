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
                            <select class="form-control" name="status" required onchange="handleStatusChange(this)">
                                <option value="" selected disabled hidden>Select Status</option>
                                <option value="Sold">Sold</option>
                                <option value="For-Sale">For Sale</option>
                            </select>

                            <label class="form-label" for="bid_status">Select Bid Status</label>
                            <select class="form-control" id="bid_status" name="bid_status" disabled onchange="handleBidStatusChange(this)">
                                <option value="" selected disabled hidden>Select Bid Status</option>
                                <option value="on">Open</option>
                                <option value="off">Close</option>
                            </select>

                            <label class="form-label" for="bid_status">Start Bid Date</label>
                            <input type="date" id="on_bid_date" name="on_bid_date" class="form-control" min="<?= date('Y-m-d') ?>" disabled>

                            <label for="close_bid_date">Close Bid Date:</label>
                            <input type="date" id="close_bid_date" name="close_bid_date" class="form-control" disabled>

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
@section('script')
    <script>
        const onBidDateInput = document.getElementById("on_bid_date");
        const closeBidDateInput = document.getElementById("close_bid_date");

        function handleStatusChange(statusSelect) {
            const bidStatusSelect = document.getElementById("bid_status");

            // Reset Bid Status and other fields when For Sale is selected
            if (statusSelect.value === "Sold") {
                // If Sold is selected, disable all fields and remove the required attribute
                bidStatusSelect.disabled = true;
                onBidDateInput.disabled = true;
                closeBidDateInput.disabled = true;

                bidStatusSelect.value = "";
                onBidDateInput.value = "";
                closeBidDateInput.value = "";

                bidStatusSelect.removeAttribute("required");
                onBidDateInput.removeAttribute("required");
                closeBidDateInput.removeAttribute("required");
            }
            else if (statusSelect.value === "For-Sale") {
                bidStatusSelect.disabled = false;
                onBidDateInput.disabled = true;
                closeBidDateInput.disabled = true;

                onBidDateInput.value = "";
                closeBidDateInput.value = "";

                bidStatusSelect.setAttribute("required", "required");
                onBidDateInput.removeAttribute("required");
                closeBidDateInput.removeAttribute("required");
            } else {
                bidStatusSelect.removeAttribute("required");
                enableCloseBidDate();

                // Call handleBidStatusChange to handle bid status change for Sold
                handleBidStatusChange(bidStatusSelect);
            }
        }

        function handleBidStatusChange(bidStatusSelect) {
            if (bidStatusSelect.value === "on") {
                // If Open is selected, enable Start Bid Date and disable Close Bid Date
                onBidDateInput.disabled = false;
                closeBidDateInput.disabled = true;

                closeBidDateInput.value = "";

                onBidDateInput.setAttribute("required", "required");
                closeBidDateInput.removeAttribute("required");

                // Set the minimum date for onBidDateInput to the current date
                onBidDateInput.min = new Date().toISOString().split("T")[0];

                // Enable event listener for the Start Bid Date input
                onBidDateInput.addEventListener("change", () => {
                    const onBidDateValue = new Date(onBidDateInput.value);
                    const closeBidDateValue = new Date(closeBidDateInput.value);

                    if (closeBidDateValue <= onBidDateValue) {
                        closeBidDateInput.value = ""; // Clear the Close Bid Date if it's invalid
                    }
                    enableCloseBidDate();
                });
            } else if (bidStatusSelect.value === "off") {
                // If Close is selected, disable both Start Bid Date and Close Bid Date
                onBidDateInput.disabled = true;
                closeBidDateInput.disabled = true;

                onBidDateInput.value = "";
                closeBidDateInput.value = "";

                onBidDateInput.removeAttribute("required");
                closeBidDateInput.removeAttribute("required");

                // Disable event listener for the Start Bid Date input
                onBidDateInput.removeEventListener("change", () => {});
            }
        }

        function enableCloseBidDate() {
            // Enable the Close Bid Date input only if the Start Bid Date is selected and valid
            const onBidDateValue = new Date(onBidDateInput.value);
            if (onBidDateValue && !isNaN(onBidDateValue)) {
                closeBidDateInput.disabled = false;

                // Disable dates that are greater than or equal to the Start Bid Date
                closeBidDateInput.setAttribute("min", onBidDateInput.value);
            } else {
                closeBidDateInput.disabled = true;
                closeBidDateInput.value = ""; // Clear the Close Bid Date if Start Bid Date is empty
            }
        }

        // Ensure the Close Bid Date input is initially disabled
        enableCloseBidDate();
    </script>
@endsection
