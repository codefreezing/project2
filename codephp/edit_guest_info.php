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
            <?php
            $guestID = isset($_GET["GuestID"]) ? $_GET["GuestID"] : '';
            $lName = isset($_GET["Lname"]) ? $_GET["Lname"] : '';
            $fName = isset($_GET["Fname"]) ? $_GET["Fname"] : '';
            $phoneNum = isset($_GET["Phone"]) ? $_GET["Phone"] : '';
            $address = isset($_GET["Address"]) ? $_GET["Address"] : '';
            $email = isset($_GET["Email"]) ? $_GET["Email"] : '';
            $id = isset($_GET["ID_Info"]) ? $_GET["ID_Info"] : '';
            $vehicle = isset($_GET["Vehicle"]) ? $_GET["Vehicle"] : '';
            $license = isset($_GET["License_Plate"]) ? $_GET["License_Plate"]: '';

            if (isset($_POST["submitEdit"])) {
                echo "I'm here";
                $lName = isset($_POST["lname"]) ? $_POST["lname"] : '';
                $fName = isset($_POST["fname"]) ? $_POST["fname"] : '';
                $phoneNum = isset($_POST["phone"]) ? $_POST["phone"] : '';
                $address = isset($_POST["address"]) ? $_POST["address"] : '';
                $email = isset($_POST["email"]) ? $_POST["email"] : '';
                $id = isset($_POST["idInfo"]) ? $_POST["idInfo"] : '';
                $vehicle = isset($_POST["vehicle"]) ? $_POST["vehicle"] : '';
                $license = isset($_POST["license"]) ? $_POST["license"]: '';

                $update = DB::update('Guest', ['Lname' => $lName, 'Fname' => $fName, '', 'Phone_Number' => $phoneNum, 'Address' => $address, 'Email' => $email, 'ID_Info' => $id, 'Vehicle' => $vehicle, 'License_Plate' => $license]);
                echo "It worked";
            }
            else {
                echo "It failed";
            }
            
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
                            <div class="col-lg-12">
                                <div class="overview-wrap h-100 bg-light text-dark">
                                    <?php
                                    $guestInfo = DB::query("SELECT * FROM Guest WHERE Guest.Guest_ID = $guestID");
                                    ?>

                                    <div class="d-flex justify-content-center align-items-center container">
                                        <form name="EditUser" method="POST">
                                            <div class="form-group text-center">
                                                <h2 class="text-center">Edit Guest Information</h2>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fnameInput">First Name</label>
                                                <input required class="form-control" type="text" name="fname" id="fnameInput" value="<?php echo (!empty($fName)) ? $fName : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="lnameInput">Last Name</label>
                                                <input required class="form-control" type="text" name="lname" id="lnameInput" value="<?php echo (!empty($lName)) ? $lName : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-made">Phone Number</label>
                                                <input required class="form-control" type="text" name="phone" id="phone" value="<?php echo (!empty($phoneNum)) ? $phoneNum : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="address">Address</label>
                                                <input required class="form-control" type="text" name="address" id="address" value="<?php echo (!empty($address)) ? $address : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="email">E-Mail</label>
                                                <input required class="form-control" type="text" name="email" id="email" value="<?php echo (!empty($email)) ? $email : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="id">ID Info</label>
                                                <input required class="form-control" type="text" name="idInfo" id="idInfo" value="<?php echo (!empty($id)) ? $id : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="vehicle">Vehicle</label>
                                                <input required class="form-control" type="text" name="vehicle" id="vehicle" value="<?php echo (!empty($vehicle)) ? $vehicle : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="license">License Plate</label>
                                                <input required class="form-control" type="text" name="license" id="license" value="<?php echo (!empty($license)) ? $license : '' ?>">
                                            </div>
                                            <div class="row pt-3 justify-content-center align-self-center">
                                                <div class="form-group pt-4">
                                                    <div class="btn-group btn-block">

                                                        <button class="btn btn-lg btn-success mr-2 text-light rounded" id="submitEdit" name="submitEdit" type="submit">Update</button>
                                                        <a href="guest_information.php">Go Back</a>

                                                </div>
                                            </div>
                                        </div>

                                        </form>
                                    </div>
                                    

                                    <!-- copyright section -->

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