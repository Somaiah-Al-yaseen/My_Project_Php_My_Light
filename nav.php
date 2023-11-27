<?php
if (isset($_SESSION['user_id'])) {
   $user_id =  $_SESSION['user_id'];
   $querypop="SELECT * FROM cart  WHERE   user_id=$user_id";
   $resultpop= mysqli_query($conn, $querypop);
   $resultcheckpop = mysqli_num_rows($resultpop);
   
   $quan_sum=0;
   if($resultcheckpop > 0){
       while($rowpop = mysqli_fetch_assoc($resultpop)){
           $quan_sum+= $rowpop['quantity'];
       }
      //  echo '<h1>'.$quan_sum.'</h1>';
   }
    echo'
    <style>
    .hide{
      display: none;
    }

    .show{
      display: list-item;    }
    </style>
    ';


}


?>
       <!-- header section strats -->
       <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php"><img width="250" src="./images/logofinal.png" alt="logo" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                   
                        <li class="nav-item">
                           <a class="nav-link" href="products.php">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contactus.php">Contact Us</a>
                        </li>
                        <li class="nav-item hide" >
                           <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item hide" >
                           <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item show"  >
                           <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">
                              
                           </a>
                        </li>
                       <span style="font-weight: bold;" class="text-danger"><?php if(isset($quan_sum)) echo $quan_sum;?> </span><form class="form-inline">
                           <a style="color: black; text-decoration: none;" onmouseover="this.style.color='red'; this.style.textDecoration='underline';" onmouseout="this.style.color='black'; this.style.textDecoration='none'; " href="cart.php">
                           <i class="fa-solid fa-cart-shopping fa-xl"></i>
                           </a>
                        </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->