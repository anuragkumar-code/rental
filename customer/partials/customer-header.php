<?php 
session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'customer') {
    header("Location: ../error.php");
    exit();
}


?>

<!DOCTYPE html>
<head>
    <title>Whip - Multipurpose Vehicle Car Rental</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="../assets/css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/custom-style.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/coloring.css" rel="stylesheet" type="text/css">
    <link id="colors" href="../assets/css/colors/scheme-01.css" rel="stylesheet" type="text/css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Include Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
      <style>
    /* Logo Container */
#logo {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px; /* Adds a bit of space around the logo */
}

/* Logo Image Styles */
.logo-1, .logo-2 {
    max-width: 180px; /* Adjusts max width to make it responsive */
    height: auto; /* Maintains aspect ratio */
    transition: transform 0.3s ease; /* Smooth transition for hover effects */
}

.logo-1 {
    display: block;
}

.logo-2 {
    display: none; /* Keeps logo-2 hidden by default if it's meant as a secondary logo */
}

/* Optional Hover Effect */
#logo a:hover .logo-1 {
    transform: scale(1.05); /* Slight zoom on hover */
}

    </style>
    
    <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
    <div id="wrapper">
        <div id="de-preloader"></div>
        <header class="transparent scroll-light has-topbar">
            <div id="topbar" class="topbar-dark text-light">
                <div class="container">
                    <div class="topbar-left xs-hide">
                        <div class="topbar-widget">
                            <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+208 333 9296</a></div>
                            <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>contact@whip.com</a></div>
                            <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>Mon - Fri 08.00 - 18.00</a></div>
                        </div>
                    </div>
                
                    <div class="topbar-right">
                        <div class="social-icons">
                            <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                            <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                            <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                            <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                            <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                        </div>
                    </div>  
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                             <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <div id="logo">
                                        <a href="index.php">
                                            <img class="logo-1" src="assets/images/logo-whips-01.png" alt="">
                                            <img class="logo-2" src="assets/images/logo.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                &nbsp;
                            </div>
                            <div class="de-flex-col">
                                <ul id="mainmenu">
                                    <li>
                                        <a class="menu-item" href="../customer/">Home</a>
                                    </li>
                                    
                                    <li><a class="menu-item" href="javascript:void(0)">Account</a>
                                        <ul>
                                            <li><a class="menu-item" href="../customer/profile.php">My Profile</a></li>
                                            <li><a class="menu-item" href="../functions/logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                    
                                     <li>
                                        <a class="menu-item" href="../customer/notifications.php">
                                            <i class="fa fa-bell"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
