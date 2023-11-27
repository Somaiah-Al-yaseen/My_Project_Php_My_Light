<?php
session_start();
require 'include/connect.php';


    if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
        header('Location: login.php');
        exit();
    }   
    else{
        $isGood=$_SESSION['isAdmin'];
    }
     


$display='none';
$display1= "none";


if(isset($_POST["deletecat"])){
    $cat_id= $_POST["catid"];
    $deletingdata= "DELETE FROM categories WHERE category_id=$cat_id;";
    mysqli_query($conn , $deletingdata);
}

// 
if(isset($_POST["editcat"])){
    $cat_id= $_POST["catid"];
    $query1= "SELECT * FROM categories WHERE category_id=$cat_id;";
    $run1= mysqli_query($conn, $query1);
    $resultcheck1 = mysqli_num_rows($run1);
    if($resultcheck1 > 0)
    {
        while($row1 = mysqli_fetch_assoc($run1))
        {$newcatname= $row1['category_name'];
            $display= 'block';
        }
    }
}
if (isset($_POST["saveimg"])) {
    $cat_id= $_POST["catid"];

    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_tem = $_FILES["file"]["tmp_name"];
    $file_store = "./Images/ProductsImages/" . $file_name;
    // echo $file_store;
    move_uploaded_file($file_tem, $file_store);

    $sql2 = "UPDATE categories SET images='$file_store'  WHERE category_id=$cat_id";
    mysqli_query($conn, $sql2);
}

if(isset($_POST["newcat"])){
    $cat_id= $_POST["catid"];
    $newcatname= $_POST["newcatname"];
    $id= $_POST['catid'];
    $query2= "UPDATE categories SET category_name='$newcatname' WHERE category_id=$cat_id;";
    $run2= mysqli_query($conn , $query2);
    $display= 'none';
}
// 

if(isset($_POST["adding"])){
    $display1= "block";
}

if(isset($_POST["addnewcat"])){
    $newcatname= $_POST['newcatname'];
    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_tem = $_FILES["file"]["tmp_name"];
    $file_store = "./Images/ProductsImages/" . $file_name;
    // echo $file_store;
    move_uploaded_file($file_tem, $file_store);

    $query2= "INSERT INTO categories (category_name,images)
    VALUES('$newcatname','$file_store');";
    $run2= mysqli_query($conn , $query2); 
    $display1= 'none';
}

$query= "SELECT * FROM categories;";
$run= mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($run);
?>

<link rel="stylesheet" href="./css/Admin.css">

<?php include ("include/sidebar.php");?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include "include/header.php";?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
             <div class="main-content">
                <div class="section__content section__content--p15">
                    <div class="container-fluid">
                        <div class="col">
                        <div class="user-data">
                        <div class="row justify-content-between mb-3">
                    <div class="col-lg-6">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i> MyLight Categories
                        </h3>
                    </div>
                    <div class="col mb-4">
                        <form method="post">
                            <input type="submit" class="btn btn-outline-secondary" value="Add New Category" name="adding" required>
                        </form>
                    </div>
                    <div class="col mb-4">
                    <p style="text-align: left; color: #888">Total number of categories: <?php echo $resultcheck; ?><p>
                    </div>
                    </div>

                <hr>
             
                <div class="container  ml-5" style="width:90% ">
                
                

                    <div id="editdiv" style="display: <?php echo $display?>;">
                    <form action="?" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $cat_id?>" name="catid">
                                    <label>Change Image:</label>
                                    <input type="file" name="file" id="file" required>
                                    <input type="submit" class="btn btn-outline-success" value="Change Image" name="saveimg">
                    </form>
                        <form method="post">
                            <input type="hidden" value="<?php echo $cat_id?>" name="catid">
                            <label>Category Name:</label>
                            <input type="text"class="border" value="<?php echo $newcatname?>" name="newcatname" required>
                            <input type="submit" class="btn btn-outline-primary" value="Save" name="newcat">
                        </form>
                    </div>
                    <div id="adddiv" style="display: <?php echo $display1?>;">
                        <form method="post" enctype="multipart/form-data">
                            
                            <label>Category Name:</label>
                            <input type="text" class="border"name="newcatname" required><br>
                            <label>Change Image:</label>
                            <input type="file" name="file" id="file" required>
                            <br>
                            <input type="submit" class="btn px-5 btn-outline-success" value="Add" name="addnewcat">
                        </form>
                    </div>
                
                    <div class="table-responsive table-data " >
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th >ID</th>
                                    <th >Category Name</th>
                                    <th >Image</th>
                                    <th >Edit</th>
                                    <th >Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultcheck > 0) {
                                    while ($row = mysqli_fetch_assoc($run)) {
                                        $y = $row['category_id'];
                                        echo '<tr>
                                                <td>' . $row['category_id'] . '</td>
                                                <td>' . $row['category_name'] . '</td>
                                                <td><img src="' . $row['images'] . '"></td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" value="' . $y . '" name="catid">
                                                        <input class="btn btn-outline-primary" type="submit" value="Edit" name="editcat">
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" value="' . $y . '" name="catid">
                                                        <input type="submit" class="btn btn-outline-danger" value="Delete" name="deletecat">
                                                    </form>
                                                </td>
                                            </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
             </div>
             <!-- END USER DATA-->
            </div>
          
                    </div>
        </div>
    </div>
<?php include ("include/bottom.php");?>

