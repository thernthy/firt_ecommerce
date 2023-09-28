@extends('front.layout')

@push('styles')
@endpush

@section('content')
<!-- Wrap all page content here -->
<div id="wrap">
@include('front.navbar')
    <!-- Begin page content -->
    <div class="divider" id="section1"></div>
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
    <section class="bg-1">
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <h2 style="padding:20px;background-color:rgba(5,5,5,.8)">Try and Tweak Different Layouts</h2>
        </div>
    </section>
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
    <div class="divider"></div>
    <section class="bg-3" id="section4">
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <h2 style="padding:20px;background-color:rgba(5,5,5,.8)">Leverage Snippets &amp; Examples</h2>
        </div>
    </section>
    <div class="continer bg-4">
        <div class="row">
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div><img src="//placehold.it/450X250/565656/eee" class="img-responsive"></div>
                    <div class="panel-body">
                        <p class="lead">Hacker News</p>
                        <p>120k Followers, 900 Posts</p>

                        <p>
                            <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                        </p>
                    </div>
                </div>
                <!--/panel-->
            </div>
            <!--/col-->
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-thumbnail"><img src="//placehold.it/450X250/ffcc33/444" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <p class="lead">Bootstrap Templates</p>
                        <p>902 Followers, 88 Posts</p>
                        <p>
                            <img src="https://lh5.googleusercontent.com/-AQznZjgfM3E/AAAAAAAAAAI/AAAAAAAAABA/WEPOnkQS_20/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                        </p>
                    </div>
                </div>
                <!--/panel-->
            </div>
            <!--/col-->
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-thumbnail"><img src="//placehold.it/450X250/f16251/444" class="img-responsive">
                    </div>
                    <div class="panel-body">
                        <p class="lead">Social Media</p>
                        <p>19k Followers, 789 Posts</p>
                        <p>
                            <img src="https://lh4.googleusercontent.com/-eSs1F2O7N1A/AAAAAAAAAAI/AAAAAAAAAAA/caHwQFv2RqI/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                            <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg"
                                width="28px" height="28px">
                        </p>
                    </div>
                </div>
                <!--/panel-->
            </div>
            <!--/col-->
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
            <p>Get more free templates like this at the <a href="http://bootply.com">Bootstrap Playground</a>, Bootply.
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
<!--/wrap-->≈
@endsection

@push('scripts')
    <script>
        /* affix the navbar after scroll below header */
        $('#nav').affix({
            offset: {
                top: $('header').height() - $('#nav').height()
            }
        });

        /* highlight the top nav as scrolling occurs */
        $('body').scrollspy({
            target: '#nav'
        })

        /* smooth scrolling for scroll to top */
        $('.scroll-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
        })

        /* smooth scrolling for nav sections */
        $('#nav .navbar-nav li>a').click(function () {
            var link = $(this).attr('href');
            var posi = $(link).offset().top + 20;
            $('body,html').animate({
                scrollTop: posi
            }, 700);
        })

        /* google maps */

        // enable the visual refresh
        google.maps.visualRefresh = true;

        var map;

        function initialize() {
            var mapOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            // try HTML5 geolocation
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

    </script>
@endpush
