<?php 
include_once "./util/core.php";
?>

<header class="header_section">
  <div class="container-fluid pl-5 pr-5">
    <nav class="navbar navbar-expand-lg app-nav-bar custom_nav-container">

      <a class="navbar-brand d-flex flex-row align-items-center" href="index.php">
        <h2> CITY HOSPITAL </h2> 
      </a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="doctors.php"> Doctors </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="about.php"> About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="service.php"> Services </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php"> Contact Us </a>
              </li>
              
              <?php
                if(isLogin()){
                  $iconSource = './assets/image/default-profile-icon.png';
                  if(isDoctor()){
                    $iconSource = "./assets/image/doctor-profile.PNG";
                  }
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link text-danger font-weight-bold' href='logout.php'> Logout </a>
                    </li>

                    <div class='profile-nav-item'>
                      <a href='profile.php'>
                        <img src='$iconSource'/> 
                      </a>
                    </div>
                  ";
                }
                else{
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='login.php'> Login </a>
                    </li>
                  ";
                }
              ?>

            </ul>
          </div>

    </nav>
  </div>
</header>

