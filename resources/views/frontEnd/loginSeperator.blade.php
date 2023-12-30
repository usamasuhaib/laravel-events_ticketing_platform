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
                                <div class="lgx-logo">
                                    <a href="{{ route('welcome') }}" class="lgx-scroll">
                                        <img src="{{ asset('frontend-assets/img/gb-events-logo2.png') }}"
                                            alt="GB Events Logo" />
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">

                                <ul class="nav navbar-nav lgx-nav navbar-right">
                                    <li><a href="index.html">Home</a></li>
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


        <div class="loginPage-Container1">

            <div class="main-heading">
                <h3>Events Ticketing Platform</h3>
                <h4>User Type</h4>

            </div>
            <div class="cards-section">
                <a href="{{ route('admin.login') }}" class="cards">
                    <div class="card-icon">
                        <i class="fa-solid fa-user fa-2xl"></i>
                    </div>
                    <div class="card-heading">
                        <h4>Admin Login</h4>
                    </div>

                </a>
                <a href="{{ route('attendee.login') }}" class="cards">
                    <div class="card-icon">
                        <i class="fa-solid fa-users fa-2xl"></i>
                    </div>
                    <div class="card-heading">
                        <h4>Attendee Login</h4>
                    </div>

                </a>
                <a href="{{ route('organizer.login') }}" class="cards">
                    <div class="card-icon">
                        <i class="fa-solid fa-people-roof fa-2xl"></i>
                    </div>
                    <div class="card-heading">
                        <h4>Organizer Login</h4>
                    </div>

                </a>

            </div>

        </div>


</body>

<!--FOOTER-->
<footer class="my-footer">

    <div class="footer-components">
        <div class="address">
            <h3 id="footer-logo">LOGO</h3>
            <p>Balghar Ghanche <br> Gilgit Baltistan
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
                <li>Street-04, Balghar </li>
                <li>+92348 5513377</li>
                <li>usamabalti.dev@gmail.com</li>>
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
