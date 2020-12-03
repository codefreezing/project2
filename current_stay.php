<?php
// Start the session
session_start();
$_SESSION["menu"] = 6;
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
    <div class="page-wrapper">
       

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
                        
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Check In (Date/Time)</th>
                                    <th>Check Out (Date/Time)</th>
                                    <th>Room Type</th>
                                    <th>Room Number</th>
                                    <th>Rate ($/Day)</th>
                                    <th>Total Charge</th>
                                    <th>Paid?</th>
                                    <th>Balance</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Doe</td>>
                                        <td>John</td>
                                        <td>10/28/2020 12:00 PM</td>
                                        <td>11/01/2020 11:00 AM</td>
                                        <td>Single Queen</td>
                                        <td>504</td>
                                        <td>$127</td>
                                        <td>$508</td>
                                        <td>Paid</td>
                                        <td>$0</td>
                                    </tr>
                                    <tr>
                                        <td>Gibson</td>>
                                        <td>John</td>
                                        <td>11/01/2020 12:00 PM</td>
                                        <td>11/10/2020 11:00 AM</td>
                                        <td>Single King</td>
                                        <td>511</td>
                                        <td>$224</td>
                                        <td>$2240</td>
                                        <td>Partial</td>
                                        <td>$2000</td>
                                    </tr>
                                    <tr>
                                        <td>Strife</td>>
                                        <td>Cloud</td>
                                        <td>11/01/2020 12:00 PM</td>
                                        <td>11/7/2020 11:00 AM</td>
                                        <td>Double Queen</td>
                                        <td>511</td>
                                        <td>$187</td>
                                        <td>$109</td>
                                        <td>Not Paid</td>
                                        <td>$1309</td>
                                    </tr>
                                    <tr>
                                        <td>Mack</td>>
                                        <td>Carolyn</td>
                                        <td>11/13/2020 12:00 PM</td>
                                        <td>11/24/2020 11:00 AM</td>
                                        <td>Luxury Suite</td>
                                        <td>607</td>
                                        <td>$512</td>
                                        <td>$4608</td>
                                        <td>Paid</td>
                                        <td>$0</td>
                                    </tr>
                                </tbody>
                            </table>
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

    <?php
include "footer.php";
?>

</body>

</html>
<!-- end document-->