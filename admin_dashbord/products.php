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
$display = "none";
$display1 = "none";

if (isset($_POST["deletepro"])) {
    $pro_id = $_POST["proid"];
    $deletingdata = "DELETE FROM products WHERE id=$pro_id;";
    mysqli_query($conn, $deletingdata);
}

// 
if (isset($_POST["editpro"])) {
    $pro_id = $_POST["proid"];
    $sql1 = "SELECT * FROM products WHERE id='$pro_id';";
    $result1 = mysqli_query($conn, $sql1);
    $resultcheck1 = mysqli_num_rows($result1);
    if ($resultcheck1 > 0) {
        while ($row2 = mysqli_fetch_assoc($result1)) {
            $newcatid = $row2["category_id"];
            $newname = $row2["name"];
            $newprice = $row2["price"];
            $newsales = $row2["sale_status"];
            $newsalep = $row2["sale_pre"];
            $newdescription = $row2["description"];
            $newstuatus = $row2["status"];
        }
    }
    $display = 'block';
}

if (isset($_POST["saveeditpro"])) {
    $pro_id = $_POST["proid"];
    $newcatid = $_POST["newcatid"];
    $newname = $_POST["newname"];
    $newprice = $_POST["newprice"];
    $newsales = $_POST["newsales"];
    $newsalep = $_POST["newsalep"];
    $newdescription = $_POST["newdescription"];
    $newstuatus = $_POST["newstuatus"];

    $sql2 = "UPDATE products SET category_id='$newcatid', name='$newname', price='$newprice',
    sale_status='$newsales', sale_pre='$newsalep', description='$newdescription', status='$newstuatus'  WHERE id=$pro_id;";
    mysqli_query($conn, $sql2);
    $display = 'none';
}

if (isset($_POST["saveimg"])) {
    $pro_id = $_POST["proid"];

    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_tem = $_FILES["file"]["tmp_name"];
    $file_store = "./Images/ProductsImages/" . $file_name;
    // echo $file_store;
    move_uploaded_file($file_tem, $file_store);

    $sql2 = "UPDATE products SET image='$file_store'  WHERE id=$pro_id;";
    mysqli_query($conn, $sql2);
}
// 

if (isset($_POST["adding"])) {
    $display1 = "block";
}

if (isset($_POST["addnewpro"])) {
    $newpcatid = $_POST["newpcatid"];
    $newpname = $_POST["newpname"];
    $newpprice = $_POST["newpprice"];
    $newpsales = $_POST["newpsales"];
    $newpsalep = $_POST["newpsalep"];
    $newpdescription = $_POST["newpdescription"];
    $newpstuatus = $_POST["newpstuatus"];

    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_tem = $_FILES["file"]["tmp_name"];
    $file_store = "./Images/ProductsImages/" . $file_name;
    // echo $file_store;
    move_uploaded_file($file_tem, $file_store);

    $adding_pro = "INSERT INTO products(category_id, name, price, sale_status, sale_pre, description, image, status)
    VALUES('$newpcatid','$newpname','$newpprice', '$newpsales', '$newpsalep', '$newpdescription','$file_store','$newpstuatus');";
    mysqli_query($conn, $adding_pro);
    $display1 = 'none';
}


$query = "SELECT * FROM products ORDER BY id DESC;";
$run = mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($run);


// search for product 
if (isset($_GET["search"])) {
    $search_query = mysqli_real_escape_string($conn, $_GET["search_query"]);
    $query = "SELECT * FROM products WHERE name LIKE '%$search_query%' ORDER BY id DESC;";
} else {
    $query = "SELECT * FROM products ORDER BY id DESC;";
}

