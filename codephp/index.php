<?php
// Start the session
session_start();
$_SESSION["menu"] = 1;
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
       
<?php
include "menu.php";

?>
       

        <!-- PAGE CONTAINER-->
        <div class="page-container">

        <?php
if(isset($_GET['update'])){
    $roomIdNumber = $_GET['update'];
    DB::update('Room', ['Room_Status_ID' => 0], "Room_Number=%s", $roomIdNumber);
    DB::query("UPDATE Housekeeping SET Bathroom=1, Towels=1, Bed_Sheets=1, Vacuum=1, Dusting=1, Electronics=1
    WHERE Room_Number=%s", $roomIdNumber);
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
                                    <h2 class="title-1">Room status for today</h2>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-primary">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                           
                                            <div class="text">
                                                <h2><?php echo $numberAvailable[0]['numberAvailable']; ?></h2>
                                                <span>Available</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-warning">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2><?php echo $occupied[0]['occupied']; ?></h2>
                                                <span>Occupied</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-danger">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2><?php echo $maintenance[0]['maintenance']; ?></h2>
                                                <span>Maintenance</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                    
                           
                            <div class="col-sm-2 col-lg-2">
                                <div class="overview-item bg-dark">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2><?php echo $roomDirty[0]['roomDirty']; ?></h2>
                                                <span>Dirty</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
$roomlist = DB::query("SELECT *  FROM Room, Price, Room_Status where Room.Room_Status_ID = Room_Status.Room_Status_ID and Price.Room_Type = Room.Room_Type ORDER BY Room.Room_Number ASC");
$temp = 1;
foreach ($roomlist as $row) {
    if($temp == 1){
?>
   <div class="row">
<?php
    }
?>

    <div class="col-md-3">

    <?php

    if($row['Room_Status_ID'] == 0){
        $cssColor = "bg-primary";
    }else if($row['Room_Status_ID']== 1){
        $cssColor = "bg-warning";
    }else if($row['Room_Status_ID'] == 2){
        $cssColor = "bg-danger";
    }else if($row['Room_Status_ID'] == 3){
        $cssColor = "bg-dark";
    }
    ?>
        <div class="card <?php echo $cssColor;?>">
        <?php
  if($row['Room_Status_ID'] == 3 || $row['Room_Status_ID'] == 2){
    $roomNumber = $row['Room_Number'];
  
        ?>
    <a href="#" data-target="#largeModals<?php echo $roomNumber; ?>" data-toggle="modal">
            <?php
  }else{
   ?>

    <a href="current_stay.php?roomid=<?php echo $row['Room_Number']; ?>">

  <?php
  }
            ?>
                <div class="card-body">
                    <h4 class="card-title mb-5 text-light">Room: <?php echo $row['Room_Number'];?>
                        <small>
                            <span class="badge badge-success float-right"><?php echo $row['Room_Info'];?></span>
                        </small>
                    </h4>
                    <h5 class="card-text text-light float-right"><?php echo $row['Room_Status_Info'];?>
                    </h5>
                </div>
                </a>  
        </div>
    </div>


    <?php
 if($temp%4 == 0){
    ?>
</div>

<div class="row">

<?php
    }
    $temp++;
    
  }
?>
     
<?php
foreach ($roomlist as $row) {
    if($row['Room_Status_ID'] == 3 || $row['Room_Status_ID'] == 2){

?>
     <div class="modal fade" id="largeModals<?php echo $row['Room_Number']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="largeModalLabel">System warning</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p>
Room <?php echo $row['Room_Number']; ?> is <?php echo $row['Room_Status_Info']; ?>, Do you want to turn the status to Available?
</p>
</div>
<div class="modal-footer">
<a href="#" class="btn btn-secondary" data-dismiss="modal">No</a>
<a href="index.php?update=<?php echo $row['Room_Number']; ?>" class="btn btn-primary">Yes</a>
</div>
</div>
</div>
</div>  
<?php
    }
}
?>
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

