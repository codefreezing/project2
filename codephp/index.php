<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="codefreezing">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
 
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    exit('Connection failed: '.mysqli_connect_error().PHP_EOL);
}
 
echo 'Successful database connection!'.PHP_EOL;
?>
    <div class="page-wrapper">
       

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                     <h2 class="pb-2 display-5">HotelX</h2>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            
                            <a class="js-arrow" href="index.html">
                                <i class="fas fa-list"></i>Capability 1</a>       
                           
                        </li>
                        <li>
                            <a href="room_list.html">
                                <i class="fas fa-list"></i>Capability 2</a>
                        </li>
                        
                        <li>
                            <a href="reservation.html">
                                <i class="fas fa-list"></i>Capability 3</a>
                        </li>

                        <li>
                            <a href="house_keeping.html">
                                <i class="fas fa-list"></i>Capability 4</a>
                        </li>
                        <li>
                            <a href="guest_information.html">
                                <i class="fas fa-list"></i>Capability 5</a>
                        </li>
                        <li>
                            <a href="current_stay.html">
                                <i class="fas fa-list"></i>Capability 6</a>
                        </li> 
                        <li>
                            <a href="cap7-search-guests.html">
                                <i class="fas fa-list"></i>Capability 7</a>
                        </li>
                        <li>
                            <a href="cap8-daily-report.html">
                                <i class="fas fa-list"></i>Capability 8</a>
                        </li>       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Room status for today</h2>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-primary">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                           
                                            <div class="text">
                                                <h2>388,688</h2>
                                                <span>Available</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-warning">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>Occupied</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-danger">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2>10368</h2>
                                                <span>Maintenance</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                    
                           
                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-dark">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2>386</h2>
                                                <span>Dirty</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-dark">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 308
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen (DQ)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Dirty
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 307
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen with Kitchen (DQK)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Occupied
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                           

                          </div>


                          <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-dark">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 308
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen (DQ)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Dirty
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 307
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen with Kitchen (DQK)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Occupied
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                           

                          </div>
                   
                          <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 307
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen with Kitchen (DQK)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Occupied
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-dark">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 308
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen (DQ)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Dirty
                                        </h5>
                                    </div>
                                </div>
                            </div>
                     
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                           

                          </div>

                          <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card bg-warning">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 307
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen with Kitchen (DQK)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Occupied
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-dark">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 308
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen (DQ)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Dirty
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-danger">
                                    
                                    <div class="card-body">
                                        <h4 class="card-title mb-5 text-light">Room: 304
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>
                                        <h5 class="card-text text-light float-right">Unavailable/Maintenance
                                        </h5>
                                    </div>
                                </div>
                            </div>
                           

                          </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
