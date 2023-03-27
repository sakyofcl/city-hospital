<?php 
include_once "./util/core.php";
startSession();
auth();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile | City Hospital</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
  <?php include_once "./navigation.php"; ?> 

  <div class="title-flex container-fluid p-0 m-0">
      <img src="./assets/image/profile-banner.jpg"/>
  </div>
  <div class="container profile-section">
    <img src="./assets/image/default-profile-icon.png"/>
    <div class="perfile-details">
        <div class="name">Mohamed sakeen</div>
        <div class="type">Doctor</div>
    </div>
  </div>

  <?php include_once "./patient.profile.php"; ?>
  
  <?php include_once "./end.php"; ?>  
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>