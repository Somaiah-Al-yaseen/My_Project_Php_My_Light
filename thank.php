<?php
include("connect.php");
session_start();
include("nav.php");?>

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

    <link href="css/checkout.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://kit.fontawesome.com/d9f213cfa1.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container " style="margin-top: 100px; margin-bottom: 100px; ">
<header >
		<h1 class="text-center " >THANK YOU!</h1>
	</header>

	<div class="main-content text-center">
		<i class="fa fa-check main-content__checkmark text-success" id="checkmark" style="font-size: 62px;
    border: 5px solid;
    padding: 10px;
    border-radius: 48%;"></i>
		<p class="text-center mt-4" >Thank you for purchasing from our store</p>
	</div>
    </div>
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