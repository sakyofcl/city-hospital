<?php 
include_once "./controller/userController.php";
include_once "./controller/testResultController.php";
include_once "./util/core.php";
include_once "./database/enum/userType.php";
startSession();

$userController = new UserController();
$testResultController = new TestResultController();
$isEdit = isset($_GET['id']);

$testResult = [
    'testName'=>'',
    'testResult'=>'',
    'patientId'=> null,
    'testDate'=>date("Y-m-d\TH:i:s"),
    'id'=>null
];

if($isEdit){
    $testResult = $testResultController->GetTestResult($_GET['id'])[0];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Test Result | Admin Dashboard</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
    
    <div class="container">
      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="auth-form">
            <div class="container">

              <div class="header">
                <h1><?php echo $isEdit ? "Update Test Result" : "Create Test Result";?></h1>
              </div>

                <form action="form.test.result.php" method="POST" id="register-form">
                    <?php 
                        echo $isEdit ? "<input type='number' name='id' value='{$testResult['id']}' hidden/>" : "";
                    ?>

                    <div class="form-group">
                        <label for="patientId">Patient</label>
                        <select id="patientId" class="form-control" name="patientId">
                            <?php 
                                foreach($userController->GetAllUser() as $item){
                                    if(UserType::$Patient == (int)$item['type']){
                                        $isSelected = $item['id'] == $testResult['patientId'] ?'selected':'';
                                        echo "<option value='{$item['id']}'  $isSelected>{$item['userName']}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="testName">Test Name</label>
                        <input type="text" name="testName" id="testName" class="form-control" value="<?php echo $testResult['testName']; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="testResult">Test Result</label>
                        <textarea class="form-control" id="testResult" name="testResult" rows="3"><?php echo $testResult['testResult'];?></textarea>
                    </div>


                    <div class="form-group">
                        <label for="testDate">Test Date</label>
                        <input type="datetime-local" name="testDate" id="testDate" class="form-control" value="<?php echo $testResult['testDate']; ?>" />
                    </div>

                    <input type="submit" name="save" value="<?php echo $isEdit ? "Update" : "Create"; ?>" />
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  <?php
    if(isset($_POST['save'])){
        $isEdit = !empty($_POST['id']);
        unset($_POST['save']);

        $isSave = $isEdit ? $testResultController->UpdateTestResult($_POST) : $testResultController->AddTestResult($_POST);

        if($isSave){
            header("Location: test.result.php");
            exit;  
        }
    }
  ?>

  <?php include_once "./script.php"; ?>  

  <script type="text/javascript">
    window.onload=()=>{

      $("#register-form").validate({
        rules:{
            testName : "required",
            testResult: "required"
        },
        messages:{
            testName : "required*",
            testResult: "required*"
        },
        errorElement: "div"
      });

    };
  </script>

</body>

</html>
