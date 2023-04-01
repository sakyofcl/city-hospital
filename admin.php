<?php
include_once("./util/core.php");
startSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <?php include_once "./headerLink.php"; ?> 
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar border-right" id="sidebar">
                <div class="list-group rounded-0 mt-5">
                    
                    <a href="admin.php" class="list-group-item rounded-0 list-group-item-action active border-0 d-flex align-items-center">
                        <span class="bi bi-border-all"></span>
                        <span class="ml-2">Users</span>
                    </a>

                    <a href="test.result.php" class="list-group-item rounded-0 list-group-item-action border-0 d-flex align-items-center">
                        <span class="bi bi-border-all"></span>
                        <span class="ml-2">Test Results</span>
                    </a>
                    <a href="patient.booking.php" class="list-group-item rounded-0 list-group-item-action border-0 align-items-center">
                        <span class="bi bi-box"></span>
                        <span class="ml-2">Patient Booking</span>
                    </a>
                </div>
            </div>
            <!-- sidebar end -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                <?php include_once "./top.nav.php";?>
                <?php include_once "./user.php";?>
            </div>
        </div>
    </div>

    <?php include_once "./script.php"; ?> 
</body>
</html>