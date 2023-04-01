<?php  
include_once "./controller/userController.php";
include_once "./util/core.php";
startSession();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Doctors | City Hospital</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
  <?php include_once "./navigation.php"; ?> 

  <div class="title-flex container-fluid p-0 m-0">
      <img src="./assets/image/doctors-banner.jpg"/>
  </div>

  <div class="container doctors-page">
    <div class="row">
      <div class="col-12">
        <div class="page-heading">
          <h2><span class="dot"></span>Doctors</h2>
        </div>
      </div>
      <div class="col-12">
          <form action="doctors.php" method="GET" class="doctor-filter-section">
            <div class="form-group col-md-3">
              <label for="branch">Select branch</label>

              <?php $branch = isset($_GET['filter']) ? $_GET['branch'] : '';?>

              <select id="branch" class="form-control" name="branch">
                <option value="" <?php echo $branch=='' ?'selected':'';?>>-- select one --</option>
                <option value="jaffna" <?php echo $branch=='jaffna' ?'selected':'';?> >Jaffna</option>
                <option value="galle" <?php echo $branch=='galle' ?'selected':'';?>>Galle</option>
                <option value="kurunagala" <?php echo $branch=='kurunagala' ?'selected':'';?> >Kurunagala</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="treatmentType">Treatments</label>
              <?php $treatmentType = isset($_GET['filter']) ? $_GET['treatmentType'] : '';?>
              <select id="treatmentType" class="form-control" name="treatmentType" value="<?php echo  isset($_GET['filter']) ? $_GET['treatmentType'] :''; ?>">
                <option selected value="" <?php echo $treatmentType=='' ?'selected':'';?> >-- select one --</option>
                <option value="Diabetic wound Care" <?php echo $treatmentType=='Diabetic wound Care' ?'selected':'';?>>Diabetic wound Care</option>
                <option value="Eye Surgery" <?php echo $treatmentType=='Eye Surgery' ?'selected':'';?>>Eye Surgery</option>
                <option value="Dental Clinic" <?php echo $treatmentType=='Dental Clinic' ?'selected':'';?>>Dental Clinic</option>
                <option value="Speech Therapy" <?php echo $treatmentType=='Speech Therapy' ?'selected':'';?>>Speech Therapy</option>
                <option value="Echo Cardio Services" <?php echo $treatmentType=='Echo Cardio Services' ?'selected':'';?>>Echo Cardio Services</option>
                <option value="Digital X-ray" <?php echo $treatmentType=='Digital X-ray' ?'selected':'';?>>Digital X-ray</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="search">Search</label>
              <input type="text"  name="search" id="search" class="form-control" placeholder="Search doctors!" value="<?php echo isset($_GET['filter']) ? $_GET['search'] : ''; ?>"/>
            </div>

            <div class="col-md-3">
              <input type="submit" name="filter" value="Filter"/>
            </div>

          </form>
      </div>
      <div class="col-12">
        <div class="doctor-listing">
          <div class="row">
            <?php
              $user = new UserController();
              $doctorData = $user->GetFilteredDoctors( isset($_GET['filter']) ? $_GET : [] );
              foreach($doctorData as $item){
                $bookingButton = isLogin() && isPatient() ? "<a href='booking.php?doctorId={$item['uid']}&patientId={$_SESSION['user']['id']}&treatmentType={$item['treatmentType']}' class='contact-doctor text-white text-center'>Add Booking</a>" : "";
                echo "
                  <div class='col-md-4'>
                    <div class='doctor-card bg-light border'>
                      <div class='doctor-card-details'>
                        <h3 class='title'>{$item['title']}</h3>
                        <p class='sub-title text-dark'>{$item['treatmentType']}</p>
                        <p class='about-description'>{$item['bio']}</p>
                        <p class='contact'>{$item['email']} | {$item['phone']}</p>
                        $bookingButton
                      </div>
                    </div>
                  </div>
                ";
              } 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

  ?>
  <?php include_once "./end.php"; ?>  
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>