<?php
include_once "./util/core.php";
include_once "./controller/testResultController.php";
startSession();
$testResultController = new TestResultController();
$allTestResult = $testResultController->GetAllTestResult();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Results</title>
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

                        <a href="test.result.php" class="list-group-item rounded-0 active list-group-item-action border-0 d-flex align-items-center">
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
                <div class="p-5">
                    <a class='btn btn-primary mb-3' href='form.test.result.php'>ADD NEW TEST RESULT</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>TN</th>
                                <th>Test Name</th>
                                <th>Test Result</th>
                                <th>Test Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($allTestResult as $value) {
                                    echo "
                                        <tr>
                                            <td>{$value['id']}</td>
                                            <td>{$value['testName']}</td>
                                            <td>{$value['testResult']}</td>
                                            <td>{$value['testDate']}</td>
                                            <td>
                                                <a class='btn btn-warning' href='form.test.result.php?id={$value['id']}'>UPDATE</a>
                                                <a class='btn btn-danger' href='test.result.delete.php?id={$value['id']}'>DELETE</a>
                                            </td>
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