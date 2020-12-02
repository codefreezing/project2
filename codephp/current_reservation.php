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
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php
        include "menu.php";
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <?php
            $fname = isset($_GET["Fname"]) ? $_GET["Fname"] : '';
            $lname = isset($_GET["Lname"]) ? $_GET["Lname"] : '';
            $date_made = isset($_GET["Date_Made"]) ? $_GET["Date_Made"] : '';
            $date_checkin = isset($_GET["Check_In_Date"]) ? $_GET["Check_In_Date"] : '';
            $date_checkout = isset($_GET["Check_Out_Date"]) ? $_GET["Check_Out_Date"] : '';
            $room_type = isset($_GET["Room_Info"]) ? $_GET["Room_Info"] : '';
            $room_number = isset($_GET["Room_Number"]) ? $_GET["Room_Number"] : '';
            $web_made = isset($_GET["Web_Made"]) ? ($_GET["Web_Made"] == 'Yes' ? 1 : 0) : 0;
            $rate = isset($_GET["Room_Rate"]) ? $_GET["Room_Rate"] : '';
            $total_charge = isset($_GET["Total_Charge"]) ? $_GET["Total_Charge"] : '';
            $bookingid = isset($_GET["BookingID"]) ? $_GET["BookingID"] : '';
            $guestid = isset($_GET["GuestID"]) ? $_GET["GuestID"] : '';

            $mdate_out = new DateTime($date_checkout);
            $mdate_in = new DateTime($date_checkin);

            $interval = $mdate_out->diff($mdate_in);
            $diff = $interval->days;

            $result = '';


            if (isset($_POST["submitEdit"])) {
                $fname = isset($_POST["fname"]) ? $_POST["fname"] : '';
                $lname = isset($_POST["lname"]) ? $_POST["lname"] : '';
                $date_made = isset($_POST["date-made"]) ? $_POST["date-made"] : '';
                $date_checkin = isset($_POST["date-checkin"]) ? $_POST["date-checkin"] : '';
                $date_checkout = isset($_POST["date-checkout"]) ? $_POST["date-checkout"] : '';
                $room_type = isset($_POST["room-type"]) ? $_POST["room-type"] : '';
                $room_number = isset($_POST["room-number"]) ? $_POST["room-number"] : '';
                $web_made = isset($_POST["web-made"]) ? ($_POST["web-made"] == 'Yes' ? 1 : 0) : 0;
                $rate = isset($_POST["room-rate"]) ? $_POST["room-rate"] : '';
                $total_charge = isset($_POST["total-charge"]) ? $_POST["total-charge"] : '';

                $check_dups = DB::query("SELECT Date FROM Record WHERE (Date BETWEEN %s AND (SELECT DATE_SUB(%s, INTERVAL 1 DAY))) AND Room_Number=%s AND BookingID<>%s", $date_checkin, $date_checkout, $room_number, $bookingid);

                if (!$check_dups) {
                    $update_name = DB::update('Guest', ['Fname' => $fname, 'Lname' => $lname], "Guest_ID=%s", $guestid);
                    $update_made = DB::update('Booking', ['Date_Made' => $date_made, 'Website_Reservation' => $web_made], "BookingID=%s", $bookingid);

                    $mdate_out = new DateTime($date_checkout);
                    $mdate_in = new DateTime($date_checkin);

                    $interval = $mdate_out->diff($mdate_in);
                    $diff = $interval->days;

                    $delete_record = DB::query("DELETE FROM Record WHERE BookingID=%s", $bookingid);
                    $input_record = DB::query("INSERT INTO Record(Room_Number, Date, BookingID, Record_Status_Code) VALUES (%s, %s, %s, 0)", $room_number, $date_checkin, $bookingid);

                    for ($i = 1; $i < $diff; $i++) {
                        $mdate_in = date('Y-m-d', strtotime($date_checkin . ' + ' . $i . 'days'));
                        $input_record = DB::query("INSERT INTO Record(Room_Number, Date, BookingID, Record_Status_Code) VALUES (%s, %s, %s, 0)", $room_number, $mdate_in, $bookingid);
                    }

                    if ($update_name && $update_made && $delete_record && $input_record) {

                        $result = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> The reservation has been updated.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    } else {
                        $result = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> There was something wrong with updating the reservation.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    }
                } else {
                    $result = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> This room has been reserved by someone else.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                }
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
                                    $roomlist = DB::query("SELECT Room_Number, Room_Rate, Room_Info FROM Room, Price WHERE Room.Room_Type = Price.Room_Type ORDER BY Room.Room_Number ASC");
                                    ?>


                                    <div class="d-flex justify-content-center align-items-center container">
                                        <form action="" method="POST">

                                            <div class=" form-group row justify-content-center align-self-center">
                                                <div class="col-lg-12 col-sm-offset-2">
                                                    <?php echo $result; ?>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <h2 class="text-center">Edit a guest reservation.</h2>
                                            </div>

                                            <div class="form-group row">
                                                <label for="fnameInput">First Name</label>
                                                <input required class="form-control" name="fname" id="fnameInput" value="<?php echo $fname ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="lnameInput">Last Name</label>
                                                <input required class="form-control" name="lname" id="lnameInput" value="<?php echo $lname ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-made">Date Made</label>
                                                <input required class="form-control" type="date" name="date-made" id="date-made" onchange="checkDateMade(this.value)" placeholder="MM/DD/YYYY" value="<?php echo $date_made ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-checkin">Date Checkin</label>
                                                <input required class="form-control" type="date" name="date-checkin" id="date-checkin" onchange="checkDateIn(this.value); updateChargeOnCheckIn(this)" placeholder="MM/DD/YYYY" value="<?php echo $date_checkin ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-checkout">Date Checkout</label>
                                                <input required class="form-control" type="date" name="date-checkout" id="date-checkout" onchange="checkDateOut(this.value); updateChargeOnCheckOut(this)" placeholder="MM/DD/YYYY" value="<?php echo $date_checkout ?>">
                                            </div>

                                            <div class=" form-group row">
                                                <label for="room-number">Room Number</label>
                                                <?php
                                                echo "<select class=\"form-control\" name=\"room-number\" id=\"room-number\" onchange=\"updateChargeOnRoom(this)\">";

                                                if (!empty($room_number)) {
                                                    echo "<option value='" . $room_number . "' selected='selected'>" . $room_number . "</option>";
                                                    echo "<option disabled>--------</option>";
                                                }

                                                foreach ($roomlist as $row) {
                                                    echo "<option value='" . $row['Room_Number'] . "'>" . $row['Room_Number'] . "</option>";
                                                }

                                                echo "</select>";
                                                ?>
                                            </div>

                                            <div class="form-group row">
                                                <label for="room-type">Room Type</label>
                                                <?php

                                                if (!empty($room_number)) {
                                                    $query_type = DB::query("SELECT Room_Info FROM Room, Price WHERE Room.Room_Type = Price.Room_Type AND Room_Number={$room_number}");
                                                    foreach ($query_type as $type) {
                                                        echo "<input required readonly class=\"form-control\" name=\"room-type\" id=\"room-type\" value='" . $type['Room_Info'] . "'>";
                                                    }
                                                }

                                                ?>

                                            </div>


                                            <div class="form-group row">
                                                <label for="web-made">Website Reservation Made</label>
                                                <select required class="form-control" name="web-made" id="web-made">
                                                    <option value='<?php echo ($web_made == 1) ? 'Yes' : 'No' ?>' selected='selected'><?php echo ($web_made == 1) ? 'Yes' : 'No' ?></option>
                                                    <option disabled>----------</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="rate">Daily Rate ($/Day)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>

                                                    <?php

                                                    if (!empty($room_number)) {
                                                        $query_rate = DB::query("SELECT Room_Rate FROM Room, Price WHERE Room.Room_Type = Price.Room_Type AND Room_Number = {$room_number}");
                                                        foreach ($query_rate as $type) {
                                                            echo "<input required readonly class=\"form-control\" name=\"room-rate\" id=\"room-rate\" value='" . $type['Room_Rate'] .  "'>";
                                                        }
                                                    }
                                                    ?>


                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="total-charge">Total Charge ($)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <?php

                                                    if (!empty($room_number)) {
                                                        $query_rate = DB::query("SELECT Room_Rate FROM Room, Price WHERE Room.Room_Type = Price.Room_Type AND Room_Number = {$room_number}");
                                                        foreach ($query_rate as $type) {
                                                            echo "<input required readonly class=\"form-control\" name=\"total-charge\" id=\"total-charge\" value='" . ($type['Room_Rate']  * $diff) .  "'>";
                                                        }
                                                    }
                                                    ?> </div>
                                            </div>

                                            <div class="row pt-3 justify-content-center align-self-center">
                                                <div class="form-group pt-4">
                                                    <div class="btn-group btn-block">

                                                        <button class="btn btn-lg btn-success mr-2 text-light rounded" id="submitEdit" name="submitEdit" type="submit">Update</button>
                                                        <a href="current_stay.php?bookingid=<?php echo $bookingid; ?>&Fname=<?php echo $fname; ?>&Lname=<?php echo $lname; ?>&Date_Made=<?php echo $date_made; ?>&Check_In_Date=<?php echo $date_checkin; ?>&Check_Out_Date=<?php echo $date_checkout; ?>&Room_Info=<?php echo $room_type; ?>&Room_Number=<?php echo $room_number; ?>&Web_Made=<?php echo $web_made; ?>&Room_Rate=<?php echo $rate; ?>&Total_Charge=<?php echo $total_charge; ?>" class="btn btn-lg btn-success ml-2 text-light rounded">Check In</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center align-self-center">
                                                <div class="form-group ">
                                                    <div class="btn-group btn-block">
                                                        <a href="reservation.php" class="btn btn-lg btn-danger ml-2 text-light rounded">Go Back</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>


                                    <!-- abc1 -->
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
<script>
    function updateChargeOnCheckIn(elem) {
        var room_number = $("#room-number").val();
        var fname = $("#fnameInput").val();
        var lname = $("#lnameInput").val();
        var date_made = $("#date-made").val();
        var date_in = elem.value;
        var date_out = $("#date-checkout").val();
        var room_type = $("#room-type").val();
        var web_made = $("#web-made").val();

        location.href = "current_reservation.php?BookingID=<?php echo $bookingid ?>" +
            "&GuestID=<?php echo $guestid ?>" + "&Room_Number=" + room_number + "&Date_Made=" + date_made +
            "&Check_Out_Date=" + date_out + "&Check_In_Date=" + date_in + "&Fname=" + fname + "&Lname=" + lname +
            "&Room_Info=" + room_type + "&Web_Made=" + web_made;
    }

    function updateChargeOnCheckOut(elem) {
        var room_number = $("#room-number").val();
        var fname = $("#fnameInput").val();
        var lname = $("#lnameInput").val();
        var date_made = $("#date-made").val();
        var date_in = $("#date-checkin").val();
        var date_out = elem.value;
        var room_type = $("#room-type").val();
        var web_made = $("#web-made").val();

        location.href = "current_reservation.php?BookingID=<?php echo $bookingid ?>" +
            "&GuestID=<?php echo $guestid ?>" + "&Room_Number=" + room_number + "&Date_Made=" + date_made +
            "&Check_Out_Date=" + date_out + "&Check_In_Date=" + date_in + "&Fname=" + fname + "&Lname=" + lname +
            "&Room_Info=" + room_type + "&Web_Made=" + web_made;
    }

    function updateChargeOnRoom(elem) {
        var room_number = elem.value;
        var fname = $("#fnameInput").val();
        var lname = $("#lnameInput").val();
        var date_made = $("#date-made").val();
        var date_in = $("#date-checkin").val();
        var date_out = $("#date-checkout").val();
        var room_type = $("#room-type").val();
        var web_made = $("#web-made").val();

        location.href = "current_reservation.php?BookingID=<?php echo $bookingid ?>" +
            "&GuestID=<?php echo $guestid ?>" + "&Room_Number=" + room_number + "&Date_Made=" + date_made +
            "&Check_Out_Date=" + date_out + "&Check_In_Date=" + date_in + "&Fname=" + fname + "&Lname=" + lname +
            "&Room_Info=" + room_type + "&Web_Made=" + web_made;
    }

    function checkDateMade(date_made) {
        var today = new Date();
        current_date = convertDate(today);

        if (date_made < current_date) {
            alert("Date Made can't be a past date.")
            document.getElementById("date-made").value = current_date;
        }

    }

    function convertDate(date) {
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth() + 1).toString();
        var dd = date.getDate().toString();

        var mmChars = mm.split('');
        var ddChars = dd.split('');

        return yyyy + '-' + (mmChars[1] ? mm : "0" + mmChars[0]) + '-' + (ddChars[1] ? dd : "0" + ddChars[0]);
    }

    function checkDateIn(date_in) {
        var date_made = document.getElementById("date-made").value;
        var date_out = document.getElementById("date-checkout").value;


        if (date_in < date_made) {
            alert("Date Made can't be later than Checkin Date.");
            document.getElementById("date-checkin").value = document.getElementById("date-made").value;
            document.getElementById("date-checkin").stepUp(1);
        }
        if (date_in > date_out) {
            alert("Checkin Date can't be later than Checkout Date.");
            document.getElementById("date-checkin").value = document.getElementById("date-made").value;
            document.getElementById("date-checkin").stepUp(1);
        }
    }

    function checkDateOut(date_out) {
        var date_in = document.getElementById("date-checkin").value;

        if (date_out <= date_in) {
            alert("Checkin Date can't be later than or equal to Checkout Date.");
            document.getElementById("date-checkout").value = document.getElementById("date-checkin").value;
            document.getElementById("date-checkout").stepUp(1);
        }
    }
</script>

</html>
<!-- end document-->