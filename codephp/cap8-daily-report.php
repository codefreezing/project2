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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
        rel="stylesheet" />

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
                                    <h2 class="title-1">Daily Report</h2>

                                </div>
                            </div>
                        </div>
                        <div class="row m-t-5">
                            <form class="form-header" action="" method="POST">


                                <input class="au-input" data-date-format="mm/dd/yyyy" id="datepicker">

                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="row m-t-25">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="text-center"><h2>10/22/2020</h2></div></th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <table class="table table-hover">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Guest Name</th>
                                        <th>Date In</th>
                                        <th>Date Out</th>
                                        <th>Amount Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>201</td>
                                        <td>Fiona Gallagher</td>
                                        <td>10/22/2020</td>
                                        <td>10/23/2020</td>
                                        <td>$200</td>
                                    </tr>
                                    <tr>
                                        <td>303</td>
                                        <td>Kylian Mbappe</td>
                                        <td>10/22/2020</td>
                                        <td>10/24/2020</td>
                                        <td>$600</td>
                                    </tr>
                                    <tr>
                                        <td>401</td>
                                        <td>Cristiano Ronaldo</td>
                                        <td>10/22/2020</td>
                                        <td>10/25/2020</td>
                                        <td>$1200</td>
                                    </tr>
                                    <tr>
                                        <td>207</td>
                                        <td>Lionel Messi</td>
                                        <td>10/22/2020</td>
                                        <td>Not Yet</td>
                                        <td>$12000</td>
                                    </tr>
                                    <tr class='thead-light'>
                                        <th>Total Paid</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>$14000</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- abc1 -->

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

    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script
        src="vendor/bootstrap-datepicker.min.js"></script>
    <style type="text/css">
        .datepicker td,
        .datepicker th {
            width: 2em;
            height: 2em;
        }

    </style>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        // $('#datepicker').datepicker("setDate", new Date());
        $('#datepicker').datepicker("setDate", "10/22/2020");
    </script>
</body>

</html>
<!-- end document-->