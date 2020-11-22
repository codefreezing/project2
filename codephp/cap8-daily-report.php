<?php
// Start the session
session_start();
$_SESSION["menu"] = 8;
?>
<?php 
    $pickedDate = date("m/d/Y");
    if(isset($_POST['submit'])){        
        if (!empty($_POST['datepicker'])){
            $date = $_POST['datepicker'];  
            $d = DateTime::createFromFormat('m/d/Y', $date);
            if ($d && $d->format('m/d/Y') == $date) {   // make sure $date is valid 
                $pickedDate = $date;
            }

        }    
    }

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
        <?php

?>
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
                            <form class="form-header" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


                                <input class="au-input" data-date-format="mm/dd/yyyy" id="datepicker" name="datepicker">

                                <button class="au-btn--submit" type="submit" name="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="row m-t-25">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="text-center"><h2><?php echo htmlspecialchars($pickedDate); ?></h2></div></th>                                       
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
<?php
// debug($pickedDate);
$pickedDateSQL = date("Y-m-d", strtotime($pickedDate));
// debug($pickedDateSQL);
$roomlist = DB::query("SELECT Room.Room_Number AS Room_Number, Fname, Lname, Date_Checked_in, Date_Checkout, Room_Rate AS Amound_Paid, Record_Status_Code
FROM Record
INNER JOIN Invoice
ON BookingID = Booking_ID
INNER JOIN Guest
ON Invoice.Guest_ID = Guest.Guest_ID
INNER JOIN Room
ON Record.Room_Number = Room.Room_Number
INNER JOIN Price
ON Room.Room_Type = Price.Room_Type
WHERE Record.Date = '".$pickedDateSQL."' AND Record.Record_Status_Code != 0");
$totalPaid = 0;
foreach ($roomlist as $row):
    $totalPaid += $row['Amound_Paid'];
?>
   
                                
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['Room_Number']); ?></td>
                                        <td><?php echo htmlspecialchars($row['Fname']).' '.htmlspecialchars($row['Lname']); ?></td>
                                        <td><?php echo htmlspecialchars(date("m/d/Y", strtotime($row['Date_Checked_in']))); ?></td>
                                        <td><?php echo $row['Record_Status_Code'] == 1  ? 'Not Yet' : htmlspecialchars(date("m/d/Y", strtotime($row['Date_Checkout']))); ?></td>
                                        <td>$<?php echo htmlspecialchars($row['Amound_Paid']); ?></td>
                                    </tr>
<?php endforeach; ?>                                                                        
                                    <tr class='thead-light'>
                                        <th>Total Paid</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>$<?php echo $totalPaid; ?></th>
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
        $('#datepicker').datepicker("setDate", "<?php echo $pickedDate; ?>");
        // $('#datepicker').datepicker("setDate", "10/22/2020");
    </script>
</body>

</html>
<!-- end document-->