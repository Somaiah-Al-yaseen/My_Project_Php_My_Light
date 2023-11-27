<?php
session_start();
require 'include/connect.php';



if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    header('Location: login.php');
    exit();
} else {
    $isGood = $_SESSION['isAdmin'];
}


// $query = "SELECT
//                 o.order_id,
//                 p.name AS product_name,
//                 p.price,
//                 o.quantity,
//                 b.id AS bill_id,
//                 u.first_name,
//                 u.last_name,
//                 u.mobile
//             FROM
//                 `order` o
//             JOIN
//                 products p ON o.product_id = p.id
//             JOIN
//                 bill b ON o.bill_id = b.id
//             JOIN
//                 user u ON b.user_id = u.user_id
//             ";
// $query = "SELECT
//                 u.user_id AS user_id,
//                 u.first_name,
//                 u.last_name,
//                 u.mobile,
//                 o.order_id,
//                 p.name AS product_name,
//                 p.price
//             FROM
//                 `user` u
//             JOIN
//                 bill b ON u.user_id = b.user_id
//             JOIN
//                 `order` o ON b.id = o.bill_id
//             JOIN
//                 products p ON o.product_id = p.id
//             ";

$query = "SELECT u.user_id AS user_id, u.first_name, u.last_name, u.mobile, GROUP_CONCAT(o.order_id) AS order_ids, GROUP_CONCAT(p.name) AS product_names, SUM(p.price * o.quantity) AS total_amount FROM `user` u JOIN bill b ON u.user_id = b.user_id JOIN `order` o ON b.id = o.bill_id JOIN products p ON o.product_id = p.id GROUP BY u.user_id;";



$runQuery = mysqli_query($conn, $query);
if (!$runQuery) {
    die("Query failed: " . mysqli_error($conn));
}
$resultCheck = mysqli_num_rows($runQuery);

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


                    <div class="container " style="width:auto; height:auto" id="title">
                        <div class="row justify-content-between mb-3">
                            <div class="col-lg-4">
                                <h3 class="title-3">
                                    <i class="zmdi zmdi-account-calendar"></i> MyLight Orders
                                </h3>
                            </div>
                            
                          
                            <div class="col mb-4">
                                <p style="text-align: left; color: #888">Total number of orders: <?php echo $resultCheck; ?>
                                <p>
                            </div>
                        </div>

                        <hr>

                        <div class="container">
                            <div class="table-responsive table-data" style="width: 100%; height:100%;">
                                <table class="table" style="max-width: 80%; overflow-x: auto;">
                                    <tr class="text-center">
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>

                                        <th class="col-lg-5">Product Names</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php
                                    $counter = 0;   
                                    if ($resultCheck > 0) {
                                        while ($row = mysqli_fetch_assoc($runQuery)) {
                                            echo '<tr>
                        <td>' . $row['user_id'] . '</td>
                        <td>' . $row['first_name'] . '</td>
                        <td>' . $row['last_name'] . '</td>
                        <td>' . $row['mobile'] . '</td>
                        
                        <td class="col-lg-5" >' . $row['product_names'] . '</td>
                        <td>' . $row['total_amount'] . '</td>
                        <td>
                            <form> 
                            <select  name="status" class="btn btn-danger" id="select-' . $counter . '">
                            <option value="Pending" class="btn btn-danger">Pending</option>
                            <option value="confirmed" class="btn btn-success">Confirmed </option>
                            </select>
                                </form>
                                </td>
                    </tr>';
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No results found.</td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                      
<script>
    // for select option in orders to change it confirm or pending style
document.addEventListener("DOMContentLoaded", function() {
  var selectElements = document.querySelectorAll("select[name='status']");
  
  selectElements.forEach(function(select) {
    var counter = select.id.split("-")[1]; 
    
    select.addEventListener("change", function() {
      var selectedOption = select.options[select.selectedIndex];
      
      if (selectedOption.value === "confirmed") {
        select.classList.add("btn-success");
        select.classList.remove("btn-danger");
    } else if (selectedOption.value === "Pending") {
        select.classList.add("btn-danger");
        select.classList.remove("btn-success");
    }
    // localStorage.setItem('selectedOption_' + counter, selectedOption.value);
    });
    // var savedOption = localStorage.getItem('selectedOption_' + counter);
    // if (savedOption) {
    //   select.value = savedOption;
    //  // select.dispatchEvent(new Event('change'));
    // }
  });
});
</script>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("include/bottom.php"); ?>