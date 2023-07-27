<div class="footer">

    <div class="container">



        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Information</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{route('index')}}">Home</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{route('about')}}">About</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>
                <form class="form-inline" role="form" action="{{ route('index') }}" method="GET">
                    <input type="text" name="email" placeholder="Enter Your email address" class="form-control" required>
                    <input type="hidden" name="message" value="Your Email has Successfully Sent.">
                    <button class="btn btn-success" type="submit">Notify Me!</button>
                </form>


            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Follow us</h4>
                <a href="#"><img src="{{asset('assets/images/facebook.png')}}" alt="facebook"></a>
                <a href="#"><img src="{{asset('assets/images/twitter.png')}}" alt="twitter"></a>
                <a href="#"><img src="{{asset('assets/images/linkedin.png')}}" alt="linkedin"></a>
                <a href="#"><img src="{{asset('assets/images/instagram.png')}}" alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                <p><b>Narowal property dealing</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span> Address University of Narowal, Narowal <br>
                    <span class="glyphicon glyphicon-envelope"></span> narowalproperty@gmail.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> +923098551018</p>
            </div>
        </div>
        <p class="copyright">Copyright 2023. All rights reserved.	</p>


    </div></div>




<!-- Modal -->
{{--<div id="loginpop" class="modal fade">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6 login">--}}
{{--                    <h4>Login</h4>--}}
{{--                    <form method="POST" action="{{route('login')}}">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <select class="form-control" name="role" required>--}}
{{--                                <option value="" selected disabled hidden>Select Role</option>--}}
{{--                                <option value="admin">Admin</option>--}}
{{--                                <option value="seller">Seller</option>--}}
{{--                                <option value="dealer">Dealer</option>--}}
{{--                                <option value="buyer">Buyer</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="sr-only" for="exampleInputEmail2">Email address</label>--}}
{{--                            <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" required>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="sr-only" for="exampleInputPassword2">Password</label>--}}
{{--                            <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>--}}
{{--                        </div>--}}

{{--                        <div class="checkbox">--}}
{{--                            <label>--}}
{{--                                <input type="checkbox"> Remember me--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-success">Sign in</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h4>New User Sign Up</h4>--}}
{{--                    <p>Join today and get updated with all the properties deal happening around.</p>--}}
{{--                    <a href="{{ route('register') }}" class="btn btn-info">Join Now</a>--}}
{{--                    <button type="submit" class="btn btn-info"  onclick="window.location.href='register.blade.php'">Join Now</button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- /.modal -->
