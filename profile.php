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
    <?php
      if(isPatient()){
        echo "<img src='./assets/image/default-profile-icon.png'/>";
      }
      else if(isDoctor()){
        echo "<img src='./assets/image/doctor-profile.PNG'/>";
      }
    ?>
    <div class="perfile-details">
        <div class="name"><?php echo $_SESSION['user']['userName'];?></div>
        <div class="type">
          <?php
            if(isPatient()){
              echo "Patient";
            }
            else if(isDoctor()){
              echo "Doctor";
            }
          ?>
        </div>
    </div>
  </div>
  <?php
    if(isPatient()){
      include_once "./patient.profile.php";
    }
    else if(isDoctor()){
      include_once "./doctor.profile.php";
    }
  ?>
  <?php include_once "./end.php"; ?>  
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>