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
            $result = '';

            if (!empty($_POST) && isset($_POST["submit"])) {

                $fname = isset($_POST["fname"]) ? $_POST["fname"] : '';
                $lname = isset($_POST["lname"]) ? $_POST["lname"] : '';
                $date_made = isset($_POST["date-made"]) ? $_POST["date-made"] : '';
                $date_checkin = isset($_POST["date-checkin"]) ? $_POST["date-checkin"] : '';
                $date_checkout = isset($_POST["date-checkout"]) ? $_POST["date-checkout"] : '';
                $room_type = isset($_POST["room-type"]) ? $_POST["room-type"] : '';
                $room_number = isset($_POST["room-number"]) ? $_POST["room-number"] : '';
                $web_made = isset($_POST["web-made"]) ? ($_POST["web-made"] == 'Yes' ? 1 : 0) : 0;
                $rate = isset($_POST["rate"]) ? $_POST["rate"] : '';
                $total_charge = isset($_POST["total-charge"]) ? $_POST["total-charge"] : '';

                $input_name = DB::insert('Guest', [
                    'Fname' => $fname,
                    'Lname' => $lname,
                ]);

                $booking_id = DB::query("SELECT BookingID FROM Booking ORDER BY BookingID DESC LIMIT 1");
                $input_booking = DB::query("INSERT INTO Booking(Guest_ID, Website_Reservation, Date_Made) VALUES ( (SELECT Guest_ID FROM Guest ORDER BY Guest_ID DESC LIMIT 1), %s, %s)", $web_made, $date_made);

                // Check if room was reserved.
                $check_dups = DB::query("SELECT Date FROM Record WHERE (Date BETWEEN %s AND (SELECT DATE_SUB(%s, INTERVAL 1 DAY))) AND Room_Number=%s", $date_checkin, $date_checkout, $room_number);

                // calculate different between two dates
                if (!$check_dups) {
                    $mdate_out = new DateTime($date_checkout);
                    $mdate_in = new DateTime($date_checkin);
                    //debug($mdate_in);
                    $interval = $mdate_out->diff($mdate_in);

                    $diff = $interval->days;
                    $input_record = DB::query("INSERT INTO Record(Room_Number, Date, BookingID, Record_Status_Code) VALUES (%s, %s, (SELECT BookingID FROM Booking ORDER BY BookingID DESC LIMIT 1), 0)", $room_number, $date_checkin);

                    for ($i = 1; $i < $diff; $i++) {
                        $mdate_in = date('Y-m-d', strtotime($date_checkin . ' + ' . $i . 'days'));

                        $input_record = DB::query("INSERT INTO Record(Room_Number, Date, BookingID, Record_Status_Code) VALUES (%s, %s, (SELECT BookingID FROM Booking ORDER BY BookingID DESC LIMIT 1), 0)", $room_number, $mdate_in);
                    }

                    if ($input_record) {

                        $result = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The reservation has been created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                    } else {
                        // header('Location: /current_reservation.php', TRUE, 303);
                        // die('Invalid query: ');
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


            $room_number = isset($_GET["room_number"]) ? $_GET["room_number"] : '';
            $current_web_made = isset($_GET["web_made"]) ? $_GET["web_made"] : '';
            $current_fname = isset($_GET["fname"]) ? $_GET["fname"] : '';
            $current_lname = isset($_GET["lname"]) ? $_GET["lname"] : '';
            $current_date_made = isset($_GET["date_made"]) ? $_GET["date_made"] : '';
            $current_date_in = isset($_GET["date_in"]) ? $_GET["date_in"] : '';
            $current_date_out = isset($_GET["date_out"]) ? $_GET["date_out"] : '';

            $mdate_out = new DateTime($current_date_out);
            $mdate_in = new DateTime($current_date_in);

            $interval = $mdate_out->diff($mdate_in);
            $diff = $interval->days;
            //debug($diff);

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
                                        <form name="RegistrationForm" method="post">
                                            <div class="form-group row justify-content-center align-self-center">
                                                <div class="col-lg-12 col-sm-offset-2">
                                                    <?php echo $result; ?>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <h2 class="text-center">Create a guest reservation.</h2>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fnameInput">First Name</label>
                                                <input required class="form-control" type="text" name="fname" id="fnameInput" value="<?php echo (!empty($current_fname)) ? $current_fname : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="lnameInput">Last Name</label>
                                                <input required class="form-control" type="text" name="lname" id="lnameInput" value="<?php echo (!empty($current_lname)) ? $current_lname : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-made">Date Made</label>
                                                <input required class="form-control" type="date" name="date-made" id="date-made" onchange="checkDateMade(this.value)" placeholder=" MM/DD/YYYY" value="<?php echo (!empty($current_date_made)) ? $current_date_made : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-checkin">Date Checkin</label>
                                                <input required class="form-control" type="date" name="date-checkin" id="date-checkin" onchange="checkDateIn(this.value)" placeholder="MM/DD/YYYY" value="<?php echo (!empty($current_date_in)) ? $current_date_in : '' ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-checkout">Date Checkout</label>
                                                <input required class="form-control" type="date" name="date-checkout" id="date-checkout" onchange="checkDateOut(this.value)" placeholder="MM/DD/YYYY" value="<?php echo (!empty($current_date_out)) ? $current_date_out : '' ?>">
                                            </div>

                                            <div class=" form-group row">
                                                <label for="room-number">Room Number</label>

                                                <?php

                                                echo "<select required class=\"form-control\" name=\"room-number\" id=\"room-number\" onchange=\"update(this)\">";

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
                                                } else {
                                                    echo "<input required readonly class=\"form-control\" name=\"room-type\" id=\"room-type\" value=\"\">";
                                                }

                                                ?>

                                            </div>

                                            <div class="form-group row">
                                                <label for="web-made">Website Reservation Made</label>
                                                <?php
                                                echo "<select required class=\"form-control\" name=\"web-made\" id=\"web-made\">";

                                                if (!empty($current_web_made)) {
                                                    echo "<option selected value='" . $current_web_made . "'>" . $current_web_made . "</option>";
                                                    echo "<option disabled>--------</option>";
                                                }
                                                ?>
                                                <option>Yes</option>
                                                <option>No</option>

                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="rate">Daily Rate ($/Day)</label>
                                                <div class="input-group">

                                                    <!-- <select class="form-control currency" name="room-rate" id="room-rate"> -->
                                                    <span class="input-group-addon">$</span>

                                                    <?php

                                                    if (!empty($room_number)) {
                                                        $query_rate = DB::query("SELECT Room_Rate FROM Room, Price WHERE Room.Room_Type = Price.Room_Type AND Room_Number = {$room_number}");
                                                        foreach ($query_rate as $type) {
                                                            echo "<input required readonly class=\"form-control\" name=\"room-rate\" id=\"room-rate\" value='" . $type['Room_Rate'] .  "'>";
                                                        }
                                                    } else {
                                                        echo "<input required readonly class=\"form-control\" name=\"room-rate\" id=\"room-rate\" value=\"\">";
                                                    }
                                                    ?>


                                                    </select>
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
                                                    } else {
                                                        echo "<input required readonly class=\"form-control\" name=\"total-charge\" id=\"total-charge\" value=\"\">";
                                                    }
                                                    ?>
                                                </div>
                                            </div>



                                            <div class="row pt-3 justify-content-center align-self-center">
                                                <div class="form-group pt-4">
                                                    <div class="btn-group btn-block">
                                                        <p><a href="reservation.php" class="btn btn-lg btn-primary mr-2 text-light rounded">Go Back</a></p>
                                                        <p><button class="btn btn-lg btn-primary ml-2 text-light rounded" id="submit" name="submit" type="submit">Submit</button></a>
                                                    </div>
                                                </div>

                                            </div>


                                        </form>
                                    </div> <!-- copyright section -->

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

<script type="text/javascript">
    function update(elem) {
        var value = elem.value;
        var web_made = $("#web-made").val();
        var fname = $("#fnameInput").val();
        var lname = $("#lnameInput").val();
        var date_made = $("#date-made").val();
        var date_in = $("#date-checkin").val();
        var date_out = $("#date-checkout").val();

        location.href = "create_reservation.php?room_number=" + value + "&web_made=" + web_made + "&fname=" + fname +
            "&lname=" + lname + "&date_made=" + date_made + "&date_in=" + date_in + "&date_out=" + date_out;
    }


    function checkDateMade(date_made) {
        var date_in = document.getElementById("date-checkin").value;
        var date_out = document.getElementById("date-checkout").value;

        var today = new Date();
        current_date = convertDate(today);

        if (date_made < current_date) {
            alert("Date Made can't be a past date.")
            document.getElementById("date-made").value = current_date;
        }

        if (date_in !== '' && date_made > date_in) {
            alert("Date Made can't be later than Checkin Date.")
            document.getElementById("date-made").value = document.getElementById("date-checkin").value
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

        var today = new Date();
        current_date = convertDate(today);

        if (date_made === '' && date_in < current_date) {
            alert("Checkin Date can't be in the past.");
            document.getElementById("date-checkin").value = current_date;
        }


        if (date_in !== '0' && date_in < date_made) {
            alert("Date Made can't be later than Checkin Date.");
            document.getElementById("date-checkin").value = document.getElementById("date-made").value;
            document.getElementById("date-checkin").stepUp(1);
        }
    }

    function checkDateOut(date_out) {
        var date_in = document.getElementById("date-checkin").value;
        var date_out = document.getElementById("date-checkout").value;

        var today = new Date();
        current_date = convertDate(today);

        if (date_out < current_date) {
            alert("Checkout Date can't be in the past.");
            document.getElementById("date-checkout").value = current_date;
            document.getElementById("date-checkout").stepUp(1);
        }

        if (date_out <= date_in) {
            alert("Checkin Date can't be later than or equal to Checkout Date.");
            document.getElementById("date-checkout").value = document.getElementById("date-checkin").value;
            document.getElementById("date-checkout").stepUp(1);
        }
    }
</script>

</html>
<!-- end document-->