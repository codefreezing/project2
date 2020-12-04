<?php
// Start the session
session_start();
$_SESSION["menu"] = 7;
?>
<?php     
    $keySearch = "";   
    $dateShow = "";
    $optionValue = "0";     
    if(isset($_POST['submit'])){     
        $optionValue = $_POST['typeOption'];           
        
        $date = htmlspecialchars($_POST['textSearch']);  
        $d = DateTime::createFromFormat('m/d/Y', $date);
        if ($d && $d->format('m/d/Y') == $date) {   // make sure $date is valid             
            $keySearch = date("Y-m-d", strtotime($date));   
            $dateShow = date("m/d/Y", strtotime($date));      
        } else {
            $keySearch = $date;
            $keySearch = preg_replace("/\s+/", "", $keySearch); // remove all spaces
        }
        

    } elseif (isset($_GET['fname'])) {
        $optionValue = "0" ;   
        $keySearch = htmlspecialchars($_GET['fname']);
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
                        <form class="form-header" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                            <!-- <input class="au-input" data-date-format="mm/dd/yyyy" id="datepicker"> -->
                            <input class="au-input col-md-8" type="text" name="textSearch" id="datepicker" placeholder="Search for guests...">
                            <select class="au-input col-md-3" name="typeOption" id="dateOption" onchange="addDatePicker()">                               
                                <option selected value="0">First Name</option>
                                <option value="1">Last Name</option>
                                <option value="2">Room Number</option>
                                <option value="3">Phone Number</option>
                                <option value="4">Street Address</option>
                                <option value="5">Check In Date</option>                               
                                <option value="6">Checkout Date</option>
                            </select>
                            <button class="au-btn--submit" type="submit" name="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        
                        <div class="m-t-25"></div>

<?php
// debug($keySearch);
// debug($optionValue);
switch ($optionValue) {
  case "0":
    $fieldSearch = "Fname";
    break;
  case "1":
    $fieldSearch = "Lname";
    break;
  case "2":
    $fieldSearch = "Room_Number";
    break;
  case "3":
    $fieldSearch = "Phone_Number";
    break;
  case "4":
    $fieldSearch = "Address";
    break;
  case "5":
    $fieldSearch = "Check_In_Date";
    break;    
  default:
    $fieldSearch = "Check_Out_Date";
}
if ($keySearch == ""):
?>
    <div class="row m-l-0">
<?php else:

$guestList = DB::query("SELECT Booking.BookingID AS BID, Photo, Lname, Fname, Address, Phone_Number, Room_Number, Check_In_Date, Check_Out_Date, Guest.Guest_ID AS Guest_ID
FROM (
    SELECT Room_Number, BookingID, MIN(Date) AS Check_In_Date, ADDDATE(MIN(Date),COUNT(*)) AS Check_Out_Date
    FROM Record
    GROUP BY Room_Number, BookingID    
    ) AS X
INNER JOIN Booking
ON Booking.BookingID = X.BookingID
INNER JOIN Guest
ON Booking.Guest_ID = Guest.Guest_ID
WHERE ".$fieldSearch." LIKE '%".$keySearch."%'
ORDER BY BID DESC");
// debug($guestList);
if (empty($guestList)):
?>
    <div class="row m-l-0"> Not Found!
<?php
endif;
$temp = 1;
foreach ($guestList as $row):
    if($temp == 1):
?>    
   <div class="row">
<?php endif; ?>
                        
                            <div class="col-md-6 p-3">
                                <div class="card-body bg-primary h-100">
                                    <div class = "row">
                                        <div class = "col-6">
                                        <img src="<?php echo htmlspecialchars($row['Photo']); ?>"  alt="Image Not Available" class="text-light" >
                                        </div>
                                        <div class = "col-6 text-light">
                                        <blockquote>
                                            <h4 class="text-light"><a href="./edit_guest_info.php?guestid=<?php echo htmlspecialchars($row['Guest_ID']); ?>" class="btn btn-primary px-0"><?php echo htmlspecialchars($row['Fname']).' '.htmlspecialchars($row['Lname']); ?></a></h4>
                                            <small><cite title="Source Title"><?php echo htmlspecialchars($row['Address']); ?><i class="icon-map-marker"></i></cite></small>
                                        </blockquote>
                                        <p>
                                            Phone: <?php echo htmlspecialchars($row['Phone_Number']); ?> <br>
                                            Room: <?php echo htmlspecialchars($row['Room_Number']) ?> <br>
                                            Check In: <?php echo htmlspecialchars(date("m/d/Y", strtotime($row['Check_In_Date']))); ?> <br>
                                            Check Out: <?php echo htmlspecialchars(date("m/d/Y", strtotime($row['Check_Out_Date']))); ?>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>                                  

<?php if($temp%2 == 0):?>
</div>
<div class="row">
<?php
    endif;
$temp++;
endforeach;
endif;
?>                                              
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
        function addDatePicker(){
            if ($('#dateOption').val() == "5" || $('#dateOption').val() == "6"){
                $('#datepicker').datepicker({
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,
                todayHighlight: true,
                });                 
            } else {
                $('#datepicker').datepicker("destroy");
            }
        }
               
    </script>

<script type="text/javascript">    
    
    document.getElementById("dateOption").selectedIndex = "<?php echo htmlspecialchars($optionValue); ?>"; 
    addDatePicker();
    document.getElementById("datepicker").defaultValue = "<?php echo $dateShow == "" ? $keySearch: $dateShow;  ?>";

</script>

</body>

</html>
<!-- end document-->
