@extends('front.layout')

@push('styles')
@endpush

@section('content')
<!-- Wrap all page content here -->
<div id="wrap">
@include('front.navbar')
    <!-- Begin page content -->
    <div class="divider" id="home"></div>
    <div class="container">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="page-header text-center">
                <h1>Sticky Footer with Fly-in Navbar</h1>
            </div>
            <p class="lead text-center">
                Twitter Bootstrap is a front-end toolkit to rapidly build web applications.
            </p>
            <p class="text-center">
                Bootstrap is a framework that uses some of the latest browser techniques to provide you with stylish
                typography, navigation, buttons, tables, etc. One of the primary changes in Bootstrap 3 is an emphasis
                on Mobile-First responsive design. The goal is to elevate the mobile experience to a first-class citizen
                of the design process, because several billion mobile users is quite a large market to tap into. So,
                sites built with the current Bootstrap version target mobile devices and scale for larger screens
                depending on screen size.
            </p>
        </div>
    </div>
    <div class="divider" id="section2"></div>
    <div class="divider"></div>

    <div class="container" id="section3">
        <div class="col-sm-8 col-sm-offset-2 text-center">
            <h1>Mobile-first + Responsive</h1>

            <p>
                Instead of creating a unique version of the webpage for each desktop, mobile &amp; tablet, you can now
                create one design that works on all devices, browsers &amp; resolutions. Your designs will be future
                ready when a new table or phone size comes in the market, your designs will adapt itself and fit to the
                new screen size.
            </p>

            <hr>
            <img src="/assets/example/bg_smartphones.jpg" class="img-responsive">
            <hr>
        </div>
        <!--/col-->
    </div>
    <!--/container-->
<hr>
    <div class="container">
    <h1 class="text-center mb-3">Where In The World?</h1>
        <div class="row new_feed_post">
            <div class="news_cart"
                style="background-image: url({{asset('img/default.jpg')}});">
                <a href="">
                    <div class="news_article">
                        <strong>
                            <span><i class="fa-regular fa-calendar"></i></span>
                            17/June/2030<br>
                            <span><i class="fa-regular fa-clock"></i></span>
                            10:00
                        </strong>
                        <h4>
                            News title
                        </h4>
                        <br>
                        <h3>
                            $ 10
                        </h3>
                 </div></a>
            </div>  
            <div class="news_cart"
                style="background-image: url({{asset('img/default.jpg')}});">
                <a href="">
                    <div class="news_article">
                        <strong>
                            <span><i class="fa-regular fa-calendar"></i></span>
                            17/June/2030<br>
                            <span><i class="fa-regular fa-clock"></i></span>
                            10:00
                        </strong>
                        <h4>
                            News title
                        </h4>
                 </div></a>
            </div>  
            <div class="news_cart"
                style="background-image: url({{asset('img/default.jpg')}});">
                <a href="">
                    <div class="news_article">
                        <strong>
                            <span><i class="fa-regular fa-calendar"></i></span>
                            17/June/2030<br>
                            <span><i class="fa-regular fa-clock"></i></span>
                            10:00
                        </strong>
                        <h4>
                            News title
                        </h4>
                 </div></a>
            </div>  
        </div>
        <!--/row-->
    </div>
    <!--/container-->

    <div class="divider" id="section5"></div>

    <div class="row">

        <h1 class="text-center">Where In The World?</h1>
        <div id="map-canvas"></div>
        <hr>
        <div class="col-sm-8">

            <div class="row form-group">
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                        required="">
                </div>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="middleName" name="firstName" placeholder="Middle Name"
                        required="">
                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"
                        required="">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-5">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="col-xs-5">
                    <input type="email" class="form-control" name="phone" placeholder="Phone" required="">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-10">
                    <input type="homepage" class="form-control" placeholder="Website URL" required="">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-10">
                    <button class="btn btn-default pull-right">Contact Us</button>
                </div>
            </div>

        </div>
        <div class="col-sm-3 pull-right">

            <address>
                <strong>Iatek, LLC.</strong><br>
                795 Folsom Ave, Suite 600<br>
                Newport, RI 94107<br>
                P: (123) 456-7890
            </address>

            <address>
                <strong>Email Us</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
        </div>

    </div>
    <!--/row-->

    <div class="container">
        <div class="col-sm-8 col-sm-offset-2 text-center">
            <h2>Beautiful Bootstrap Templates</h2>

            <hr>
            <h4>
                We love templates. We love Bootstrap.
            </h4>
            <p>Get more free templates like this at the <a href="http://bootply.com">Bootstrap Playground

            </a>, Bootply.
            </p>
            <hr>
            <ul class="list-inline center-block">
                <li><a href="http://facebook.com/bootply"><img src="/assets/example/soc_fb.png"></a></li>
                <li><a href="http://twitter.com/bootply"><img src="/assets/example/soc_tw.png"></a></li>
                <li><a href="http://google.com/+bootply"><img src="/assets/example/soc_gplus.png"></a></li>
                <li><a href="http://pinterest.com/in1"><img src="/assets/example/soc_pin.png"></a></li>
            </ul>

        </div>
        <!--/col-->
    </div>
    <!--/container-->

</div>
<!--/wrap-->
@endsection

@push('scripts')
    <script>
        /* affix the navbar after scroll below header */
        $('#nav').affix({
            offset: {
                top: $('header').height() - $('#nav').height()
            }
        });


        google.maps.visualRefresh = true;
        
        var map;


        /*function initialize() {
            var mapOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);

                    var infowindow = new google.maps.InfoWindow({
                        map: map,
                        position: pos,
                        content: 'Location found using HTML5.'
                    });

                    map.setCenter(pos);
                }, function () {
                    handleNoGeolocation(true);
                });
            } else {
                // browser doesn't support geolocation
                handleNoGeolocation(false);
            }
        }

        function handleNoGeolocation(errorFlag) {
            if (errorFlag) {
                var content = 'Error: The Geolocation service failed.';
            } else {
                var content = 'Error: Your browser doesn\'t support geolocation.';
            }

            var options = {
                map: map,
                position: new google.maps.LatLng(60, 105),
                content: content
            };

            var infowindow = new google.maps.InfoWindow(options);
            map.setCenter(options.position);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
       */
    </script>
@endpush
