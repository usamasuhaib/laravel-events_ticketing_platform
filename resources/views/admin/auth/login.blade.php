<!DOCTYPE html>
<html lang="en">


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
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/fontawesome/css/font-awesome.min.css') }}" media="all" />
    <script src="https://kit.fontawesome.com/d75d46c424.js" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/maginificpopup/magnific-popup.css') }}" media="all" />

    

    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/owlcarousel/owl.carousel.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend-assets/libs/owlcarousel/owl.theme.default.min.css') }}" media="all" />

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
    <link id="lgx-master-style" rel="stylesheet" href="{{ asset('frontend-assets/css/master-style.css') }}" media="all" />

    <!-- MODERNIZER CSS  -->
    <script src="{{ asset('frontend-assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body class="signup-signin-page">
   <div class="signup-signin-container">

      <div class="inner-container-signup-signin">
          <div class ="gb-events-logo">
                           <a href="index.html" class="lgx-scroll">
                                 <img src=" {{ asset('frontend-assets/img/gb-events-logo2.png') }}" alt="Eventhunt Logo" />
                            </a>
         </div>
         <x-auth-session-status class="mb-4" :status="session('status')" />
         <h3>Sign-in as Admin</h3>
   
         <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            {{-- email  --}}
            <div>
                <input class="input-container" type="email" name="email"  placeholder="Email">
            </div>

            {{-- password  --}}
            <div class="password-container" >
               <input  class="input-container" type="password"
               name="password"
               required autocomplete="current-password"
                placeholder="Password">

               <i class="forgot-password">
                  <a href="forgot-password.html">forget Password?</a>
               </i>
            </div>

            <button class="signin_button"><b>Sign In</b></button>
         </form>
      </div>
<!-- 
      <div class="right-side-signup-signin">
         <img src="icons/signuppage.png" alt="">
      </div> -->


   </div>
   <footer>
      <div class="signin-signup-page-footer">
         <strong>Copyright &copy; 2023-2024 GB Events</a>.</strong> All rights reserved.
      </div>
   </footer>

</body>

</html>