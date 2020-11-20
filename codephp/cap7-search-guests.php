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
                        <form class="form-header" action="" method="POST">
                            <input class="au-input col-md-8" type="text" name="search" placeholder="Search for guests...">
                            <select class="au-input col-md-3">                               
                                <option selected value="1">First Name</option>
                                <option value="2">Last Name</option>
                                <option value="3">Room Number</option>
                                <option value="4">Phone Number</option>
                                <option value="5">Street Address</option>
                                <option value="6">Check In Date</option>                               
                                <option value="7">Checkout Date</option>
                            </select>
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>

                        <div class="row m-t-25">
                            <div class="col-md-6 p-3">
                                <div class="card-body bg-primary h-100">
                                    <div class = "row">
                                        <div class = "col-6">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Eden_Hazard_-_%D0%AD%D0%B4%D0%B5%D0%BD_%D0%90%D0%B7%D0%B0%D1%80_%2822164222410%29.jpg"  alt="" class="img-rounded" >
                                        </div>
                                        <div class = "col-6 text-light">
                                        <blockquote>
                                            <h4 class="text-light">Eden Hazard</h4>
                                            <small><cite title="Source Title">123 Abcd St, Chicago, USA  <i class="icon-map-marker"></i></cite></small>
                                        </blockquote>
                                        <p>
                                            Phone: (714) 124-4567 <br>
                                            Room: 201 <br>
                                            Check In: 10/22/2020 <br>
                                            Check Out: 10/23/2020
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                            <div class="col-md-6 p-3">
                                <div class="card-body bg-primary h-100">
                                    <div class = "row">
                                        <div class = "col-6">
                                        <img src="https://e0.365dm.com/20/10/768x432/skysports-cristiano-ronaldo_5138440.jpg"  alt="" class="img-rounded">
                                        </div>
                                        <div class = "col-6 text-light">
                                        <blockquote>
                                            <h4 class="text-light">Cristiano Ronaldo</h4>
                                            <small><cite title="Source Title">1234 Funchal, Madeira, Portugal  <i class="icon-map-marker"></i></cite></small>
                                        </blockquote>
                                        <p>
                                            Phone: (714) 124-4567 <br>
                                            Room: 401 <br>
                                            Check In: 10/22/2020 <br>
                                            Check Out: 10/24/2020
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                        </div>

                        <!-- <div class="row m-t-25"> -->
                        <div class="row">   
                            <div class="col-md-6 p-3">
                                <div class="card-body bg-primary h-100">
                                    <div class = "row">
                                        <div class = "col-6">
                                        <img src="https://4.bp.blogspot.com/-1vhlxwtUwC0/WV_W1p-6JSI/AAAAAAAAF3g/AKWMR9qy0H8rdHZE0LZqsSZRGmaJlvQRgCEwYBhgL/s1600/lionel-messi-2017-3.jpg"  alt="" class="img-rounded">
                                        </div>
                                        <div class = "col-6 text-light">
                                        <blockquote>
                                            <h4 class="text-light">Lionel Messi</h4>
                                            <small><cite title="Source Title">123 Abcd St, Chicago, USA  <i class="icon-map-marker"></i></cite></small>
                                        </blockquote>
                                        <p>
                                            Phone: (714) 124-4567 <br>
                                            Room: 207 <br>
                                            Check In: 10/22/2020 <br>
                                            Check Out: 10/25/2020
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                            <div class="col-md-6 p-3">
                                <div class="card-body bg-primary h-100">
                                    <div class = "row" >
                                        <div class = "col-6">
                                        <img src="https://1.bp.blogspot.com/-WJlUeu-QGp0/X1dGiAwRiwI/AAAAAAAAY8Q/64e5BNDELt0kELXeEFXdXr4vhh4C0CAGgCLcBGAsYHQ/w500-h281/1599506307_085988_noticia_normal.jpg"  alt="" class="img-rounded">
                                        </div>
                                        <div class = "col-6 text-light">
                                        <blockquote>
                                            <h4 class="text-light">Kylian Mbappé</h4>
                                            <small><cite title="Source Title">123 Abcd St, Chicago, USA  <i class="icon-map-marker"></i></cite></small>
                                        </blockquote>
                                        <p>
                                            Phone: (714) 123-4567 <br>
                                            Room: 303 <br>
                                            Check In: 10/22/2020 <br>
                                            Check Out: 12/22/2020
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
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
