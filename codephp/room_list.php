<!DOCTYPE html>
<html lang="en">

<head>
<style>
.btntext{
    color: white !important;
}
</style>
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
                                    <h2 class="title-1">List of the rooms and who is staying in the room</h2>

                                </div>
                            </div>
                        </div>
                       
                        <div class="row m-t-25">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Guest Names</th>
                                  
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $roomList = DB::query("SELECT * FROM Room");
                                    foreach ($roomList as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['Room_Number']; ?></td>
                                        <td>
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>The guest is staying in the room for each day for the next 7 days</strong>                                        
                                                </div>
                                                <div class="card-body">
                                                    <a class="btn btn-primary btntext">
                                                    
                                                            <p class="text-left">Date: <?php echo date("Y-m-d");?></p>
                                                            <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),'2020-11-22');
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>                                                                                                     
                                                    </a>
                                                    <a class="btn btn-secondary btntext"">
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+1 day'));?></p>
                                                        <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),date("Y-m-d", strtotime('+1 day')));
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>
                                                    </a>
                                                    <a class="btn btn-success btntext"">
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+2 day'));?></p>
                                                        <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),date("Y-m-d", strtotime('+2 day')));
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>
                                                    </a>
                                                    <a class="btn btn-danger btntext"">
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+3 day'));?></p>
                                                        <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),date("Y-m-d", strtotime('+3 day')));
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>
                                                    </a>
                                                    <a class="btn btn-warning btntext"">
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+4 day'));?></p>
                                                        <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),date("Y-m-d", strtotime('+4 day')));
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>
                                                    </a>
                                                    <a class="btn btn-info btntext"">
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+5 day'));?></p>
                                                        <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),date("Y-m-d", strtotime('+5 day')));
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>
                                                    </a>
                                                    <a class="btn btn-dark btntext"">
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+6 day'));?></p>
                                                        <?php
                                                                $getresultfromnow = DB::query("SELECT * FROM Invoice_Rooms, Invoice WHERE Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID AND Invoice_Rooms.Room_Number = %i AND Invoice.Date_Checked_In <= %s AND Invoice.Date_Checkout >= %s",$row['Room_Number'],date("Y-m-d"),date("Y-m-d", strtotime('+6 day')));
                                                               if(isset($getresultfromnow[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$getresultfromnow[0]['Guest_ID']);
                                                            ?>
                                                                <p class="text-left font-weight-bold"><?php 
                                                                echo $getresultguestname[0]['Fname']; 
                                                                echo " ";
                                                                echo $getresultguestname[0]['Lname'];?></p>
                                                            <?php
                                                               }else{
                                                            ?>
                                                             <p class="text-left font-weight-bold">&nbsp;</p>
                                                            <?php
                                                               }
                                                            ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>                                         
                                    </tr>
                                   <?php
                                    }
                                   ?>
                                 

                                   
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <styl type="text/css">
        .datepicker td,
        .datepicker th {
            width: 2em;
            height: 2em;
        }

        .table .thead-dark th {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </styl>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker').datepicker("setDate", new Date());
    </script>
</body>

</html>
<!-- end document-->