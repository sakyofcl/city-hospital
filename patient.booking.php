<?php
include_once "./controller/doctorController.php";
include_once "./util/core.php";
startSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Booking</title>
    <?php include_once "./headerLink.php"; ?> 
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
                <!-- sidebar -->
                <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar border-right" id="sidebar">
                    <div class="list-group rounded-0 mt-5">
                        
                        <a href="admin.php" class="list-group-item rounded-0 list-group-item-action border-0 d-flex align-items-center">
                            <span class="bi bi-border-all"></span>
                            <span class="ml-2">Users</span>
                        </a>

                        <a href="test.result.php" class="list-group-item rounded-0  list-group-item-action border-0 d-flex align-items-center">
                            <span class="bi bi-border-all"></span>
                            <span class="ml-2">Test Results</span>
                        </a>
                        <a href="patient.booking.php" class="list-group-item rounded-0 active list-group-item-action border-0 align-items-center">
                            <span class="bi bi-box"></span>
                            <span class="ml-2">Patient Booking</span>
                        </a>
                    </div>
                </div>
                <!-- sidebar end -->

            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                <?php include_once "./top.nav.php";?>
                <div class="p-4">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>BN</th>
                                    <th>Patient Name</th>
                                    <th>Contact Number</th>
                                    <th>Treatment Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $doctor = new DoctorController();
                                    $bookedPatient = $doctor->GetBookedPatient([]);
                                    
                                    foreach($bookedPatient as $item){
                                        $status = $item['isApproved'] ? "<span class='badge badge-secondary p-1'>Approved</span>" : "<a class='btn btn-success' targe='_blank' href='approve.php?id={$item['bookingNumber']}'>Approve</a>";
                                        echo "
                                            <tr>
                                                <td>{$item['bookingNumber']}</td>
                                                <td>{$item['patientName']}</td>
                                                <td>{$item['phoneNumber']}</td>
                                                <td>{$item['treatmentType']}</td>
                                                <td>$status</td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "./script.php"; ?> 
</body>
</html>