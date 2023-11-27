<?php
session_start();
include("connect.php"); 


if (isset($_POST['signin'])) {
    $Email = $_POST['your_name'];    // Update to use 'your_name'
    $Password = $_POST['your_pass']; // Update to use 'your_pass'

    $sql1 = "SELECT * FROM user WHERE email = '$Email';";
    $result = mysqli_query($conn, $sql1);

    if ($row = mysqli_fetch_assoc($result)) {
        $storedPasswordHash = $row['pass'];
        if (password_verify($Password, $storedPasswordHash) && $row['is_admin'] == 0) {
            $_SESSION['user_id'] = $row["user_id"]; // Store user ID in session

            header('location: index.php?err=true'); // Redirect to LandingPage.php
            exit(); // Important to exit after redirect
        } else {
            $wrong1 = '<style type="text/css">
                    #i11, #one1{
                        display: inline;
                    }
                    </style>';
            $wrong2 = '<style type="text/css">
                    #i22, #two2{
                        display: inline;
                    }
                    </style>';
        }
    }
    header("Location: login.php?err=true");
}


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
     
      
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/d9f213cfa1.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">


   </head>
   <body>
    
    
    
    <?php

include("nav.php") ;

?>

<section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Login</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>


<div class="main">
   <!-- Sing in  Form -->
   <section class="sign-in">
            <div class="container" style="padding-top: 100px;">
                <div class="row">
                    <div class="col-4">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="col-8">
                        
                        <form method="POST" class="register-form" id="login-form">
                        <?php if (isset($_GET['err'])) { ?>
                          <div class="alert alert-danger text-center"><?php echo "Login failed! Invalid email-id or password!"; ?></div>
                             <?php } ?>
                            <div class="form-group">
                                <label for="your_name">name<i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass">password<i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                          
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>






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