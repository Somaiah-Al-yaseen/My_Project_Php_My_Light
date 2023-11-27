<?php
session_start();
include("connect.php");



//////////////////add this code in everywhere has "add to cart button"/////////////////////
if (isset($_SESSION['user_id'])) {
   $userid = $_SESSION['user_id'];
}
if (isset($_POST['addcart'])) {
   if (!isset($_SESSION['user_id'])) {
      // Redirect to the login page if user is not logged in
      header("Location: login.php");
      exit;
  }
   // Get the product ID from the submitted form
   $product_id = $_POST['proid'];

   // Check if the product is already in the user's cart
   $check_query = "SELECT * FROM cart WHERE user_id = $userid AND product_id = $product_id";
   $check_result = mysqli_query($conn, $check_query);

   if (mysqli_num_rows($check_result) > 0) {
       // Product already in the cart, update quantity
       $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $userid AND product_id = $product_id";
       mysqli_query($conn, $update_query);
   } else {
       // Product not in the cart, insert it
       $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($userid, $product_id, 1)";
       mysqli_query($conn, $insert_query);
   }

  
}
/////////////////////////////////////////////////////////////////


?>
<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/half-logo.png" type="">
   <title> Mylight</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet" />
   <!-- Css styles for login -->
   <link href="css/login.css" rel="stylesheet" />
   <!-- Css styles for register -->
   <link href="css/register.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="css/responsive.css" rel="stylesheet" />
   <script src="https://kit.fontawesome.com/d9f213cfa1.js" crossorigin="anonymous"></script>
</head>

<body>


<?php
include("nav.php");?>
   

   <!-- inner page section -->
   <section class="inner_page_head">
      <div class="container_fuild">
         <div class="row">
            <div class="col-md-12">
               <div class="full">
                  <h3>Product Grid</h3>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end inner page section -->







   <!-- product section -->
   <section class="product_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
            <h2>
               Our <span>products</span>
            </h2>
         </div>

         <div class="row">

            <?php





            $query = "SELECT * FROM products INNER JOIN categories WHERE products.category_id = categories.category_id ;";
            $result = mysqli_query($conn, $query);
            $resultcheck = mysqli_num_rows($result);

           

            if ($resultcheck > 0) {
              
               while ($row = mysqli_fetch_assoc($result)) {
                  $x = $row['id'];
                  if ($row["sale_status"] == 1) {
                     $pbs = ($row['price']) * ((100 - $row['sale_pre']) / 100);
                     //// price after sale 

                     echo '
                    <div class="col-sm-6 col-md-3 col-lg-3">
                         <div class="box">
                             <div class="option_container">
                                   <div class="options">
                           
                                               <form method="post">
                                               <input type="hidden" value="'.$row["id"].'" name="proid">
                                                <input type="submit" class="btn rounded-pill option1" value="Add to Cart" name="addcart">
                                             </form>
                                  <a href="viewproduct.php?view_id=' . $row["id"] . ' " class="option2">
                                              View Product
                                             </a>

                                            </div>
                                       </div>
                                        <div class="img-box">
                                       <img src=" ' . $row["image"] . '" alt="">
                                      </div>
                                      <div class="detail-box">
                               <h5>
                               ' . $row["name"] . '
                                                 </h5>
                                               </div>
                                           <h6 class="sale">
                                       <del> <strong> ' . floor($row["price"]) . '  JD' . ' </strong> </del>
                                      <br>
                                           <ins> <strong> '  .  $pbs . '  JD' . ' </strong> </ins>
                                            </h6>
                                              </div>
                                             </div>
                        
                        ';
                  } else {


                     echo '
                          <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="box">
                  <div class="option_container">
                     <div class="options">
                     <form method="post">
                     <input type="hidden" value="'.$row["id"].'" name="proid">
                      <input type="submit" class="btn rounded-pill option1" value="Add to Cart" name="addcart">
                   </form>
                        <a href="viewproduct.php?view_id=' . $row["id"] . ' " class="option2">
                        View Product
                        </a>
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="' . $row["image"] . '" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                     ' . $row["name"] . '
                     </h5>
                  </div>
                  <h6 class="price">
                      <strong>' . floor($row["price"]) . '  JD' . '  </strong> 
                       </h6>
               </div>
            </div>
                          
                          
                          
                          ';
                  }
                 
               }
            }
            echo "</div>";
           
            ?>

   </section>
   </div>
   </div>

   <?php
   // product arr of id ;
   // if (isset($_POST['addcart'])) {
      //  $product_id = $_POST['proid'];
       // Add the product ID to the products array
      //  $_SESSION['products'][] = $product_id;
   // }

   // Display the products array for testing
   // echo '<pre>';
   // print_r($_SESSION['products']);
   // echo '</pre>';
   ?>










   <?php

   include("footer.php");

   ?>


   <!-- footer section -->
   <!-- jQery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
</body>

</html>