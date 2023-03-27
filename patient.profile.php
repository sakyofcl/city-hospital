<?php include_once "./controller/doctorController.php";?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs app-nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" data-toggle="tab" data-target="#profile" type="button" aria-selected="true">Profile</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link"  data-toggle="tab" data-target="#medical-test" type="button" aria-selected="false">Medical Test</button>
                </li>
            </ul>

            <div class="tab-content app-nav-content">
                <div class="tab-pane fade show active" id="profile">
                    <form action="profile.php" method="POST">
                        <input type="number" name="uid" value="49" hidden>

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" id="phone" name="phone"/>
                        </div>

                        <input type="submit" class="btn btn-primary mt-3" name="update" value="Save Changes" />
                    </form>                    
                </div>

                <div class="tab-pane fade" id="medical-test">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>TN</th>
                                <th>Test Name</th>
                                <th>Test Result</th>
                                <th>Test Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Urin Test</td>
                                <td>Passed</td>
                                <td>2022/10/2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
