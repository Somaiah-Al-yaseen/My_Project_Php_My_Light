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


<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
        Our Story
        </h2>
      </div>


  <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-6">
          <div class="row">
            <div class="col-lg-12 col-md-12 mt-4 pt-2">
              <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                <img src="./images/1689273168429.jpeg" class="img-fluid" alt="Image" style="width: 1500px;"> <!-- Updated width -->
                <div class="img-overlay bg-dark"></div>
              </div>
            </div>
            <!--end col-->
          </div>
          <!--end row-->
        </div>
        <!--end col-->
        <!--end row-->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">

      <div class="container">
        <div class="section-title ml-lg-5">
          <h4 class="title mb-4 display-4 "><span class="custom"> My Light</span> Decor Center </h4>
          <p class="text-muted mb-0 cus">I am a student from the Orange Academy for Programming, Aqaba branch, and this is my 5th project. I was able to build this website after four continuous days of working without interruption using the technology that I learned during three months of this program. I am proud of this achievement that I have done. I enjoyed the time spent completing this excellent site, and I believe that it will be a new step for my progress in this field.</p>

        </div>
      </div>
      <!--end col-->
    </div>
    <!--enr row-->
  </div>
  <!--end container-->
<br>
<br>
  <div class="heading_container heading_center">
        <h2>
        About Me
        </h2>
      </div>


      
            <!-- Team item-->
            <div class="row text-center flx justify-content-center">
              <!-- Team item-->
              <!-- was edited -->
              
              <!-- End-->

             

              <!-- Team item-->
              <div class="col-xl-8 col-sm-8 mb-5 ">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="./images/Somaiah.jpeg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0">Somaiah Al-Yaseen</h5><span class="small text-uppercase text-muted">CEO - Founder </span>
                  <ul class="social mb-0 list-inline mt-3">

                    <li class="list-inline-item"><a href="https://github.com/Somaiah-Al-yaseen" target="_blank" class="social-link"><i class="fa fa-github"></i></a></li>

                    <li class="list-inline-item"><a href="https://www.linkedin.com/in/somaiah-al-yaseen-50b36127a/" target="_blank" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
              <!-- End-->

              <!-- Team item-->

           

            
       
    </div>
    </div>
  </section>




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
