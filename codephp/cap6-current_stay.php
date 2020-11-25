<?php
// Start the session
session_start();
$_SESSION["menu"] = 6;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        var data_rate = {}
        var data_info = {}        
    </script>
<?php
include "db.class.php";
include "debug.php";
include "head.php";

// INITIALIZE
$bookingid = $roomid = $datacheck = "";
$guestid = $fname = $lname = $checkin_date = $checkin_time = $checkout_date = $checkout_time = $room_type = '';
$room_number = $paid = '';
$room_type = $balance = $rate = $total_charge = '';
$readonly_room_number = '';
$readonly_checkin_date = '';
$readonly_checkin_time = '';
$record_status_code = '';

// $rate, $total_charge, $balance;
$errors = array('fname' => '','lname'=>'', 'checkin_date'=>'','checkin_time' => '','checkout_date'=>'', 'checkout_time'=>'','room_type' => '','room_number'=>'', 'paid'=>'', 'room_type' =>'','balance' =>'');
$data_rate = array();
$data_info = array();
$roomlist = DB::query("SELECT Room_Number, Room_Rate, Room_Info
FROM Room
INNER JOIN Price
ON Room.Room_Type = Price.Room_Type
ORDER BY Room_Number");
$totalPaid = 0;
$temp = 1;
foreach ($roomlist as $row):
    $data_rate[$row['Room_Number']]= $row['Room_Rate'];
    $data_info[$row['Room_Number']]= $row['Room_Info'];
    if ($temp==1):
        $temp += 1;
?>
    <script type="text/javascript">
<?php endif; ?>    

    data_rate["<?php echo $row['Room_Number']; ?>"] = "<?php echo $row['Room_Rate']; ?>";
    data_info["<?php echo $row['Room_Number']; ?>"] = "<?php echo $row['Room_Info']; ?>";
    

<?php
endforeach;
?>
    </script>
<?php



 
if(isset($_POST['checkin'])){
    
   
    if (!empty($_POST['bookingid'])){
        $bookingid=  htmlspecialchars($_POST['bookingid']);
    }



    // IF OTHER CAPABILITIES SEND REQUEST, UPDATE $bookingid here

    // GET FIELDS OF FORM
    // check fields
    if (empty($_POST['fname'])){
        $errors['fname'] =  'First name is required <br />';
    } else {
        $fname = $_POST['fname'];
    }
    if (empty($_POST['lname'])){
        $errors['lname'] =  'Last name is required <br />';
    } else {
        $lname = $_POST['lname'];
    }
    if (empty($_POST['checkin_date'])){
        $errors['checkin_date'] =  'Check-In Date is required <br />';
    } else {
        $checkin_date = $_POST['checkin_date'];
    }
    if (empty($_POST['checkin_time'])){
        $errors['checkin_time'] =  'Check-In Time is required <br />';
    } else {
        $checkin_time = $_POST['checkin_time'];
    }
    if (empty($_POST['checkout_date'])){
        $errors['checkout_date'] =  'Check-Out Date is required <br />';
    } else {
        $checkout_date = $_POST['checkout_date'];
    }
    if (empty($_POST['checkout_time'])){
        $errors['checkout_time'] =  'Check-Out Time is required <br />';
    } else {
        $checkout_time = $_POST['checkout_time'];
    }
    if (empty($_POST['room_number'])){
        $errors['room_number'] =  'Room Number is required <br />';
    } else {
        $room_number = $_POST['room_number'];
    }
    if (empty($_POST['room_type'])){
        $errors['room_number'] =  'Room Number is not valid <br />';    // notify room_number
    } else{
        $room_type = $_POST['room_type'];
    }
    if (empty($_POST['paid'])){
        $errors['paid'] =  'Amount of Paid is required <br />';
    } else {
        $paid = $_POST['paid'];
    }
    if (empty($_POST['balance'])){
        $errors['paid'] =  'Amount of Paid is not valid <br />';    // notify paid
    } else {
        $balance = $_POST['balance'];        
    }
    if (!empty($_POST['rate'])){
        $rate = $_POST['rate'];
    }
    if (!empty($_POST['total_charge'])){
        $total_charge = $_POST['total_charge'];
    }
    if (!empty($_POST['guestid'])){
        $guestid = $_POST['guestid'];
    }
    if (!empty($_POST['readonly_room_number'])){
        $readonly_room_number = $_POST['readonly_room_number'];
    }
    if (!empty($_POST['readonly_checkin_date'])){
        $readonly_checkin_date = $_POST['readonly_checkin_date'];
    }
    if (!empty($_POST['readonly_checkin_time'])){
        $readonly_checkin_time = $_POST['readonly_checkin_time'];
    }
    if (!empty($_POST['record_status_code'])){
        $record_status_code = $_POST['record_status_code'];
    }
    
    
    




    
    if(array_filter($errors)){  // no errors in every field
            // echo 'erros in the form';
    } else {

        // ADD OR UPDATE RECORD TABLE
        if ($bookingid == ""){  // + ADD TO BOOKING TABLE, ADD RECORD TABLE (not link from other pages)


        } else {

            if ($record_status_code == 0) { // IF CHECK IN, UPDATE RECORD TABLE, ADD INVOICE TABLE
                $query = "SELECT * FROM Record WHERE BookingID != ".$bookingid." AND Room_Number = ".$room_number." AND Date < '".$checkout_date."' AND Date >= '".$checkin_date."'";  
                $bookinglist = DB::query($query);
                if (!empty($bookinglist)){                                                   
                    $errors['checkin_date'] =  'Preview check-in date !! <br />';
                    $errors['checkout_date'] =  'Preview check-out date !! <br />';
                    $errors['room_number'] =  'Room is not available at least one day between these time.<br />';
                } else {
                    $query = "DELETE FROM Record WHERE BookingID = ".$bookingid;  
                    $bookinglist = DB::query($query);

                    $created_date = strtotime($checkin_date);
                    $created_date2 = strtotime($checkout_date);                    
                    $recordlist = "('".$checkin_date."', '".$room_number."', '".$bookingid."', '0');";
                    $newdate = strtotime ( '+1 day' , $created_date) ;
                    // abc1
                    for (; $newdate < $created_date2; $newdate = strtotime ( '+1 day' , $newdate)) {
                        $tempdate = date ('Y-m-d' , $newdate );
                        $recordlist = "('".$tempdate ."', '".$room_number."', '".$bookingid."', '0'),".$recordlist;
                        
                    }                    
                    $query = "INSERT INTO `Record` (`Date`, `Room_Number`, `BookingID`, `Record_Status_Code`) VALUES ".$recordlist;  
                    $bookinglist = DB::query($query);
                    //ADD INVOICE TALBE + INVOICE ROOM TABLE
                    $created_date = date("Y-m-d H:i", strtotime($checkin_date." ".$checkin_time));
                    $created_date2 = date("Y-m-d H:i", strtotime($$checkout_date." ".$checkout_time));

                    $query = "INSERT INTO `Invoice` (`Invoice_ID`, `Date_Checked_In`, `Date_Checkout`, `Payment_Made`, `Total_Charge`, `Completed`, `Guest_ID`, `Booking_ID`) VALUES (NULL, '".$created_date."', '".$created_date2."', '".$paid."', '".$total_charge."', '0', '".$guestid."', '".$bookingid."')";
                    $bookinglist = DB::query($query);

                    // UPDATE ROOM TABLE + HOUSEKEEPING TABLE

                }


                
            } else {    // IF CHECK OUT, UPDATE RECORD TABLE, UPDATE INVOICE TABLE

            }
        }







        // header('Location: index.php');  // if no error, redirect page to index.php
    }
} else {
    if (isset($_GET['bookingid'])){
        $bookingid = htmlspecialchars($_GET['bookingid']);
    } elseif (isset($_GET['datecheck'])){
        $datecheck = htmlspecialchars($_GET['datecheck']);
        if (isset($_GET['roomid'])){
            $roomid = htmlspecialchars($_GET['roomid']);
            $query = "SELECT * FROM Record WHERE Date = '".$datecheck."' AND Room_Number = '".$roomid."'";        
            $bookinglist = DB::query($query);
            if (!empty($bookinglist)){
                $bookingid = $bookinglist[0]['BookingID'];
            }                
        }    
    } elseif (isset($_GET['roomid'])){    
        $roomid = htmlspecialchars($_GET['roomid']);
        $datecheck = date("Y-m-d");    
        $query = "SELECT * FROM Record WHERE Date = '".$datecheck."' AND Room_Number = '".$roomid."'";
        $bookinglist = DB::query($query);
        if (!empty($bookinglist)){
            $bookingid = $bookinglist[0]['BookingID'];
        }     
    }


    if ($bookingid == ''){
        if ($datecheck != ''){
            $checkin_date = $datecheck;        
            date_default_timezone_set('Etc/GMT'); //Make sure the time is GMT
            $today = date('Y-m-d H:i:s');
            $checkin_time = date("H:i",strtotime( $today." GMT+8")); 
            $checkout_time= "12:00";
        }
        if ($roomid != ''){
            $room_number = $roomid;
            $room_type = $data_info[$room_number];
            $rate = $data_rate[$room_number];
        }
    }
    else {
        $query= "SELECT Booking.BookingID AS BookingID, Record_Status_Code, Lname, Fname, Check_In_Date, Check_Out_Date, X.Amount_Of_Day AS Amount_Of_Day, X.Room_Number AS Room_Number, Room_Info, Room_Rate, Guest.Guest_ID AS Guest_ID
    FROM (
        SELECT Room_Number, BookingID, MIN(Date) AS Check_In_Date, ADDDATE(MIN(Date),COUNT(*)) AS Check_Out_Date, MIN(Record_Status_Code) AS Record_Status_Code, COUNT(*) AS Amount_Of_Day
        FROM Record
        WHERE BookingID = ".$bookingid."
        GROUP BY Room_Number, BookingID
        ) AS X
    INNER JOIN Booking
    ON Booking.BookingID = X.BookingID
    INNER JOIN Guest
    ON Booking.Guest_ID = Guest.Guest_ID
    INNER JOIN Room
    ON X.Room_Number = Room.Room_Number
    INNER JOIN Price
    ON Room.Room_Type = Price.Room_Type";
        $bookinglist=DB::query($query);


            $fname = $bookinglist[0]['Fname'];
            $lname = $bookinglist[0]['Lname'];
            $checkin_date = $bookinglist[0]['Check_In_Date'];        
            date_default_timezone_set('Etc/GMT'); //Make sure the time is GMT
            $today = date('Y-m-d H:i:s');
            $checkin_time = date("H:i",strtotime( $today." GMT+8"));  
            $checkout_date =  $bookinglist[0]['Check_Out_Date'];
            $checkout_time =  "12:00";
            $room_number = $bookinglist[0]['Room_Number'];  
            $room_type = $bookinglist[0]['Room_Info'];  
            $rate = $bookinglist[0]['Room_Rate'];  
            $amount_of_day = $bookinglist[0]['Amount_Of_Day'];  
            $total_charge = $rate * $amount_of_day;
            $guestid = $bookinglist[0]['Guest_ID'];  

        $record_status_code = $bookinglist[0]['Record_Status_Code'];
        if ($record_status_code == 0){            

        } else {
            $query = "SELECT Payment_Made FROM Invoice WHERE Booking_ID = ".$bookingid;
            $invoicelist = DB::query($query);
            $paid = $invoicelist[0]['Payment_Made'];
            $balance = $total_charge - $paid;
            $readonly_room_number = 'readonly';
            $readonly_checkin_date = 'readonly';
            $readonly_checkin_time = 'readonly';

        }


    }
}

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
   

 

    <section class="container grey-text">
        <h4 class="center"> Guest’s information for the current stay </h4>
        <form class="m-t-40 white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                       
<!-- abc2 -->
<?php debug($query); debug($bookinglist);?> 
<?php debug($created_date);debug($newdate);debug($created_date2); ?>


<?php if ($bookingid != ""): ?>                
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Guest:</label>
                <div class="col-sm-10">
                    <h4 class="text-light"><a href="./guest_information.php?guestid=<?php echo htmlspecialchars($guestid); ?>" class="m-t-5"><?php echo htmlspecialchars($fname).' '.htmlspecialchars($lname); ?></a></h4>
                </div>
            </div>
            <input type="hidden" name="bookingid" value="<?php echo $bookingid; ?>">
            <input type="hidden" name="fname" value="<?php echo $fname; ?>">
            <input type="hidden" name="lname" value="<?php echo $lname; ?>">
            <input type="hidden" name="guestid" value="<?php echo $guestid; ?>">
            <input type="hidden" name="readonly_room_number" value="<?php echo $readonly_room_number; ?>">  
            <input type="hidden" name="readonly_checkin_date" value="<?php echo $readonly_checkin_date; ?>">  
            <input type="hidden" name="readonly_checkin_time" value="<?php echo $readonly_checkin_time; ?>"> 
            <input type="hidden" name="record_status_code" value="<?php echo $record_status_code; ?>"> 
            
                      

<?php else: ?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fname" value="<?php echo htmlspecialchars($fname); ?>" placeholder="First Name">                  
                    <class class="text-danger"><?php echo $errors['fname']; ?></class>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Last Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="lname" value="<?php echo htmlspecialchars($lname); ?>" placeholder="Last Name">
                  <class class="text-danger"><?php echo $errors['lname']; ?></class>
                </div>
            </div>

<?php endif; ?>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Check In (Date/Time):</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="checkin_date" id="checkin_date" value="<?php echo htmlspecialchars($checkin_date); ?>" placeholder="Check in" onblur="generateOtherInputs()" <?php echo $readonly_checkin_date; ?>>
                  <class class="text-danger"><?php echo $errors['checkin_date']; ?></class>
                </div>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="checkin_time" id="checkin_time" value="<?php echo htmlspecialchars($checkin_time); ?>" placeholder="Check in" onblur="generateOtherInputs()" <?php echo $readonly_checkin_time; ?>>
                  <class class="text-danger"><?php echo $errors['checkin_time']; ?></class>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Check Out (Date/Time):</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="checkout_date" id="checkout_date" value="<?php echo htmlspecialchars($checkout_date); ?>" placeholder="Check out" onblur="generateOtherInputs()">
                  <class class="text-danger"><?php echo $errors['checkout_date']; ?></class>
                </div>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="checkout_time" id="checkout_time" value="<?php echo $checkout_time == '' ? '12:00' : htmlspecialchars($checkout_time); ?>" placeholder="Check out" onblur="generateOtherInputs()">
                  <class class="text-danger"><?php echo $errors['checkout_time']; ?></class>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Room Number:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="room_number" id="room_number" value="<?php echo htmlspecialchars($room_number); ?>" placeholder="Room number" onblur="generateOtherInputs()" <?php echo $readonly_room_number; ?>>
                  <class class="text-danger"><?php echo $errors['room_number']; ?></class>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Room Type:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="room_type" id="room_type" value="<?php echo htmlspecialchars($room_type); ?>" placeholder="Room type" readonly>
                </div>
            </div>            
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Rate:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="rate" id="rate" value="<?php echo htmlspecialchars($rate); ?>" placeholder="$/day" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Total Charge:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="total_charge" id="total_charge" value="<?php echo htmlspecialchars($total_charge); ?>" placeholder="$" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Paid:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="paid" min= "0" id="paid" value="<?php echo htmlspecialchars($paid); ?>" placeholder="$" onblur="generateOtherInputs()">
                  <class class="text-danger"><?php echo $errors['paid']; ?></class>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Balance:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="balance" id="balance" value="<?php echo htmlspecialchars($balance); ?>" placeholder="$" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
<?php if ($record_status_code == 0 || $record_status_code == ''): ?>                     
                  <button type="submit" name="checkin" id="checkin" class="btn btn-primary">Check In</button> 
<?php else: ?>                  
                  <button type="submit" name="checkupdate" id="checkupdate" class="btn btn-primary">Update</button> 
                  <button type="submit" name="checkout" id="checkout" class="btn btn-primary">Check Out</button> 
<?php endif; ?>                              
                </div>
            </div>
        </form>
    </section>


                       
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
<script>
function generateOtherInputs() {
    var checkin_date = document.getElementById("checkin_date")
    var checkin_time = document.getElementById("checkin_time")
    var checkout_date = document.getElementById("checkout_date")
    var checkout_time = document.getElementById("checkout_time")
    var room_number = document.getElementById("room_number")    
    var room_type = document.getElementById("room_type")
    var rate = document.getElementById("rate")
    var total_charge = document.getElementById("total_charge")
    var paid = document.getElementById("paid")
    var balance = document.getElementById("balance")
    var checkin = document.getElementById("checkin")
    var checkout = document.getElementById("checkout")
    
    if (checkout_time.value == ""){        
        return
    }
    if (checkin_date.value == "")
        return
    if (checkin_time.value == "")
        return
    if (checkout_date.value == "")
        return
    if (room_number.value == "")
        return
    value_room_rate = (data_rate[room_number.value] === undefined ? '' : data_rate[room_number.value])
    if (value_room_rate == ''){
        room_type.value = ''
        rate.value = ''
        total_charge=''        
        return
    }

    var d1 = Date.parse(checkin_date.value + " " + checkin_time.value)
    var d2 = Date.parse(checkout_date.value + " " + checkout_time.value)
    if (d1 >= d2){
        total_charge.value = "Error! Check-out date must be greater than check-in date."
        // checkin.disabled = true
        return
    } else {
        // checkin.disabled = false
        rate.value = value_room_rate
        room_type.value = data_info[room_number.value]
        total_charge.value = Math.ceil((d2-d1)/86400000) * rate.value     
        if (paid.value == ''){
            balance.value = ''
            return
        } else {
            balance.value = total_charge.value - paid.value;
        }

    }

}
</script>
</body>

</html>
<!-- end document-->
