<?php 
include_once "./controller/userController.php";
include_once "./database/enum/userType.php";
$user = new UserController();
$allUser = $user->GetAllUser();
?>

<div class="p-5">
    <a class='btn btn-primary mb-3' href='form.user.php'>ADD NEW USER</a>
        <table class='table'>
            <thead>
                <tr>
                    <th>UN</th>
                    <th>User Name</th>
                    <th>Type</th>
                    <th>Action</th>                                    
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($allUser as $value) {
                        if(UserType::$Admin != (int)$value['type']){
                            $type = UserType::$Patient == (int)$value['type'] ? "<span class='badge badge-secondary'>Patient</span>" : "<span class='badge badge-success'>Doctor</span>";
                            echo "
                                <tr>
                                    <td>{$value['id']}</td>
                                    <td>{$value['userName']}</td>
                                    <td>$type</td>
                                    <td>
                                        <a class='btn btn-warning' href='form.user.php?uid={$value['id']}'>UPDATE</a>
                                        <a class='btn btn-danger' href='user.delete.php?uid={$value['id']}'>DELETE</a>
                                    </td>
                                </tr>
                            ";
                        }
                    }
                ?> 
            </tbody>
        </table>
</div>