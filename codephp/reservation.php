<?php
// Start the session
session_start();
$_SESSION["menu"] = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include "db.class.php";
include "debug.php";
include "head.php";
?>

</head>

<body class="animsition">


        <!-- MENU SIDEBAR-->
        <?php
include "menu.php";
?>
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
                                    <h2 class="title-1">All Reservations</h2>

                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                            <div class="col-md-4">
                                <div class="overview-item bg-danger">
                                    <div class="overview__inner text-center">
                                        <div class="overview-box clearfix">

                                            <div class="text mb-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h1 class="text-light">Total:</h1>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <h1 class="text-light">9</h1>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">101</p>
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen with Kitchen (DQK)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">David</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Craig</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/14/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/15/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/16/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Double Queen with Kitchen (DQK)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">No</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$200</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$200</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">102</p>
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Tom</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Holland</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/01/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/20/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/23/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">King (K)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$150</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$450</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">204</p>
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen (DQ)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Arnold</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Schwarzenegger</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/10/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/12/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/14/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Double Queen (DQ)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$100</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$200</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">902</p>
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Taylor</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Swift</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/07/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/16/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/20/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">King (K)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$150</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$600</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">901</p>
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen (DQ)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Phuong</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Nguyen</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/11/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/23/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/26/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Double Queen (DQ)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$100</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$300</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">208</p>
                                            <small>
                                                <span class="badge badge-success float-right">Double Queen with Kitchen (DQK)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Emily</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Pham</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/15/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/22/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/24/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Double Queen with Kitchen (DQK)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$200</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$400</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">305</p>
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Ralph</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Pura</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/02/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/20/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/23/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">King (K)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$150</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$450</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">603</p>
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Kiet</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Dang</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/02/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/20/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/23/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">King (K)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Yes</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$150</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$450</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 py-4">
                                <div class="card h-100 bg-primary">

                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-light">Room:
                                            <p style="display: inline-block" id=" room_number">709</p>
                                            <small>
                                                <span class="badge badge-success float-right">King (K)</span>
                                            </small>
                                        </h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">First Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Lady</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Last Name:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">Gaga</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Made:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/09/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-In:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/18/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Date Check-Out:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">10/19/2020</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Room Type:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">King (K)</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Website Reservation:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">No</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Rate:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$150</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-light">Total Charge:</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="card-text text-warning">$150</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>

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
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>

    </div>
    <?php
include "footer.php";
?>

</body>

</html>
<!-- end document-->