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

              <form action="#" method="POST">

                <div class="form-group">
                  <label for="userName">User name</label>
                  <input type="text" name="userName" id="userName" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control"/>
                </div>

                <div class="form-group">
                  <label for="contact">Contact number</label>
                  <input type="contact"  name="contact" id="contact" class="form-control"/>
                </div>

                <div class="form-group">
                  <label for="branch">Select branch</label>
                  <select id="branch" class="form-control" name="branch">
                    <option selected value="jaffna">Jaffna</option>
                    <option selected value="galle">Galle</option>
                    <option selected value="kurunagala">Kurunagala</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender">
                    <option selected value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="form-group">
                  <label >You are a ?</label>
                  <div class="w-100 d-flex justify-content-start">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="userType" id="Patient" value="2" checked>
                      <label class="form-check-label" for="Patient">Patient</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="userType" id="Docter" value="3">
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

  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>