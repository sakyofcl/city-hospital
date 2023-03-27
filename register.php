<?php 
include_once "./controller/userController.php";
include_once "./util/core.php";
startSession();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register | City Hospital</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
  <div class="hero_area">
    <?php include_once "./navigation.php"; ?> 

    <div class="container">
      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="auth-form">
            <div class="container">

              <div class="header">
                <h1>Create an Account</h1>
                <p>Fill out the form below to create a new account.</p>
              </div>

              <form action="register.php" method="POST" id="register-form">
                
                <div class="form-group">
                  <label for="userName">User name</label>
                  <input type="text" name="userName" id="userName" class="form-control" />
                </div>

                <div class="form-group show-hide-eye">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control"/>
                  <i class="btn toggle-password fa fa-eye" toggle="#password"></i>
                </div>

                <div class="form-group show-hide-eye">
                  <label for="Cpassword">Confirm Password</label>
                  <input type="password" name="Cpassword" id="Cpassword" class="form-control"/>
                  <i class="btn toggle-confirm-password fa fa-eye" toggle="#Cpassword"></i>
                </div>

                <div class="form-group">
                  <label >You are a ?</label>
                  <div class="w-100 d-flex justify-content-start">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="Patient" value="3" checked>
                      <label class="form-check-label" for="Patient">Patient</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="Docter" value="2">
                      <label class="form-check-label" for="Docter">Docter</label>
                    </div>
                  </div>
                </div>

                <input type="submit" name="register" value="Register" />
              </form>

              <p>Already have an account <a href="login.php">Login</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php
    if(isset($_POST['register'])){
      $userController = new UserController();
      unset($_POST['register']);
      unset($_POST['Cpassword']);
      if($userController->addUser($_POST)){
        header("Location: login.php");
        exit;  
      }
    }
  ?>

  <?php include_once "./footer.php"; ?>  
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
          Cpassword :{required:true, minlength: 5, equalTo: "#password"}
        },
        messages:{
          userName : "required*",
          password : {
            required: "required*",
            minlength: "password least 5 characters long"
          },
          Cpassword : {
            required: "required*",
            minlength: "password least 5 characters long",
            equalTo: "Confirm password not matched"
          },
        },
        errorElement: "div"
      });

      toggleEye(".toggle-password");
      toggleEye(".toggle-confirm-password");

    };
  </script>

</body>

</html>