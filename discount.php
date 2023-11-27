<?php
include("connect.php"); 
session_start();


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
include("nav.php");
?>









<!-- Discount section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
               Discount <span> Section</span>
               </h2>
            </div>

            <div class="row">


            <?php
            $query = "SELECT * FROM products  WHERE sale_status = 1 LIMIT 4 ;";
            $result = mysqli_query($conn, $query);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $pbs = ($row['price']) * ((100 - $row['sale_pre']) / 100);

                    echo '
                    <div class="col-sm-6 col-md-3 col-lg-3">
                         <div class="box">
                             <div class="option_container">
                                   <div class="options">
                             <a href="cart.php?pro_id=' . $row['id']  . ' " class="option1">
                                               Add To Cart
                                               </a>
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



                }}


?>

               <!-- <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="viewproduct.php" class="option1">
                           View Product
                           </a>

                        </div>
                     </div>
                     <div class="img-box">
                        <img src="Images/ProductsImages/1.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Pendant lamp shade, smoked, 30 cm
                        </h5>
                     </div>
                        <h6 class="sale">
                          <del> <strong> 25 JD</strong> </del>
                          <br>
                         <ins> <strong> 20 JD</strong> </ins>
                        </h6>
                  </div>
               </div>


               <div class="col-sm-6 col-md-3  col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="viewproduct.php" class="option1">
                           View Product
                           </a>
                          
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/ProductsImages/6.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Pendant lamp, black, 20 cm
                        </h5>
                     </div>
                     <h6 class="sale">
                          <del> <strong> 16 JD</strong> </del>
                          <br>
                         <ins> <strong> 16 JD</strong> </ins>
                        </h6>
                  </div>
               </div>


               <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="viewproduct.php" class="option1">
                           View Product
                           </a>
                           
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/productsImages/8.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Pendant lamp with 4 lamps, black
                        </h5>
                     </div>
                     <h6 class="sale">
                          <del> <strong> 139 JD</strong> </del>
                          <br>
                         <ins> <strong> 139 JD</strong> </ins>
                        </h6>
                  </div>
               </div>


               <div class="col-sm-6 col-md-3 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="viewproduct.php" class="option1">
                           View Product
                           </a>
                           
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/productsImages/17.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        LED lighting strip, multicolour, 1 m
                        </h5>
                     </div>
                     <h6 class="sale">
                          <del> <strong> 7 JD</strong> </del>
                          <br>
                         <ins> <strong> 7 JD</strong> </ins>
                        </h6>
                  </div>
               </div> -->


            </div>
            <div class="btn-box">
               <a href="products.php">
               View All products
               </a>
            </div>





         </div>
      </section>
      <!-- end Discount section -->











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