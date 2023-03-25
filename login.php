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
              </div>

              <form action="#" method="POST">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control" id="userName" name="userName" placeholder="user name">
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                  </div>
                  <input type="password" placeholder="password" class="form-control" id="password" name="password">
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
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>