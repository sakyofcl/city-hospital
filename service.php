<?php  
include_once "./util/core.php";
startSession();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Services | City Hospital</title>
  <?php include_once "./headerLink.php"; ?>  
</head>

<body>
  <?php include_once "./navigation.php"; ?>

  <div class="title-flex container-fluid p-0 m-0">
      <img src="./assets/image/service-banner.jpg"/>
  </div>

  <div class="container service mt-3">
    <div class="row">
      <div class="col-12">
        <div class="page-heading">
          <h2><span class="dot"></span>Our Services</h2>
        </div>
      </div>

      <div class="col-12">
        <div class="row">
          <div class="col-md-4">
            <div class="box">
              <img src="./assets/image/diabetic-service.jpg"/>
              <a href="#">
                Diabetic wound Care
              </a>
              <p>
                Diabetic wound care is a specialized healthcare service that focuses on the prevention and treatment of wounds in individuals with diabetes. 
                Effective diabetic wound care is critical for preventing serious complications and improving the quality of life for individuals with diabetes.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <img src="./assets/image/eye-surgery.jpg"/>
              <a href="#">
                Eye Surgery
              </a>
              <p>
                Eye surgery, also known as ocular surgery, is a surgical procedure that aims to correct or improve various eye conditions, including refractive errors, cataracts, glaucoma, and other eye disorders. 
                Eye surgery is typically performed by an ophthalmologist.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <img src="./assets/image/dental-service.jpg"/>
              <a href="#">
                Dental Clinic
              </a>
              <p>
              A dental clinic is a healthcare facility that provides dental care services to patients. Dental clinics typically offer a wide range of services, including routine check-ups, cleanings, fillings, extractions, root canals, crowns, bridges, and other dental procedures.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <img src="./assets/image/speech-thrapy.jpg"/>
              <a href="#">
                Speech Therapy
              </a>
              <p>
                Speech therapy is a healthcare service that aims to improve communication and speech-related issues in individuals of all ages.
                it's also known as speech-language pathologists, work with people who have difficulties with speech, language, voice, fluency, and swallowing
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <img src="./assets/image/echo-service.jpg"/>
              <a href="#">
                Echo Cardio Services
              </a>
              <p>
                Echo Cardio Services, also known as echocardiography, is a diagnostic imaging technology that uses ultrasound waves to create detailed images of the heart and its surrounding structures.
                Echo Cardio Services is a non-invasive and safe procedure.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <img src="./assets/image/digital-xray.jpg"/>
              <a href="#">
                Digital X-ray
              </a>
              <p>
                Digital X-ray is a modern diagnostic imaging technology that uses digital sensors instead of traditional photographic film to capture and create images of the human body.
                it's help healthcare providers make accurate diagnoses and provide effective treatment.
              </p>
            </div>
          </div>

          

        </div>
      </div>


    </div>
  </div>

  <?php include_once "./end.php"; ?> 
  <?php include_once "./footer.php"; ?>  
  <?php include_once "./script.php"; ?>  
</body>

</html>