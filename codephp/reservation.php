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
            if (isset($_GET["del"])) {
                $id = $_GET["del"];

                $delete_query1 = DB::query("DELETE FROM Record WHERE BookingID = {$id}");
                $delete_query2 = DB::query("DELETE FROM Booking WHERE BookingID = {$id}");
                //debug($delete_query);

                if ($delete_query1 && $delete_query2) {

                    $result = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The reservation has been deleted.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                } else {
                    $result = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong>There was something wrong with deleting the reservation.
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
                            <div class="col-md-12">

                                <div class="row text-center justify-content-center align-self-center">
                                    <div class="col-md-6 col-sm-offset-2">
                                        <?php echo $result; ?>
                                    </div>
                                </div>
                                <div class="overview-wrap text-center">
                                    <h2 class="title-1 text-center">All Reservations</h2>
                                </div>
                            </div>
                        </div>



                        <div class="row m-t-25">

                            <div class="table-responsive pb-3">
                                <table id="reservationList" class="table table-striped table-hover table-sm">
                                    <thead class="bg-dark text-white thead-dark">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Date Made</th>
                                            <th>Date In</th>
                                            <th>Date Out</th>
                                            <th>Room Type</th>
                                            <th>Room Number</th>
                                            <th>Website Made</th>
                                            <th>Room Rate</th>
                                            <th>Total Charge</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $roomlist = DB::query("SELECT Booking.BookingID AS BookingID, Record_Status_Code, Lname, Fname, Date_Made, Room_Rate, Room_Info, Website_Reservation as Web_Made, Room.Room_Number as Room_Number, Room.Room_Status_ID as Room_Status_ID, Check_In_Date, Check_Out_Date, Amount_Of_Day, Guest.Guest_ID AS Guest_ID 
                                    FROM ( SELECT Room_Number, BookingID, MIN(Date) AS Check_In_Date, ADDDATE(MIN(Date),COUNT(*)) AS Check_Out_Date, MIN(Record_Status_Code) AS Record_Status_Code, COUNT(*) AS Amount_Of_Day
                                    FROM Record WHERE Record_Status_Code = 0 GROUP BY Room_Number, BookingID ) AS X 
                                    INNER JOIN Booking ON Booking.BookingID = X.BookingID 
                                    INNER JOIN Guest ON Booking.Guest_ID = Guest.Guest_ID 
                                    INNER JOIN Room ON X.Room_Number = Room.Room_Number 
                                    INNER JOIN Price ON Room.Room_Type = Price.Room_Type ");
                                        //debug($roomlist);

                                        foreach ($roomlist as $row) :
                                            $total_charge = 0;
                                            $total_charge = $row['Room_Rate'] * $row['Amount_Of_Day'];
                                            $booking_id = $row['BookingID'];
                                            $room_status = $row['Room_Status_ID'];

                                        ?>
                                            </form method="Post">
                                            <tr class="clickable-row" id="aRow" style="cursor: pointer;" onclick="location.href='current_reservation.php?GuestID=<?php echo $row['Guest_ID'] ?>&BookingID=<?php echo $row['BookingID'] ?>&Fname=<?php echo $row['Fname'] ?>&Lname=<?php echo $row['Lname'] ?>&Date_Made=<?php echo $row['Date_Made'] ?>&Check_In_Date=<?php echo $row['Check_In_Date'] ?>&Check_Out_Date=<?php echo $row['Check_Out_Date'] ?>&Room_Info=<?php echo $row['Room_Info'] ?>&Room_Number=<?php echo $row['Room_Number'] ?>&Web_Made=<?php echo $row['Web_Made'] == 1 ? 'Yes' : 'No' ?>&Room_Rate=<?php echo $row['Room_Rate'] ?>&Total_Charge=<?php echo $total_charge ?>'">
                                                <td id=" clickable-row"><?php echo $row['Fname']; ?></td>
                                                <td id="clickable-row"><?php echo $row['Lname']; ?></td>
                                                <td id="clickable-row"><?php echo $row['Date_Made']; ?></td>
                                                <td id="clickable-row"><?php echo $row['Check_In_Date']; ?></td>
                                                <td id="clickable-row"><?php echo $row['Check_Out_Date']; ?></td>
                                                <td id="clickable-row"><?php echo $row['Room_Info']; ?></td>
                                                <td id="clickable-row"><?php echo $row['Room_Number'];
                                                                        echo ($room_status == 2) ? ' (*)' : '' ?></td>
                                                <td id="clickable-row"><?php echo $row['Web_Made'] == 1 ? 'Yes' : 'No' ?></td>
                                                <td id="clickable-row"><?php echo "$" . $row['Room_Rate']; ?></td>
                                                <td id="clickable-row"><?php echo "$" . $total_charge; ?></td>
                                                <td> <a type="submit" href="reservation.php?del=<?php echo $row['BookingID'] ?>" class="btn btn-default btn-sm" name="delete" id="delete" /> <span class="fas fa-trash"> </span></a> </td>
                                            </tr>
                                            </form>

                                        <?php
                                        endforeach; ?>

                                    </tbody>
                                </table>
                                <span>(*) Room in Maintenance</span>
                            </div>
                        </div>

                        <div class="row pt-3 justify-content-center align-self-center">
                            <form action="" method=" POST">
                                <div class="btn-group btn-block pb-10 ">
                                    <a href="create_reservation.php" class="btn btn-lg btn-success text-light rounded">Create Reservation</a>
                                </div>
                            </form>
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

    <script type="text/javascript">
        $('table').on('click', '#delete', function() {
            $(this).parents('tr').remove();

        });

        $('.table').on('click', '.clickable-row', function(event) {
            if ($(this).hasClass('bg-secondary')) {
                $(this).removeClass('bg-secondary');
            } else {
                $(this).addClass('bg-secondary').siblings().removeClass('bg-secondary');
            }
        });
    </script>

</body>

</html>
<!-- end document-->