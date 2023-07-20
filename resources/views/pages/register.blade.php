@extends('layouts.master')

@section('content')

    <!-- banner -->
    <div class="inside-banner">
        <div class="container">
            <span class="pull-right"><a href="{{route('index')}}">Home</a> / Register</span>
            <h2>Register</h2>
        </div>
    </div>
    <!-- banner -->


    <div class="container">
        <div class="spacer">
            <div class="row register">
                <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                    <form method="POST" action="{{route('signup')}}">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="role" required>
                                <option value="" selected disabled hidden>Select Role</option>
                                <option value="seller">Seller</option>
                                <option value="dealer">Dealer</option>
                                <option value="buyer">Buyer</option>
                            </select>
                        </div>


                        <input type="text" class="form-control" placeholder="Full Name" name="name" required>
{{--                        @error('name')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}

                        <input type="text" class="form-control" placeholder="Enter Email" name="email" required>


                        <input type="number" class="form-control" placeholder="Phone No." name="phone" required>


                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <input type="password" class="form-control"  id="confirm_password" placeholder="Confirm Password" name="password_confirmation" required>


                        <input type="text" class="form-control" placeholder="Enter Address" name="address" required>


                        <textarea rows="6" class="form-control" placeholder="Enter About your seld detail" name="about" required></textarea>


                        <button type="submit" class="btn btn-success" name="Submit">Register</button>
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
