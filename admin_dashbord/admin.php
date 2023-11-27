<?php 
session_start();
include('include/connect.php');
include("include/sidebar.php");


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
    // for getting how much products we sold
    $query= "SELECT * FROM `order` INNER JOIN bill ON `order`.bill_id=bill.id INNER JOIN products ON `order`.product_id=products.id;";
$run= mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($run);
$totalsold = 0 ; 
                if($resultcheck > 0)
                {
                    while($row = mysqli_fetch_assoc($run))
                    {
                    $totalsold+=$row['quantity'];
                  
                    }
                }
                
// for total money
$sql= "SELECT total FROM bill;";
$result= mysqli_query($conn, $sql);
$check= mysqli_num_rows($result);
$total= 0;
if($check > 0){
    while($row2 = mysqli_fetch_assoc($result))
    {
        $total+= $row2["total"];
    }
}
  
    ?>
<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php include "include/header.php";
 
    
        ?>
    
    
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>1</h2>
                                        <span>members online</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $totalsold?> </h2>
                                        <span>items solid</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>139</h2>
                                        <span>this week</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2>$<?php echo $total?>   </h2>
                                        <span>total earnings</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Monthly Sales Report</h3>
                                <div class="box-tools pull-right">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label>Select Year: </label>
                                            <select class="form-control input-sm" id="select_year">
                                                <?php
                                                for ($i = 2015; $i <= 2065; $i++) {
                                                    $selected = ($i == $year) ? 'selected' : '';
                                                    echo "
                            <option value='" . $i . "' " . $selected . ">" . $i . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <br>
                                    <div id="legend" class="text-center"></div>
                                    <canvas id="barChart" style="height:350px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<?php include("include/bottom.php"); ?>