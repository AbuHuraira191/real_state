@extends('layouts.master')

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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="role" required>
                                <option value="" selected disabled hidden>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="seller">Seller</option>
                                <option value="dealer">Dealer</option>
                                <option value="buyer">Buyer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputField1">Field 1</label>
                                    <input type="text" name="field1" class="form-control" id="exampleInputField1" placeholder="Field 1" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputField2">Field 2</label>
                                    <input type="text" name="field2" class="form-control" id="exampleInputField2" placeholder="Field 2" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputField3">Field 3</label>
                                    <input type="text" name="field3" class="form-control" id="exampleInputField3" placeholder="Field 3" required>
                                </div>
                            </div>
                        </div>
                        <!-- Add more rows of fields here -->
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Sign in</button>
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
