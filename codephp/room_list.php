<?php
// Start the session
session_start();
$_SESSION["menu"] = 2;
?>
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
                                                <?php
                                               $oneresult = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d"));
                                                if(isset($oneresult[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $oneresult[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d"); ?>" class="btn btn-primary btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="current_stay.php?Room_Number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d"); ?>" class="btn btn-primary btntext">
                                                <?php
                                                }
                                                ?>
                                                
                                                            <p class="text-left">Date: <?php echo date("Y-m-d");?></p>
                                                            <?php
                                                               
                                                               if(isset($oneresult[0]['Guest_ID'])){
                                                                 $getresultguestname = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = %i",$oneresult[0]['Guest_ID']);
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
                                                    <?php
                                                $getresultfromnow = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d", strtotime('+1 day')));
                                                if(isset($getresultfromnow[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $getresultfromnow[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d", strtotime('+1 day')); ?>" class="btn btn-secondary btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="create_reservation.php?room_number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d", strtotime('+1 day')); ?>" class="btn btn-secondary btntext">
                                                <?php
                                                }
                                                ?>
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+1 day'));?></p>
                                                        <?php
                                                            
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
                                                    <?php
                                                $getresultfromnow = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d", strtotime('+2 day')));
                                                if(isset($getresultfromnow[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $getresultfromnow[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d", strtotime('+2 day')); ?>" class="btn btn-success btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="create_reservation.php?room_number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d", strtotime('+2 day')); ?>" class="btn btn-success btntext">
                                                <?php
                                                }
                                                ?>
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+2 day'));?></p>
                                                        <?php
                                                                
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
                                                    <?php
                                                $getresultfromnow = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d", strtotime('+3 day')));
                                                if(isset($getresultfromnow[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $getresultfromnow[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d", strtotime('+3 day')); ?>" class="btn btn-danger btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="create_reservation.php?room_number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d", strtotime('+3 day')); ?>" class="btn btn-danger btntext">
                                                <?php
                                                }
                                                ?>
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+3 day'));?></p>
                                                        <?php
                                                               
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
                                                    <?php
                                                $getresultfromnow = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d", strtotime('+4 day')));
                                                if(isset($getresultfromnow[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $getresultfromnow[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d", strtotime('+4 day')); ?>" class="btn btn-warning btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="create_reservation.php?room_number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d", strtotime('+4 day')); ?>" class="btn btn-warning btntext">
                                                <?php
                                                }
                                                ?>
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+4 day'));?></p>
                                                        <?php
                                                                
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
                                                    <?php
                                                $getresultfromnow = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d", strtotime('+5 day')));
                                                if(isset($getresultfromnow[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $getresultfromnow[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d", strtotime('+5 day')); ?>" class="btn btn-info btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="create_reservation.php?room_number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d", strtotime('+5 day')); ?>" class="btn btn-info btntext">
                                                <?php
                                                }
                                                ?>
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+5 day'));?></p>
                                                        <?php
                                                              
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
                                                    <?php
                                                $getresultfromnow = DB::query("SELECT * FROM Record, Booking WHERE Record.BookingID = Booking.BookingID AND Record.Room_Number = %i AND Record.Date = %s",$row['Room_Number'],date("Y-m-d", strtotime('+6 day')));
                                                if(isset($getresultfromnow[0]['Guest_ID'])){
                                                ?>
                                                <a href="current_stay.php?roomid=<?php echo $getresultfromnow[0]['Room_Number']; ?>&datecheck=<?php echo date("Y-m-d", strtotime('+6 day')); ?>" class="btn btn-dark btntext">
                                                <?php

                                                }else{
                                                ?>
                                                 <a href="create_reservation.php?room_number=<?php echo $row['Room_Number']; ?>&date_in=<?php echo date("Y-m-d", strtotime('+6 day')); ?>" class="btn btn-dark btntext">
                                                <?php
                                                }
                                                ?>
                                                        <p class="text-left">Date: <?php echo date("Y-m-d", strtotime('+6 day'));?></p>
                                                        <?php
                                                               
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

   
</body>

</html>
<!-- end document-->