<?php

// Starting the session, to use and
// store data in session variable
session_set_cookie_params(0);
session_start();
require "common/connection.php";

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: frontend/login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: frontend/login.php");
}
$email = $_SESSION['email'];
?>



<!DOCTYPE html>
<html lang="en">
<?php include "common/head.php"; ?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Header start
        ***********************************-->

        <?php include "common/header.php"; ?>

        <!--**********************************
            Navbar start
        ***********************************-->

        <?php include "common/navbar.php"; ?>

        <!--**********************************
            Content body start
        ***********************************-->

        <?php

        if (isset($_GET["op"])) {
            include "frontend/" . $_GET["op"] . ".php";
        } else {
            include "frontend/home.php";
        }
        ?>

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include "common/footer.php"; ?>

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="js/custom.min.js"></script>



</body>

</html>