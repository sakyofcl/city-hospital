<?php include_once "./controller/doctorController.php";?>
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
                    <form action="profile.php" method="POST" enctype="multipart/form-data">
                        <input type="number" name="uid" value="49" hidden>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="branch">Branch</label>
                                <select id="branch" class="form-control" name="branch">
                                    <option value="">-- select one --</option>
                                    <option value="jaffna">Jaffna</option>
                                    <option value="galle">Galle</option>
                                    <option value="kurunagala">Kurunagala</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="treatmentType">Treatment Type</label>
                                <select id="treatmentType" class="form-control" name="treatmentType">
                                    <option selected value="">-- select one --</option>
                                    <option value="Diabetic wound Care">Diabetic wound Care</option>
                                    <option value="Eye Surgery">Eye Surgery</option>
                                    <option value="Dental Clinic">Dental Clinic</option>
                                    <option value="Speech Therapy">Speech Therapy</option>
                                    <option value="Echo Cardio Services">Echo Cardio Services</option>
                                    <option value="Digital X-ray">Digital X-ray</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="bio">Short introduction</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profile">Profile Picture</label>
                            <input type="file" class="form-control-file" id="profile" name="profile" accept="image/png, image/gif, image/jpeg">
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
                                $doctor = new DoctorController();
                                $bookedPatient = $doctor->GetBookedPatient(['doctorId'=>43]);
                                foreach($bookedPatient as $item){
                                    echo "
                                        <tr>
                                            <td>{$item['bookingNumber']}</td>
                                            <td>{$item['patientName']}</td>
                                            <td>{$item['phoneNumber']}</td>
                                            <td>{$item['treatmentType']}</td>
                                        </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



