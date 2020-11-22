<!-- MENU SIDEBAR-->
 <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                     <h2 class="pb-2 display-5">HotelX</h2>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php
$cap1 = "";
$cap2 = "";
$cap3 = "";
$cap4 = "";
$cap5 = "";
$cap6 = "";
$cap7 = "";
$cap8 = "";
if($_SESSION["menu"] == 1){
    $cap1 = "active";
}else if($_SESSION["menu"] == 2){
    $cap2 = "active";
}else if($_SESSION["menu"] == 3){
    $cap3 = "active";
}else if($_SESSION["menu"] == 4){
    $cap4 = "active";
}else if($_SESSION["menu"] == 5){
    $cap5 = "active";
}else if($_SESSION["menu"] == 6){
    $cap6 = "active";
}else if($_SESSION["menu"] == 7){
    $cap7 = "active";
}else if($_SESSION["menu"] == 8){
    $cap8 = "active";
}
                        ?>
                        <li class="<?php echo $cap1; ?>">
                            
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-list"></i>Capability 1</a>       
                           
                        </li>
                        <li class="<?php echo $cap2; ?>">
                            <a href="room_list.php">
                                <i class="fas fa-list"></i>Capability 2</a>
                        </li>
                        
                        <li class="<?php echo $cap3; ?>">
                            <a href="reservation.php">
                                <i class="fas fa-list"></i>Capability 3</a>
                        </li>

                        <li class="<?php echo $cap4; ?>">
                            <a href="house_keeping.php">
                                <i class="fas fa-list"></i>Capability 4</a>
                        </li>
                        <li class="<?php echo $cap5; ?>">
                            <a href="guest_information.php">
                                <i class="fas fa-list"></i>Capability 5</a>
                        </li>
                        <li class="<?php echo $cap6; ?>">
                            <a href="current_stay.php">
                                <i class="fas fa-list"></i>Capability 6</a>
                        </li> 
                        <li class="<?php echo $cap7; ?>">
                            <a href="cap7-search-guests.php">
                                <i class="fas fa-list"></i>Capability 7</a>
                        </li>
                        <li class="<?php echo $cap8; ?>">
                            <a href="cap8-daily-report.php">
                                <i class="fas fa-list"></i>Capability 8</a>
                        </li>       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->