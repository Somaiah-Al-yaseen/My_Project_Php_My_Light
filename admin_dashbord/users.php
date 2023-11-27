<?php
session_start();
include_once 'include/connect.php';

echo '<h1>'. $_SESSION['isAdmin'] . '</h1>';
    if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
        header('Location: login.php');
        exit();
    }   
    else{
        $isGood=$_SESSION['isAdmin'];
    }
     
    if($isGood){
        $fname=$_SESSION['fname'];
        $email=$_SESSION['email'];
    }
$display='none';
$display1='none';

if(isset($_POST["deleteuser"])){
    $id= $_POST["userid"];
    $deletingdata= "UPDATE user SET is_delete=1 WHERE user_id=$id;";
    mysqli_query($conn , $deletingdata);
}

if(isset($_POST["edituser"])){
    $id= $_POST["userid"];
    $stat = "SELECT * FROM user WHERE user_id='$id';";
    $result = mysqli_query($conn,$stat);
    $resultcheck1 = mysqli_num_rows($result);
    if($resultcheck1 > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {$newfName= $row["first_name"];
            $newlName= $row["last_name"];
            $newEmail= $row["email"];
            $newmobile= $row["mobile"];
            $newPassword= $row["pass"];
            $display= 'block';
        }
    }
}

if(isset($_POST["newuser"])){
    $newfName= $_POST["newfName"];
    $newlName= $_POST["newlName"];
    $newEmail= $_POST["newEmail"];
    $newmobile= $_POST["newmobile"];
    $newPassword= $_POST["newPassword"];
    $passHash = $newPassword;
    $is_admin= $_POST['admin'];
    if($is_admin == 'yes'){
        $x=1;
    }else if($is_admin == 'no'){
        $x=0;
    }
    $id= $_POST['userid'];
    $query1= "UPDATE user SET first_name='$newfName', last_name='$newlName',email='$newEmail',
    mobile='$newmobile',pass='$passHash',is_admin='$x' WHERE user_id=$id;";
    $run1= mysqli_query($conn , $query1);
    $display= 'none';
}

if(isset($_POST["adding"])){
    $display1= 'block';
}

if(isset($_POST["addnewuser"])){
    $newufName= $_POST["newufName"];
    $newulName= $_POST["newulName"];
    $newuEmail= $_POST["newuEmail"];
    $newumobile= $_POST["newumobile"];
    $newuPassword= $_POST["newuPassword"];
    $is_admin1= $_POST['admin1'];
    if($is_admin1 == 'yes'){
        $y=1;
    }else if($is_admin1 == 'no'){
        $y=0;
    }
    $query2= "INSERT INTO user(first_name, last_name, email, mobile, pass, is_admin)
    VALUES('$newufName','$newulName','$newuEmail', '$newumobile', '$newuPassword', '$y');";
    $run2= mysqli_query($conn , $query2); 
    $display1= 'none';
}

$query= "SELECT * FROM user WHERE is_delete=0;";
$run= mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($run);
?>




<link rel="stylesheet" href="css/Admin.css">
  

<?php include ("include/sidebar.php");?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include "include/header.php";?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      
                        
                         <!-- <h2 style="display: inline; color:#0F848C;"> Volts Users </h2>
                            <form method="post"><input type="submit" class="btn btn-outline-secondary" value="Add New User" name="adding"></form>
                        </div> -->
                        <div class="container">
                           

                        <div id="editdiv" style="display: <?php echo $display?>;">
                <form method="post">
                    <input type="hidden" value="<?php echo $id?>" name="userid">
                    <label class="col-2">First Name:</label>
                    <input class="col-5" type="text" value="<?php echo $newfName?>" name="newfName"><br>
                    <label class="col-2">Last Name:</label>
                    <input class="col-5" type="text" value="<?php echo $newlName?>" name="newlName"><br>
                    <label class="col-2">Email:</label>
                    <input class="col-5" type="text" value="<?php echo $newEmail?>" name="newEmail"><br>
                    <label class="col-2">Mobile:</label>
                    <input class="col-5" type="text" value="<?php echo $newmobile?>" name="newmobile"><br>
                    <label class="col-2">Password:</label>
                    <input class="col-5" type="text" value="<?php echo $newPassword?>" name="newPassword"><br>
                    <label class="col-2">Admin:</label>
                    <input type="radio" value="yes" name="admin" required> Yes
                    <input type="radio" value="no" name="admin" required> No<br>
                    <input type="submit" class="btn btn-outline-secondary" value="Save" name="newuser">
                </form>
                        </div>
                        <div id="adddiv" style="display: <?php echo $display1?>;">
                <form method="post">
                    <label class="col-2">First Name:</label>
                    <input class="col-5" type="text"  name="newufName" required><br>
                    <label class="col-2">Last Name:</label>
                    <input class="col-5" type="text"  name="newulName" required><br>
                    <label class="col-2">Email:</label>
                    <input class="col-5" type="text" name="newuEmail" required><br>
                    <label class="col-2">Mobile:</label>
                    <input class="col-5" type="text" name="newumobile" required><br>
                    <label class="col-2">Password:</label>
                    <input class="col-5" type="text" name="newuPassword" required><br>
                    <label class="col-2">Admin:</label>
                    <input type="radio" value="yes" name="admin1" required> Yes
                    <input type="radio" value="no" name="admin1" required> No<br>
                    <input type="submit" class="btn btn-outline-secondary" value="Add" name="addnewuser">
                </form>
                        </div>


            
                        </div>

                         <hr>
                         
                        
                     <div class="col-lg-12">
                            <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            
                        <div class="row justify-content-between mb-3">
                        <div class="col-lg-6">
                         <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i> MyLight Users
                        </h3>
                         
                            </div>
                            <div class="col ">
                            <p style="text-align: left; color: #888">Total number of users: <?php echo $resultcheck; ?></p>
                            </div>
                         <div class="col mb-4">
                            
                         <form method="post">
                         <input type="submit" class="btn btn-outline-secondary" value="Add New User" name="adding">
                         </form>
                     </div>
                   
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>First Name</td>
                                            <td>Last Name</td>
                                            <td>Email</td>
                                            <td>Mobile</td>
                                            <td>Is Admin</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $admspan = '<span class="role admin">admin</span>';
                                        $userspan = '<span class="role user">user</span>';

                                    
                                        while ($row = mysqli_fetch_assoc($run)) {
                                            $y = $row['user_id'];
                                            $isAdmin = ($row['is_admin'] == 1) ? $admspan : $userspan;
                                            echo '<tr>
                                                <td>' . $row['user_id'] . '</td>
                                                <td>' . $row['first_name'] . '</td>
                                                <td>' . $row['last_name'] . '</td>
                                                <td>' . $row['email'] . '</td>
                                                <td>' . $row['mobile'] . '</td>
                                                <td>' . $isAdmin . '</td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" value="' . $y . '" name="userid">
                                                        <input class="btn btn-outline-primary" type="submit" value="Edit" name="edituser">
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" value="' . $y . '" name="userid">
                                                        <input type="submit" class="btn btn-outline-danger" value="Delete" name="deleteuser">
                                                    </form>
                                                </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                        <!-- END USER DATA-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
          

<?php include ("include/bottom.php");?>

