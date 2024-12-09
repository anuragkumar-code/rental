<?php 
session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'owner') {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>
    
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
                                            <img class="logo-1" src="../assets/images/logo-light.png" alt="">
                                            <img class="logo-2" src="../assets/images/logo.png" alt="">
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
                                        <a class="menu-item" href="../owner/">Home</a>
                                    </li>
                                    <li><a class="menu-item" href="javascript:void(0)">Cars</a>
                                        <ul>
                                            <li><a class="menu-item" href="../owner/add-car.php">Add Car</a></li>
                                        </ul>
                                    </li>

                                    <li><a class="menu-item" href="javascript:void(0)">Account</a>
                                        <ul>
                                            <li><a class="menu-item" href="../owner/profile.php">My Profile</a></li>
                                            <li><a class="menu-item" href="../functions/logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="menu-item" href="../owner/notifications.php">
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
