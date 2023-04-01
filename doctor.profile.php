<?php 
include_once "./controller/doctorController.php";
include_once "./controller/userController.php";
$doctor = new DoctorController();
$user = new UserController();
$doctorDetail = $doctor->getDoctorDetails($_SESSION['user']['id'])[0];

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs app-nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" data-toggle="tab" data-target="#personal-profile" type="button" aria-selected="true">Personal Profile</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link"  data-toggle="tab" data-target="#booking" type="button" aria-selected="false">Booked Patients</button>
                </li>
            </ul>

            <div class="tab-content app-nav-content">
                <div class="tab-pane fade show active" id="personal-profile">
                    <form action="update.doctor.profile.php" method="POST">
                        <input type="number" name="id" value="<?php echo $doctorDetail['id']; ?>" hidden>
                        <input type="number" name="uid" value="<?php echo $doctorDetail['uid']; ?>" hidden>
                        <input type="text" name="create_at" value="<?php echo $doctorDetail['create_at']; ?>" hidden>
            
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?php echo $doctorDetail['title']; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="branch">Branch</label>

                                <select id="branch" class="form-control" name="branch">
                                    <option value="" <?php echo $doctorDetail['branch']=='' ?'selected':'';?>>-- select one --</option>
                                    <option value="jaffna" <?php echo $doctorDetail['branch']=='jaffna' ?'selected':'';?> >Jaffna</option>
                                    <option value="galle" <?php echo $doctorDetail['branch']=='galle' ?'selected':'';?>>Galle</option>
                                    <option value="kurunagala" <?php echo $doctorDetail['branch']=='kurunagala' ?'selected':'';?> >Kurunagala</option>
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="treatmentType">Treatment Type</label>
                                <select id="treatmentType" class="form-control" name="treatmentType">
                                    <option value="" <?php echo $doctorDetail['treatmentType']=='' ?'selected':'';?> >-- select one --</option>
                                    <option value="Diabetic wound Care" <?php echo $doctorDetail['treatmentType']=='Diabetic wound Care' ?'selected':'';?>>Diabetic wound Care</option>
                                    <option value="Eye Surgery" <?php echo $doctorDetail['treatmentType']=='Eye Surgery' ?'selected':'';?>>Eye Surgery</option>
                                    <option value="Dental Clinic" <?php echo $doctorDetail['treatmentType']=='Dental Clinic' ?'selected':'';?>>Dental Clinic</option>
                                    <option value="Speech Therapy" <?php echo $doctorDetail['treatmentType']=='Speech Therapy' ?'selected':'';?>>Speech Therapy</option>
                                    <option value="Echo Cardio Services" <?php echo $doctorDetail['treatmentType']=='Echo Cardio Services' ?'selected':'';?>>Echo Cardio Services</option>
                                    <option value="Digital X-ray" <?php echo $doctorDetail['treatmentType']=='Digital X-ray' ?'selected':'';?>>Digital X-ray</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="bio">Short introduction</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo $doctorDetail['bio'];?></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $doctorDetail['email']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $doctorDetail['phone']; ?>">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary mt-3" name="update" value="Save Changes" />
                    </form>                    
                </div>

                <div class="tab-pane fade" id="booking">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>BN</th>
                                <th>Patient Name</th>
                                <th>Contact Number</th>
                                <th>Treatment Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                
                                $bookedPatient = $doctor->GetBookedPatient(['doctorId'=> (int)$_SESSION['user']['id']]);
                                foreach($bookedPatient as $item){
                                    if($item['isApproved']){
                                        echo "
                                            <tr>
                                                <td>{$item['bookingNumber']}</td>
                                                <td>{$item['patientName']}</td>
                                                <td>{$item['phoneNumber']}</td>
                                                <td>{$item['treatmentType']}</td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>

                            <tr>
                                <td>10</td>
                                <td>Ajaz Ahamed</td>
                                <td>063154032</td>
                                <td>Dental Clinic</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Rameash Krishna</td>
                                <td>076258063</td>
                                <td>Diabetic wound Care</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Ameer Moulana</td>
                                <td>06710254862</td>
                                <td>Dental Clinic</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Munaffar</td>
                                <td>067254262</td>
                                <td>Diabetic wound Care</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
