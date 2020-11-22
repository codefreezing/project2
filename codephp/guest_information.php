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
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <th>Guest ID</th>
                                    <th>Photo</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>E-mail</th>
                                    <th>ID Info</th>
                                    <th>Vehicle</th>
                                    <th>License Plate</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0001</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Doe</td>
                                        <td>John</td>
                                        <td>(949) 555-5555</td>
                                        <td>123 Fake Street, Irvine, CA 99999</td>
                                        <td>jdoe123@gmail.com</td>
                                        <td>CA D12456788</td>
                                        <td>Toyota Tundra</td>
                                        <td>7C16131</td>
                                    </tr>
                                    <tr>
                                        <td>0002</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Gibson</td>
                                        <td>John</td>
                                        <td>(949) 666-7777</td>
                                        <td>5144 Imagination Lane, New York, NY 11111</td>
                                        <td>jgibson@msn.com</td>
                                        <td>NY 12456789</td>
                                        <td>Ford Edge</td>
                                        <td>IJL 9978</td>
                                    </tr>
                                    <tr>
                                        <td>0003</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Getzlaf</td>
                                        <td>Ryan</td>
                                        <td>(714) 872-4444</td>
                                        <td>81354 Not Here Boulevard, Sacramento, CA 45315</td>
                                        <td>rgetzlaf15@duckshockey.com</td>
                                        <td>CA D789451</td>
                                        <td>Porsche Cayenne</td>
                                        <td>6YHF866</td>
                                    </tr>
                                    <tr>
                                        <td>0004</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Nagase</td>
                                        <td>Kei</td>
                                        <td>(671) 123-4567</td>
                                        <td>123 Sesame Street, Riverside, CA 92509</td>
                                        <td>knagase@razgriz2.com</td>
                                        <td>CA F5467891</td>
                                        <td>Boeing F-22 Raptor</td>
                                        <td>6URG245</td>
                                    </tr>
                                    <tr>
                                        <td>0005</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Strife</td>
                                        <td>Cloud</td>
                                        <td>(949) 555-5555</td>
                                        <td>4741 Lindstrom Avenue, Irvine, CA 92604</td>
                                        <td>cloud_strife@squareenix.com</td>
                                        <td>CA D87945612</td>
                                        <td>Ford Mustang</td>
                                        <td>7CAT664</td>
                                    </tr>
                                    <tr>
                                        <td>0006</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Mack</td>
                                        <td>Carolyn</td>
                                        <td>(646) 578-5468</td>
                                        <td>1887 Vine Street, Schiller Park, IL 60176</td>
                                        <td>cmack@uci.edu</td>
                                        <td>CA D4444445</td>
                                        <td>Toyota Prius</td>
                                        <td>6UPP838</td>
                                    </tr>
                                    <tr>
                                        <td>0007</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Chapman</td>
                                        <td>Barbara</td>
                                        <td>(412) 261-2742</td>
                                        <td>1236 Beechwood Drive, Marty, SD 57361</td>
                                        <td>chapman_barbara@msn.com</td>
                                        <td>SD D5467894</td>
                                        <td>Chevrolet Camaro</td>
                                        <td>24T V63</td>
                                    </tr>
                                    <tr>
                                        <td>0008</td>
                                        <td><img src="images/icon/avatar-02.jpg" alt="Emily Pham" /></td>
                                        <td>Raymond</td>
                                        <td>Darla</td>
                                        <td>(281) 219-2988</td>
                                        <td>3261 Payne Street, Houston, TX 77093</td>
                                        <td>cmack@uci.edu</td>
                                        <td>TX D87452</td>
                                        <td>Ford F-250</td>
                                        <td>LGY-2835</td>
                                    </tr>
                                </tbody>
                            </table>
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