$run = mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($run);
?>
<?php include("include/sidebar.php"); ?>
<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php include "include/header.php"; ?>
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content" style="width:auto;">
        <div class="section__content ">
            <div class="container-fluid">
                <div class="user-data">


                    <div class="container " style="width:auto " id="title">
                        <div class="row justify-content-between mb-3">
                            <div class="col-lg-3">
                                <h3 class="title-3">
                                    <i class="zmdi zmdi-account-calendar"></i> MyLight Products
                                </h3>
                            </div>
                            <div class="col-lg-3">
                                <form method="get" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search by product name..." name="search_query">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col mb-4">
                                <form method="post">
                                    <input type="submit" class="btn btn-outline-secondary" value="Add New Products" name="adding" required>
                                </form>
                            </div>
                            <div class="col mb-4">
                                <p style="text-align: left; color: #888">Total number of products: <?php echo $resultcheck; ?>
                                <p>
                            </div>
                        </div>

                        <hr>

                        <div class="container ">


                            <div id="editdiv" style="display: <?php echo $display ?>;">
                                <form action="?" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $pro_id ?>" name="proid">
                                    <label>Change Image:</label>
                                    <input type="file" name="file" id="file" required>
                                    <input type="submit" class="btn btn-outline-success" value="Change Image" name="saveimg">
                                </form>
                                <hr>
                                <form method="post">
                                    <input type="hidden" value="<?php echo $pro_id ?>" name="proid">
                                    <label class="col-2">Category ID:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newcatid ?>" name="newcatid" required><br>
                                    <label class="col-2">Name:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newname ?>" name="newname" required><br>
                                    <label class="col-2">Price:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newprice ?>" name="newprice" required><br>
                                    <label class="col-2">Sale Status:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newsales ?>" name="newsales" required><br>
                                    <label class="col-2">Sale Percentage:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newsalep ?>" name="newsalep" required><br>
                                    <label class="col-2">Description:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newdescription ?>" name="newdescription" required><br>
                                    <label class="col-2">Status:</label>
                                    <input class="col-5 border" type="text" value="<?php echo $newstuatus ?>" name="newstuatus" required><br>
                                    <input type="submit" class="col-2 offset-md-3 mr-auto ml-50  btn btn-outline-success" value="Save" name="saveeditpro">
                                </form>
                            </div>
                            <div id="adddiv" style="display: <?php echo $display1 ?>;">
                                <form action="?" method="post" enctype="multipart/form-data">
                                    <label class="col-2">Category ID:</label>
                                    <input class="col-5 border" type="text" name="newpcatid" required><br>
                                    <label class="col-2">Name:</label>
                                    <input class="col-5 border" type="text" name="newpname" required><br>
                                    <label class="col-2">Price:</label>
                                    <input class="col-5 border" type="text" name="newpprice" required><br>
                                    <label class="col-2">Sale Status:</label>
                                    <input class="col-5 border" type="text" name="newpsales" required><br>
                                    <label class="col-2">Sale Percentage:</label>
                                    <input class="col-5 border" type="text" name="newpsalep" required><br>
                                    <label class="col-2">Description:</label>
                                    <input class="col-5 border" type="text" name="newpdescription" required><br>
                                    <label class="col-2">Image:</label>
                                    <input class="col-5 border" type="file" name="file" id="file" required><br>
                                    <label class="col-2">Status:</label>
                                    <input class="col-5 border" type="text" name="newpstuatus" required><br>
                                    <input type="submit" class="btn btn-outline-success" value="Add" name="addnewpro">
                                </form>
                            </div>
                            <div class="table-responsive table-data " style="width:100%;" >
                                <table class="table" style="max-width: 80%; overflow-x: auto;">

                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Category ID</th>
                                        <th>NAME</th>
                                        <th>Price</th>
                                        <th>Sale Status</th>
                                        <th>Sale Percentage</th>
                                        <!-- <th>Description</th> -->
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                    if ($resultcheck > 0) {
                                        while ($row = mysqli_fetch_assoc($run)) {
                                            $y = $row['id'];
                                            echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['category_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>' . $row['sale_status'] . '</td>
                    <td>' . $row['sale_pre'] . '</td>
                
                    <td><img src="' . $row['image'] . '"></td>
                    <td>' . $row['status'] . '</td>
                    <td>
                    <form method="post">
                    <input type="hidden" value="' . $y . '" name="proid">
                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="editpro">
                    </form>
                    </td>
                    <td>
                    <form method="post">
                    <input type="hidden" value="' . $y . '" name="proid">
                    <input type="submit" class="btn btn-outline-danger" value="Delete" name="deletepro">
                    </form>
                    </td>
                </tr>
                ';
                                        }
                                    } else {
                                        echo "<p>No products found.</p>";
                                    }
                                    echo '</table> <br><br>';

                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("include/bottom.php"); ?>