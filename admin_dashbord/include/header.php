<?php

if(isset($_SESSION['isAdmin'])){
    $fname=$_SESSION['fname'];
    $email=$_SESSION['email'];
}
else{
    header("Location: ../login.php");  
}
?>
<style>
 .spacer {
    margin: 0 26rem; 
    display: inline-block;
}</style>
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid d-flex">
            <div class="header-wrap">
                <div class="header-button">
                    <div class="account-wrap">
                    <div class="col">
                               
                               <div class="content space  justify-content-center">
                                   Welcome : 
                                   <a class="js-acc-btn" href="#"> <?php echo $fname?></a>
                                   <span class="spacer"></span>
                                   <a href="include/logout.php" class="btn btn-outline-secondary">
                                       <i class="zmdi zmdi-power"></i>Logout
                                   </a>
                               </div>
                           </div>
                        <div class="account-item clearfix js-item-menu">
                           
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                       <p>Welcome</p>
                                                        <a href="#"><?php echo $fname?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $email?></span>
                                                </div>
                                            </div>
                                            <!-- <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div> -->
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>