<?php 
include_once "./controller/userController.php";
include_once "./util/core.php";
startSession();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login | City Hospital</title>
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
                <h1>Login</h1>
                <p>Welcome back! Please enter your login credentials to access your account.</p>
                <?php showError(); ?>
              </div>

              <form action="login.php" method="POST" id="login-form">
                <div class="form-group">
                  <label for="userName">User name</label>
                  <input type="text" name="userName" id="userName" class="form-control" />
                </div>

                <div class="form-group show-hide-eye">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control"/>
                  <i class="btn toggle-password fa fa-eye" toggle="#password"></i>
                </div>  

                <input type="submit" name="login" value="Login" />

              </form>

              <p>if you don't have any account ? <a href="register.php">Create an Account</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['login'])){
      $userController = new UserController();
      unset($_POST['login']);
      $userController->loginUser($_POST);
    }
  ?>

  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  

  <script>
      $("#login-form").validate({
        rules:{
          userName : "required",
          password :{required:true, minlength: 5}
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

      //password toggle
      const toggleBtn = $('.toggle-password');
      const inputbox = $(toggleBtn.attr("toggle"));
      toggleBtn.click(()=>{
        toggleBtn.toggleClass('fa-eye fa-eye-slash');
        if (inputbox.attr("type") == "password") {
          inputbox.attr("type", "text");
        } else {
                inputbox.attr("type", "password");
        }
      });

  </script>
</body>
</html>