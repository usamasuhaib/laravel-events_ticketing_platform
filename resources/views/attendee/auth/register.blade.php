<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up | GB Events</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600;700;800&family=Urbanist:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/d75d46c424.js" crossorigin="anonymous"></script>
    <!-- MASTER  STYLESHEET  -->
    <link id="lgx-master-style" rel="stylesheet" href="frontend-assets/css/master-style.css" media="all" />



    <!-- MASTER  STYLESHEET  -->
    <link id="lgx-master-style" rel="stylesheet" href="{{ asset('frontend-assets/css/master-style.css') }}"
        media="all" />
</head>

<body class="signup-signin-page">
    <div class="signup-signin-container">

        <div class="inner-container-signup-signin">
            <div class="gb-events-logo">
                <a href="index.html" class="lgx-scroll">
                    <img src=" {{ asset('frontend-assets/img/gb-events-logo2.png') }}" alt="Eventhunt Logo" />
                </a>
            </div>
            <h3>Sign-up as Attendee</h3>

            <form class="signin-signup-form" method="POST" action="{{ route('attendee.storeAttendee') }}">
                @csrf
    
                <div><input class="input-container" type="text" placeholder="Name" name="name"></div>
                <div><input class="input-container" type="email" placeholder="Email" name="email"></div>

                <div><input class="input-container" type="password" placeholder="Password" id="password" required name="password"></div>
                
                <div><input class="input-container" type="password" placeholder="Confirm Password" id="confirm_password"
                    required></div>

                    <div>
                        <button class=""><b>Sign up</b></button>
                        <p>Already have an account? <a href="{{ route('attendee.login') }}">Login</a> here</p>
    
                    </div>
    
             </form>


        </div>

        <!-- <div class="right-side-signup-signin">
         <img src="icons/signuppage.png" alt="">
      </div> -->


    </div>

    <footer>
        <div class="signin-signup-page-footer">
            <strong>Copyright &copy; 2023-2024 GB Events</a>.</strong> All rights reserved.
        </div>
    </footer>



    <!-- js  -->
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>>



</body>





</html>
