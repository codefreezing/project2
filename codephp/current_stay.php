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
                                    <?php
                                    $currentStay = DB::query("SELECT Guest.Guest_ID AS Guest_ID, Fname, Lname, Invoice.Date_Checked_In AS Date_Checked_In, Invoice.Date_Checkout AS Date_Checkout, Price.Room_Info AS Room_Info, Room.Room_Number AS Room_Number, Price.Room_Rate AS Room_Rate, Invoice.Total_Charge AS Total_Charge, Invoice.Payment_Made AS Payment_Made
                                    FROM Guest 
                                    INNER JOIN Invoice ON Guest.Guest_ID = Invoice.Guest_ID
                                    INNER JOIN Invoice_Rooms ON Invoice.Invoice_ID = Invoice_Rooms.Invoice_ID
                                    INNER JOIN Room ON Invoice_Rooms.Room_Number = Room.Room_Number
                                    INNER JOIN Price ON Room.Room_Type = Price.Room_Type;");
                                    foreach ($currentStay as $row) {
                                        $balance = $row['Total_Charge'] - $row['Payment_Made'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row["Lname"];?></td>
                                        <td><?php echo $row['Fname'];?></td>
                                        <td><?php echo $row['Date_Checked_In'];?></td>
                                        <td><?php echo $row['Date_Checkout'];?></td>
                                        <td><?php echo $row['Room_Info'];?></td>
                                        <td><?php echo $row['Room_Number']?></td>
                                        <td><?php echo '$'.$row['Room_Rate']?></td>
                                        <td><?php echo '$'.$row['Total_Charge'];?></td>
                                        <td><?php echo '$'.$row["Payment_Made"];?></td>
                                        <td><?php echo '$'.$balance;?></td>
                                    <?php
                                    }
                                    ?>
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
