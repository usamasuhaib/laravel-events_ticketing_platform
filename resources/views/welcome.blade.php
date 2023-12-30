<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title>GB Events</title>
    <meta name="description" content="Event Ticketing Plateform" />
    <meta name="keywords"
        content="Events, Events in Gilgit Baltistan,  Conference, Seminar, Sports Gala, Cultural Festival, GB Culture" />


    <!--  FAVICON AND TOUCH ICONS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend-assets/img/my-favicon1.png') }}">


    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/bootstrap/css/bootstrap.min.css') }}" media="all" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/fontawesome/css/font-awesome.min.css') }}"
        media="all" />
    <script src="https://kit.fontawesome.com/d75d46c424.js" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/maginificpopup/magnific-popup.css') }}"
        media="all" />



    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/owlcarousel/owl.carousel.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/owlcarousel/owl.theme.default.min.css') }}"
        media="all" />

    <!-- GOOGLE FONT -->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600;700;800&family=Urbanist:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- MASTER  STYLESHEET  -->
    <link id="lgx-master-style" rel="stylesheet" href="{{ asset('frontend-assets/css/master-style.css') }}"
        media="all" />

    <!-- MODERNIZER CSS  -->
    <script src="{{ asset('frontend-assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body class="home">

    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

    <div class="lgx-container ">
        <!-- ***  ADD YOUR SITE CONTENT HERE *** -->


        <!--HEADER-->
        <header>
            <div id="lgx-header" class="lgx-header">
                <div class="lgx-header-position lgx-header-position-white lgx-header-position-fixed ">
                    <div class="top-navbar lgx-container"> <!--lgx-container-fluid-->
                        <nav class="navbar navbar-default lgx-navbar">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="lgx-logo">
                                    <a href="{{ route('welcome') }}" class="lgx-scroll">
                                        <img src="{{ asset('frontend-assets/img/gb-events-logo2.png') }}"
                                            alt="GB Events Logo" />
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <div class="lgx-nav-right navbar-right">
                                    <div class="lgx-cart-area">
                                        <a class="lgx-btn lgx-btn-" href="{{ route('user.type') }}">Sign in</a>
                                    </div>
                                </div>
                                <ul class="nav navbar-nav lgx-nav navbar-right">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a class="lgx-scroll" href="#lgx-schedule">Schedules</a></li>

                                    <li><a class="lgx-scroll" href="about.html">About us</a></li>
                                    <li><a class="lgx-scroll" href="contact.html">Contact</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </nav>
                    </div>
                    <!-- //.CONTAINER -->
                </div>
            </div>
        </header>
        <!--HEADER END-->


        <!--BANNER-->
        <section class="banner-section">

            <div class="main-banner">
                <div class="banner-heading">
                    <h1 id="heading-01">
                        Unleash the Excitement
                    </h1>
                    <h1 id="subheading">
                        Get Your Tickets to Extraordinary Events with Ease.
                    </h1>
                </div>

                <div class="banner-search-form">
                    <input type="text" placeholder="Find your perfect event...">
                    <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
                </div>

            </div>
        </section>
        <!--BANNER END-->


        <!--SCHEDULE-->
        <section>
            <div id="lgx-schedule" class="lgx-schedule">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading">Event Schedule</h2>
                                    <h3 class="subheading">Welcome to the dedicated to building remarkable Schedule!
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-tab lgx-tab2"> <!--lgx-tab2 lgx-tab-vertical-->
                                    <ul class="nav nav-pills lgx-nav lgx-nav-nogap lgx-nav-colorful">
                                        <!--lgx-nav-nogap lgx-nav-colorful-->
                                        <li class="active"><a data-toggle="pill" href="#home">
                                                <h3>First <span>Week</span></h3>
                                                <p><span>01 - 07 </span>Oct, 2023</p>
                                            </a></li>
                                        <li><a data-toggle="pill" href="#menu1">
                                                <h3>Second <span>Week</span></h3>
                                                <p><span>07 - 14 </span> Oct, 2023</p>
                                            </a></li>
                                        <li><a data-toggle="pill" href="#menu2">
                                                <h3>Third <span>Week</span></h3>
                                                <p><span>14 - 21 </span> Oct, 2023</p>
                                            </a></li>
                                        <li><a data-toggle="pill" href="#menu3">
                                                <h3>Fourth <span>Week</span></h3>
                                                <p><span>22 - 31 </span>Oct, 2023</p>
                                            </a></li>
                                    </ul>
                                    <div class="tab-content lgx-tab-content">


                                        <div id="home" class="tab-pane fade in active">

                                            <div class="panel-group" id="accordion" role="tablist"
                                                aria-multiselectable="true">

                                                <ul>
                                                    @foreach ($events as $index => $event)
                                                        <li>
                                                
                                                            {{-- Week 1 --}}
                                                            <div class="panel panel-default lgx-panel">
                                                                <div class="panel-heading" role="tab" id="heading{{ $index }}_week1">
                                                                    <div class="panel-title">
                                                                        <a role="button" data-toggle="collapse" href="#collapse{{ $index }}_week1" aria-expanded="false"
                                                                            aria-controls="collapse{{ $index }}_week1">
                                                                            <div class="lgx-single-schedule">
                                                                                <div class="author">
                                                                                    <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="100px"
                                                                                        height="100px">
                                                                                </div>
                                                                                <div class="schedule-info">
                                                                                    <h4 class="time">{{ $event->event_time }}</h4>
                                                                                    <h3 class="title">{{ $event->event_title }}</h3>
                                                                                    <h4 class="author-info">By <span>{{ $event->organizer->name }}</span></h4>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapse{{ $index }}_week1" class="panel-collapse collapse" role="tabpanel"
                                                                    aria-labelledby="heading{{ $index }}_week1">
                                                                    <div class="panel-body">
                                                                        <p class="text">{{ $event->description }}</p>
                                                                        <h4 class="location"><strong>Location:</strong> {{ $event->venue }}, <span>Pakistan</span></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                            {{-- Week 1 end --}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                
                                                

                                            </div>

                                        </div>


                                        {{-- week 2  --}}
                                        <div id="menu1" class="tab-pane fade">

                                            <div class="panel-group" id="accordion2" role="tablist"
                                                aria-multiselectable="true">
                                                <ul>
                                                    @foreach ($events as $index => $event)
                                                        <li>
                                                
                                                            {{-- Week 1 --}}
                                                            <div class="panel panel-default lgx-panel">
                                                                <div class="panel-heading" role="tab" id="heading{{ $index }}_week2">
                                                                    <div class="panel-title">
                                                                        <a role="button" data-toggle="collapse" href="#collapse{{ $index }}_week1" aria-expanded="false"
                                                                            aria-controls="collapse{{ $index }}_week2">
                                                                            <div class="lgx-single-schedule">
                                                                                <div class="author">
                                                                                    <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="100px"
                                                                                        height="100px">
                                                                                </div>
                                                                                <div class="schedule-info">
                                                                                    <h4 class="time">{{ $event->event_time }}</h4>
                                                                                    <h3 class="title">{{ $event->event_title }}</h3>
                                                                                    <h4 class="author-info">By <span>{{ $event->organizer->name }}</span></h4>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapse{{ $index }}_week2" class="panel-collapse collapse" role="tabpanel"
                                                                    aria-labelledby="heading{{ $index }}_week2">
                                                                    <div class="panel-body">
                                                                        <p class="text">{{ $event->description }}</p>
                                                                        <h4 class="location"><strong>Location:</strong> {{ $event->venue }}, <span>Pakistan</span></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                            {{-- Week 1 end --}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                

                                            </div>

                                        </div>


                                        <div id="menu2" class="tab-pane fade">

                                            <div class="panel-group" id="accordion3" role="tablist"
                                                aria-multiselectable="true">
                                                <ul>
                                                    @foreach ($events as $index => $event)
                                                        <li>
                                                
                                                            {{-- Week 3 --}}
                                                            <div class="panel panel-default lgx-panel">
                                                                <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                                                    <div class="panel-title">
                                                                        <a role="button" data-toggle="collapse" href="#collapse{{ $index }}" aria-expanded="false"
                                                                            aria-controls="collapse{{ $index }}">
                                                                            <div class="lgx-single-schedule">
                                                                                <div class="author">
                                                                                    <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="100px"
                                                                                        height="100px">
                                                                                </div>
                                                                                <div class="schedule-info">
                                                                                    <h4 class="time">{{ $event->event_time }}</h4>
                                                                                    <h3 class="title">{{ $event->event_title }}</h3>
                                                                                    <h4 class="author-info">By <span>{{ $event->organizer->name }}</span></h4>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapse{{ $index }}" class="panel-collapse collapse" role="tabpanel"
                                                                    aria-labelledby="heading{{ $index }}">
                                                                    <div class="panel-body">
                                                                        <p class="text">{{ $event->description }}</p>
                                                                        <h4 class="location"><strong>Location:</strong> {{ $event->venue }}, <span>Pakistan</span></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                            {{-- Week 4 end --}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>


                                        <div id="menu3" class="tab-pane fade">

                                            <div class="panel-group" id="accordion4" role="tablist"
                                                aria-multiselectable="true">
                                                <ul>
                                                    @foreach ($events as $index => $event)
                                                        <li>
                                                
                                                            {{-- Week 4 --}}
                                                            <div class="panel panel-default lgx-panel">
                                                                <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                                                    <div class="panel-title">
                                                                        <a role="button" data-toggle="collapse" href="#collapse{{ $index }}" aria-expanded="false"
                                                                            aria-controls="collapse{{ $index }}">
                                                                            <div class="lgx-single-schedule">
                                                                                <div class="author">
                                                                                    <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="100px"
                                                                                        height="100px">
                                                                                </div>
                                                                                <div class="schedule-info">
                                                                                    <h4 class="time">{{ $event->event_time }}</h4>
                                                                                    <h3 class="title">{{ $event->event_title }}</h3>
                                                                                    <h4 class="author-info">By <span>{{ $event->organizer->name }}</span></h4>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="collapse{{ $index }}" class="panel-collapse collapse" role="tabpanel"
                                                                    aria-labelledby="heading{{ $index }}">
                                                                    <div class="panel-body">
                                                                        <p class="text">{{ $event->description }}</p>
                                                                        <h4 class="location"><strong>Location:</strong> {{ $event->venue }}, <span>Pakistan</span></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                            {{-- Week 4 end --}}
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                    </div>
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </section>
        <!--SCHEDULE END-->



        <!--FOOTER-->
        <footer class="my-footer">

            <div class="footer-components">
                <div class="address">
                    <h3 id="footer-logo">GB Events</h3>
                    <p> <br> Gilgit Baltistan
                    </p>
                </div>
                <div class="links">
                    <h3>Links</h3>
                    <ul class="compnent-lists">
                        <li><a href="#">X</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Youtube</a></li>
                        <li><a href="#">Linkdin</a></li>
                    </ul>
                </div>
                <div class="company">
                    <h3>Company</h3>
                    <ul class="compnent-lists">
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">contacts</a></li>
                    </ul>
                </div>
                <div class="contacts">
                    <h3>Get in Touch</h3>
                    <ul class="compnent-lists">
                        <li>Street-04, Gilgit </li>
                        <li>+92348 5513377</li>
                        <li>gb.events@gmail.com</li>>
                    </ul>
                </div>

            </div>
            <div id="copyright">
                <h2>© 2023-24 All rights reserved, GB Events.
                </h2>
            </div>

        </footer>

        <!--FOOTER END-->


    </div>
    <!--//.LGX SITE CONTAINER-->
    <!-- *** ADD YOUR SITE SCRIPT HERE *** -->
    <!-- JQUERY  -->
    <script src="{{ asset('frontend-assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!-- BOOTSTRAP JS  -->
    <script src="{{ asset('') }}frontend-assets/libs/bootstrap/js/bootstrap.min.js"></script>

    <!-- Smooth Scroll  -->
    <script src="{{ asset('frontend-assets/libs/jquery.smooth-scroll.js') }}"></script>

    <!-- SKILLS SCRIPT  -->
    <script src="{{ asset('frontend-assets/libs/jquery.validate.js') }}"></script>

    <!-- if load google maps then load this api, change api key as it may expire for limit cross as this is provided with any theme -->
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQvRGGtL6OrpP5xVMxq_0NgiMiRhm3ycI"></script>

    <!-- CUSTOM GOOGLE MAP -->
    <script type="text/javascript" src="{{ asset('frontend-assets/libs/gmap/jquery.googlemap.js') }}"></script>

    <!-- adding magnific popup js library -->
    <script type="text/javascript" src="{{ asset('frontend-assets/libs/maginificpopup/jquery.magnific-popup.min.js') }}">
    </script>

    <!-- Owl Carousel  -->
    <script src="{{ asset('frontend-assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- COUNTDOWN   -->
    <script src="{{ asset('frontend-assets/libs/countdown.js') }}"></script>
    <script src="{{ asset('frontend-assets/libs/timer/TimeCircles.js') }}"></script>

    <!-- Counter JS -->
    <script src="{{ asset('frontend-assets/libs/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/libs/counterup/jquery.counterup.min.js') }}"></script>

    <!-- SMOTH SCROLL -->
    <script src="{{ asset('frontend-assets/libs/jquery.smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/libs/jquery.easing.min.js') }}"></script>

    <!-- type js -->
    <script src="{{ asset('frontend-assets/libs/typed/typed.min.js') }}"></script>

    <!-- header parallax js -->
    <script src="{{ asset('frontend-assets/libs/header-parallax.js') }}"></script>

    <!-- instafeed js -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>-->
    <script src="{{ asset('frontend-assets/libs/instafeed.min.js') }}"></script>

    <!-- CUSTOM SCRIPT  -->
    <script src="{{ asset('frontend-assets/js/custom.script.js') }}"></script>


</body>

</html>
