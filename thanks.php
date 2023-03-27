<?php  
include_once "./util/core.php";
startSession();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Thanks you | City Hospital</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
  <?php include_once "./navigation.php"; ?> 

  <div class="title-flex container-fluid p-0 m-0">
      <img src="./assets/image/thank-you-banner.jpg"/>
  </div>
  <div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="jumbotron text-center bg-light shadow">
                <h1 class="display-3">Thank You!</h1>
                <p class="lead">we will contact you soon!</p>
                <hr>
                <p>
                    Having trouble? <a href="contact.php">Contact us</a>
                </p>
                <p class="lead">
                    <a class="btn btn-dark" href="doctors.php" role="button">Go Back</a>
                </p>
            </div>
        </div>
    </div>
  </div>
  
  <?php include_once "./end.php"; ?>  
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>