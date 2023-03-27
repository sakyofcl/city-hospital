<?php 
include_once "./controller/InquirieController.php"; 
include_once "./util/core.php";
startSession();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Us | City Hospital</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
  <?php include_once "./navigation.php"; ?> 

  <div class="title-flex container-fluid p-0 m-0">
      <img src="./assets/image/contact-us-banner.jpg"/>
  </div>

  <div class="container contact-us mt-3">

    <div class="row">
      <div class="col-12">
        <div class="page-heading">
          <h2><span class="dot"></span>Contact Us</h2>
        </div>
        <?php showSuccess(); ?>
      </div>
      <div class="col-12">
        <div class="core-contact">
          <div class="core-contact-info">
            <div class="info-key-value">
                <span class="key">Emergency Hotline</span>
                <span class="value">- 1022 Or 011 102 1001</span>
            </div>
            <div class="info-key-value">
                <span class="key">General Line</span>
                <span class="value">- 001 102 1025</span>
            </div>
            <div class="info-key-value">
                <span class="key">Fax</span>
                <span class="value">- 001 777 1555</span>
            </div>
            <div class="info-key-value">
                <span class="key">Email</span>
                <span class="value">- info@cityhospital.com</span>
            </div>
          </div>
          <div class="core-contact-social">
            <img src="./assets/image/emergency-contact.jpg"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="branch-info">
          <div class="branch-info-card">
            <div class="branch-details">
              <span class="title">Galle Address</span>
              <span class="sub-title">Head Branch</span>
              <span class="address">
                No. 578 Elvitigala Mawatha,<br/>
                Narahenpita Galle 05,<br/>
                Sri Lanka
              </span>
              <span class="contact">galle@cityhospital.com <br/> 075 7563 282</span>
            </div>
            <div class="branch-image">
              <img src="./assets/image/galle-hospital.jpg">
            </div>
          </div>
          <div class="branch-info-card">
            <div class="branch-details">
              <span class="title">Kurunagala Address</span>
              <span class="sub-title">City Branch</span>
              <span class="address">
                No. 18 Run Mawatha,<br/>
                Hasthishaila Kurunagala 15,<br/>
                Sri Lanka
              </span>
              <span class="contact">kurunagala@cityhospital.com <br/> 065 1263 282</span>
            </div>
            <div class="branch-image">
              <img src="./assets/image/kurunagala-hopital.jpg">
            </div>
          </div>
          <div class="branch-info-card">
            <div class="branch-details">
              <span class="title">Jaffna Address</span>
              <span class="sub-title">Village Branch</span>
              <span class="address">
                No. 100, Carglis square,<br/>
                Kondavil Jaffna 05,<br/>
                Sri Lanka
              </span>
              <span class="contact">jaffna@cityhospital.com <br/> 077 4325 302</span>
            </div>
            <div class="branch-image">
              <img src="./assets/image/jaffna-hospital.jpg">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="contact-us-wrapper">
          <div class="contact-us-form-img">
            <img src="./assets/image/contact-us-form.PNG"/>
          </div>
          <form action="contact.php" method="POST" class="contact-form" id="contact-form">
            <h5 class="title">Contact From</h5>
            <p class="description">Please contact us for inquiries</p>
            <div>
              <input type="text" name="name" class="form-control rounded border-white mb-3 form-input" id="name" placeholder="Name" >
            </div>
            <div>
              <input type="email" name="email" class="form-control rounded border-white mb-3 form-input" id="email" placeholder="Email" >
            </div>
            <div>
              <textarea id="message" name="message" class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" placeholder="Message" ></textarea>
            </div>
            <div class="submit-button-wrapper">
              <input type="submit" value="Submit" name="contact">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['contact'])){
      $InquirieController = new InquirieController();
      unset($_POST['contact']);
      $InquirieController->addInquirie($_POST);
    }
  ?>

  <?php include_once "./end.php"; ?>  
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
 
  <script type="text/javascript">
    window.onload=()=>{
      $("#contact-form").validate({
        rules:{
          name : "required",
          email :{required:true, email: true},
          message : "required"
        },
        messages:{
          name : "required*",
          message : "required*",
          email: "invalid email"
        },
        errorElement: "div"

      });
    };
  </script>

</body>
</html>