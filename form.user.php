<?php 
include_once "./controller/userController.php";
include_once "./util/core.php";
startSession();
$userController = new UserController();
$isEdit = isset($_GET['uid']);
$user = [
    'userName'=>'',
    'password'=>'',
    'type'=>'3',
    'id'=>null
];

if($isEdit){
    $user = $userController->GetUser($_GET['uid'])[0];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>User | Admin Dashboard</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
    
    <div class="container">
      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="auth-form">
            <div class="container">

              <div class="header">
                <h1><?php echo $isEdit ? "Update User" : "Create User";?></h1>
              </div>

                <form action="form.user.php" method="POST" id="register-form">
                    <?php 
                        echo $isEdit ? "<input type='number' name='id' value='{$user['id']}' hidden/>" : "";
                        echo $isEdit ? "<input type='number' name='_type' value='{$user['type']}' hidden/>" : "";
                    ?>
                    <div class="form-group">
                        <label for="userName">User name</label>
                        <input type="text" name="userName" id="userName" class="form-control" value="<?php echo $user['userName']; ?>" />
                    </div>

                    <div class="form-group show-hide-eye">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?php echo $user['password']; ?>"/>
                        <i class="btn toggle-password fa fa-eye" toggle="#password"></i>
                    </div>

                    <div class="form-group">
                        <label >You are a ?</label>
                        <div class="w-100 d-flex justify-content-start">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="Patient" value="3" <?php echo $user['type']=="3" ? " checked " : " ";  echo $isEdit ? "disabled" : ""; ?>>
                                <label class="form-check-label" for="Patient">Patient</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="Docter" value="2" <?php echo $user['type']=="2" ? " checked " : " "; echo $isEdit ? "disabled" : ""; ?>>
                                <label class="form-check-label" for="Docter">Docter</label>
                            </div>
                        </div>
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

        if($isEdit){
            $_POST['type'] = $_POST['_type'];
            unset($_POST['_type']);
        }

        $isSave = $isEdit ? $userController->updateUser($_POST) : $userController->addUser($_POST);
        if($isSave){
            header("Location: admin.php");
            exit;  
        }
    }
  ?>

  <?php include_once "./script.php"; ?>  

  <script type="text/javascript">
    window.onload=()=>{

      function toggleEye(className){
        const toggleBtn = $(className);
        const inputbox = $(toggleBtn.attr("toggle"));
        toggleBtn.click(()=>{
            toggleBtn.toggleClass('fa-eye fa-eye-slash');
            if (inputbox.attr("type") == "password") {
                inputbox.attr("type", "text");
            } else {
                inputbox.attr("type", "password");
            }
        });
      }

      $("#register-form").validate({
        rules:{
          userName : "required",
          password :{required:true, minlength: 5},
          Cpassword :{required:true, minlength: 5}
        },
        messages:{
          userName : "required*",
          password : {
            required: "required*",
            minlength: "password least 5 characters long"
          }
        },
        errorElement: "div"
      });

      toggleEye(".toggle-password");
      toggleEye(".toggle-confirm-password");

    };
  </script>

</body>

</html>
