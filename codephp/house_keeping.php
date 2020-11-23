<?php
// Start the session
session_start();
$_SESSION["menu"] = 4;
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

    <?php
    if (isset($_POST["submit"])) {

        $temp = isset($_POST["temp"]) ? $_POST["temp"] : 0;
        $room_number = isset($_POST["room_number"]) ? $_POST["room_number"] : 0;
        $room_status_id = isset($_POST["room_status_id"]) ? $_POST["room_status_id"] : 0;


        $result_bath = isset($_POST["check_bath{$temp}"]) && $_POST["check_bath{$temp}"]  ? "1" : "0";
        $result_towel = isset($_POST["check_towel{$temp}"]) && $_POST["check_towel{$temp}"]  ? "1" : "0";
        $result_sheet = isset($_POST["check_sheet{$temp}"]) && $_POST["check_sheet{$temp}"]  ? "1" : "0";
        $result_vacumn = isset($_POST["check_vacumn{$temp}"]) && $_POST["check_vacumn{$temp}"]  ? "1" : "0";
        $result_dusting = isset($_POST["check_dusting{$temp}"]) && $_POST["check_dusting{$temp}"]  ? "1" : "0";
        $result_elec = isset($_POST["check_elec{$temp}"]) && $_POST["check_elec{$temp}"]  ? "1" : "0";

        $checkquery = DB::query("UPDATE Housekeeping SET Bathroom=%i, Towels=%i, Bed_Sheets=%i, Vacuum=%i, Dusting=%i, Electronics=%i
    WHERE Room_Number=%s", $result_bath, $result_towel, $result_sheet, $result_vacumn, $result_dusting, $result_elec, $room_number);

        debug($room_number);
        $checkquery = $temp . "a:" . $result_bath . ":" . $result_towel . ":" . $result_sheet . ":" . $result_vacumn . ":" . $result_dusting . ":" . $result_elec . ":" . $room_number;
        debug($checkquery);

        $count_done = ($result_bath == 1 && $result_towel == 1 && $result_sheet == 1 && $result_vacumn == 1 && $result_dusting == 1 && $result_elec == 1);
        if (($count_done) && ($room_status_id  == 3))
            DB::update('Room', ['Room_Status_ID' => 0], "Room_Number=%s", $room_number);
    }

    ?>
    <div class="page-wrapper">



        <!-- MENU SIDEBAR-->
        <?php
        include "menu.php";
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php

            if (isset($_GET['update'])) {
                $roomIdNumber = $_GET['update'];
                DB::update('Room', ['Room_Status_ID' => 2], "Room_Number=%s", $roomIdNumber);
            }


            $numberAvailable = DB::query("SELECT count(*) as numberAvailable FROM Room, Price, Room_Status where Room_Status.Room_Status_ID = 0 
and Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type");

            $occupied = DB::query("SELECT count(*) as occupied FROM Room, Price, Room_Status where Room_Status.Room_Status_ID = 1 
and Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type");

            $maintenance = DB::query("SELECT count(*) as maintenance FROM Room, Price, Room_Status where Room_Status.Room_Status_ID = 2 
and Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type");

            $roomDirty = DB::query("SELECT count(*) as roomDirty FROM Room, Price, Room_Status where Room_Status.Room_Status_ID = 3 
and Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type");

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
                                    <h2 class="title-1">Occupied/Dirty Room status for today</h2>

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
                                                        <h1 class="text-light"><?php echo $roomDirty[0]['roomDirty'] + $occupied[0]['occupied']; ?></h1>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $roomlist = DB::query("SELECT *  FROM Room, Price, Room_Status, Housekeeping, Housekeeper where Room.Room_Number = Housekeeping.Room_Number and Room_Status.Room_Status_ID = 1
                        and Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type and Housekeeping.HID = Housekeeper.HID OR Room.Room_Number = Housekeeping.Room_Number and Room_Status.Room_Status_ID = 3
                        and Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type and Housekeeping.HID = Housekeeper.HID");

                        $temp = 1;
                        foreach ($roomlist as $row) {
                            if ($temp == 1) {
                        ?>
                                <div class="row">
                                <?php
                            }
                                ?>

                                <div class="col-md-4">

                                    <?php

                                    if ($row['Room_Status_ID'] == 0) {
                                        $cssColor = "bg-primary";
                                    } else if ($row['Room_Status_ID'] == 1) {
                                        $cssColor = "bg-warning";
                                    } else if ($row['Room_Status_ID'] == 2) {
                                        $cssColor = "bg-danger";
                                    } else if ($row['Room_Status_ID'] == 3) {
                                        $cssColor = "bg-dark";
                                    }
                                    ?>
                                    <div class="card h-80 <?php echo $cssColor ?>">
                                        <a href="#">
                                            <div class="card-body">
                                                <?php
                                                $house_keeper = $row['Name'];
                                                $room_num = $row['Room_Number'];
                                                $room_type = $row['Room_Info'];
                                                $room_status = $row['Room_Status_Info'];

                                                $result_bath = $row['Bathroom'];
                                                $result_towel = $row['Towels'];
                                                $result_sheet = $row['Bed_Sheets'];
                                                $result_vacumn = $row['Vacuum'];
                                                $result_dusting = $row['Dusting'];
                                                $result_elec = $row['Electronics'];
                                                ?>

                                                <h4 class="card-title mb-4 text-light">Room:
                                                    <p style="display: inline-block" id="room_number"><?php echo $room_num ?></p>
                                                    <small>
                                                        <span class="badge badge-success float-right"><?php echo $room_type ?></span>
                                                    </small>
                                                </h4>

                                                <div class="row pb-2">
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-light">Housekeeper:</h6>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-danger"><?php echo $house_keeper ?></h6>
                                                    </div>
                                                </div>

                                                <div class="row pb-2">
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-light">Room #:</h6>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-danger"><?php echo $room_num ?></h6>
                                                    </div>
                                                </div>

                                                <div class="row pb-2">
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-light">Type:</h6>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-danger"><?php echo $room_type ?></h6>
                                                    </div>
                                                </div>

                                                <div class="row pb-2">
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-light">Status:</h6>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="card-text text-danger"><?php echo $room_status ?></h6>
                                                    </div>
                                                </div>


                                                <div class="text-center pb-3 pt-3 ">
                                                    <button class="btn btn-primary btn-block" data-toggle="collapse" data-target="#clean-options<?php echo $temp; ?>" aria-expanded="true" aria-controls="clean-options">Show Status</button>
                                                </div>


                                                <div class="collapse multi-collapse" id="clean-options<?php echo $temp; ?>">



                                                    <form action="house_keeping.php" method="POST">

                                                        <div class=" row">
                                                            <div class="col-lg-6">
                                                                <label class="form-check-label" for="check_bath">
                                                                    <h6 class="card-text text-light">Bathroom: </h6>

                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="col-lg-6">
                                                                    <input class="form-check-input" type="checkbox" value="1" name="check_bath<?php echo $temp; ?>" id="check_bath<?php echo $temp; ?>" <?php if ($result_bath == 1) echo 'checked';
                                                                                                                                                                                                        else ''; ?>>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label class="form-check-label" for="check_towel">
                                                                    <h6 class="card-text text-light">Towels: </h6>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="col-lg-6">
                                                                    <input class="form-check-input" type="checkbox" value="1" name="check_towel<?php echo $temp; ?>" id="check_towel<?php echo $temp; ?>" <?php if ($result_towel == 1) echo 'checked';
                                                                                                                                                                                                            else ''; ?>>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label class="form-check-label" for="check_sheet">
                                                                    <h6 class="card-text text-light">Bed Sheets: </h6>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="col-lg-6">
                                                                    <input class="form-check-input" type="checkbox" value="1" name="check_sheet<?php echo $temp; ?>" id="check_sheet<?php echo $temp; ?>" <?php if ($result_sheet == 1) echo 'checked'; ?>>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label class="form-check-label" for="check_vacumn">
                                                                    <h6 class="card-text text-light">Vacumn: </h6>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="col-lg-6">
                                                                    <input class="form-check-input" type="checkbox" value="1" name="check_vacumn<?php echo $temp; ?>" <?php if ($result_vacumn == 1) echo 'checked'; ?>>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label class="form-check-label" for="check_dusting">
                                                                    <h6 class="card-text text-light">Dusting: </h6>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="col-lg-6">
                                                                    <input class="form-check-input" type="checkbox" value="1" name="check_dusting<?php echo $temp; ?>" <?php if ($result_dusting == 1) echo 'checked'; ?>>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label class="form-check-label" for="check_elec">
                                                                    <h6 class="card-text text-light">Electronics: </h6>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="col-lg-6">
                                                                    <input class="form-check-input" type="checkbox" value="1" name="check_elec<?php echo $temp; ?>" <?php if ($result_elec == 1) echo 'checked'; ?>>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row pt-3 align-items-center justify-content-center">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="select-all<?php echo $temp; ?>" id="select-all<?php echo $temp; ?>" onclick="checkCheckboxes(this.id, 'clean-options<?php echo $temp; ?>');">
                                                                <label class=" form-check-label" for="select-all<?php echo $temp; ?>">
                                                                    <h6 class="card-text text-light">Select all</h6>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <input type="hidden" name="temp" value="<?php echo $temp; ?>">
                                                        <input type="hidden" name="room_number" value="<?php echo $row['Room_Number']; ?>">
                                                        <input type="hidden" name="room_status_id" value="<?php echo $row['Room_Status_ID']; ?>">

                                                        <div class="text-center pb-3 pt-3">
                                                            <!-- <form action="" method="POST"> -->
                                                            <button type="submit" class="btn btn-success" name="submit" id="submit<?php echo $temp; ?>">Submit
                                                                <!-- </button> -->
                                                    </form>

                                                </div>

                                                <div class="text-center pb-3 pt-3">
                                                    <button onclick="location.href='house_keeping.php?update=<?php echo $row['Room_Number']; ?>'" class="btn btn-success" type="submit" name="convert-room<?php echo $temp ?>">Convert to <br>Maintenance
                                                    </button>
                                                </div>


                                                </form>

                                                <?php


                                                ?>


                                            </div>
                                    </div>
                                    </a>
                                </div>

                                </div>

                                <?php
                                if ($temp % 3 == 0) {
                                ?>
                    </div>

                    <div class="row">

                <?php
                                }
                                $temp++;
                            }
                ?>
                    </div>

                    <!---- COPYRIGHT --->
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

<script>
    function checkCheckboxes(id, pID) {
        $('#' + pID).find(':checkbox').each(function() {
            jQuery(this).prop('checked', $('#' + id).is(':checked'));
        });
    }
</script>

</html>
<!-- end document-->