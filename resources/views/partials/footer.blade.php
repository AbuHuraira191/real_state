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
                    <!-- Create the WhatsApp link -->
                    <a href="https://wa.me/+923222710071" target="_blank">
                        <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                    </a>
            </div>
        </div>
        <p class="copyright">Copyright 2023. All rights reserved.	</p>
    </div></div>
