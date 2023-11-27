
<?php
include("connect.php"); 
session_start();

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

include("nav.php") ;


?>






      <div class="hero_area">
        
         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="images/slider-bbbg7.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Lighting:                                     
                                   </span>
                                    <br>
                                    More Than Decor!
                                 </h1>
                              
                                 <div class="btn-box">
                                    <a href="products.php" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                 
                                    </span>
                                    <br>
                                    a Source of Tranquility 
                                 </h1>
                           
                                 <div class="btn-box">
                                    <a href="products.php" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Style Home
                                    </span>
                                    <br>
                                    Soothe Soul
                                 </h1>
                                 <div class="btn-box">
                                    <a href="products.php" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                     <li data-target="#customCarousel1" data-slide-to="2"></li>
                  </ol>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>


      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Why Shop With Us
               </h2>
            </div>

            <div class="row">

            <div class="col-md-3">
                  <div class="box ">
                     <div class="img-box">
                     <i class="fa-solid fa-screwdriver-wrench fa-2xl" style="color: #ffffff;"></i>
                     </div>
                     <div class="detail-box">
                        <h5>
                        Quick Installation
                        </h5>
                       
                     </div>
                  </div>
               </div>

               <div class="col-md-3">
                  <div class="box ">
                     <div class="img-box">
                        <i class="fa-solid fa-truck-fast fa-2xl" style="color: #fafcff;"></i>
                     </div>

                     <div class="detail-box">
                        <h5>
                        Free <br> Delivery 

                        </h5>
                        
                     </div>
                  </div>
               </div>

               <div class="col-md-3">
                  <div class="box ">
                     <div class="img-box">
                     <i class="fa-solid fa-medal fa-2xl" style="color: #fcfcfd;"></i>
                     </div>
                     <div class="detail-box">
                        <h5>
                        Best <br> Quality 

                        </h5>

                     </div>
                  </div>
               </div>

               

               <div class="col-md-3">
                  <div class="box ">
                     <div class="img-box">
                     <i class="fa-solid fa-boxes-packing fa-2xl" style="color: #ffffff;"></i>
                     </div>
                     <div class="detail-box">
                        <h5>
                        Echo-Friendly Packing
                        </h5>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      

     <!-- Categories section -->
     <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                   Categories
               </h2>
            </div>
            <div class="row">

               <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="Categories.php?cat_id=1" class="option1">    <!-- .php?cat_id=.$row["categories_id"]-->
                           pendant lamp
                           </a>
         
                        </div>
                     </div>
                     <div class="iamg-box">
                        <img src="./images/cat1.jpg" alt="">
                     </div>
                     
                  </div>
               </div>


               <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="Categories.php?cat_id=2" class="option1">
                           LED Lighting Strips
                           </a>
                          
                        </div>
                     </div>
                     <div class="iamg-box">
                        <img src="./images/cat6.png " alt="">
                     </div>
                     
                  </div>
               </div>


               <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="Categories.php?cat_id=3" class="option1">
                           Wall and Mirror Lamps
                           </a>
                           
                        </div>
                     </div>
                     <div class="iamg-box">
                        <img src="./images/cat5.png" alt="">
                     </div>
                     
                  </div>
               </div>


               <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="Categories.php?cat_id=4" class="option1">
                           Floor and Task Lamps
                           </a>
                           
                        </div>
                     </div>
                     <div class="iamg-box">
                        <img src="./images/cat3.png" alt="">
                        
                     </div>
                     
                  </div>
               </div>

             </div>
            </div>
         </div>
      </section>
      <!-- end Categories section -->



      
      <!-- Discount section -->
      <!-- <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
               Discount <span> Section</span>
               </h2>
            </div>

            <div class="row">


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
               </div>


            </div>
            <div class="btn-box">
               <a href="products.php">
               View All products
               </a>
            </div>





         </div>
      </section> -->
      <!-- end Discount section -->




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



                }}
?>
                </div>
            <div class="btn-box">
               <a href="products.php">
               View All products
               </a>
            </div>





         </div>
      </section>
      <!-- end Discount section -->

   


      <!--start  slider 2 -->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
           <ol class="carousel-indicators">
             <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
           </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
            <div id = "img1" style="height:650px;">
            
                </div>
               <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white;">Brighten Your Life, One Light at a Time: Discover the Comfort in Our Lighting Selection.</h3>
              <p></p>
              </div>
                </div>

          <div class="carousel-item">
          <div id = "img2" style="height:650px;">
           
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h3 style="color: black;">Illuminate Your Home with Comfort: Choose our Lighting Solutions for a Happier Space</h3>
            
              <p></p>
            </div>
            </div>

            <div class="carousel-item">
          <div id = "img3" style="height:650px;">

            <
                </div>
            <div class="carousel-caption d-none d-md-block">
            <h3 style="color:black ; font-weight: bold;">Transform Your Living Space into a Cozy Haven with Our Relaxing Lighting Options</h3>
              <p></p>
            </div>
          </div>

           <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
         </div>
        </div>
       
    <br>
    <br>
    <br>
    <br>
 
    <!-- end slider 2 -->

   
    <?php

include("footer.php") ;

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


