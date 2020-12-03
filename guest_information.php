<?php
// Start the session
session_start();
$_SESSION["menu"] = 5;
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
                                <tbody>
                                    <thead>
                                        <th>Guest ID</th>
                                        <th>Photo</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>E-mail</th>
                                        <th>ID Info</th>
                                        <th>Vehicle</th>
                                        <th>License Plate</th>
                                    </thead>
                                    <?php
                                    $guest_info = DB::query("SELECT * FROM Guest");

                                    foreach ($guest_info as $row) {
                                    ?>
                                    <tr class="clickable-row" id="row" style="cursor: pointer;" onclick="location.href='edit_guest_info.php?GuestID=<?php echo $row['Guest_ID']?>&Lname=<?php">
                                        <td><?php echo $row['Guest_ID']?></td>
                                        <td><img src="<?php echo $row['Photo']?>"></td>
                                        <td><?php echo $row['Lname']?></td>
                                        <td><?php echo $row['Fname']?></td>
                                        <td><?php echo $row['Phone_Number']?></td>
                                        <td><?php echo $row['Address']?></td>
                                        <td><?php echo $row['Email']?></td>
                                        <td><?php echo $row['ID_Info']?></td>
                                        <td><?php echo $row['Vehicle']?></td>
                                        <td><?php echo $row['License_Plate']?></td>
                                    </tr>
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
