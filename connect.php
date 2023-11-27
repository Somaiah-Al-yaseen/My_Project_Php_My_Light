<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbnam= 'my-light';


$conn= mysqli_connect($servername, $username, $password,$dbnam);


if (!$conn) {
    die(" Connection failed: " . mysqli_connect_error());
  }
  else{
    // echo "Connection successful" ;
  }
 ?>
   