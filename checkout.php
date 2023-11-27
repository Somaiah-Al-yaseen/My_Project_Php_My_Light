<?php
include("connect.php");

session_start();
include("nav.php");
if (isset($_SESSION['user_id'])) {
    $user_id =  $_SESSION['user_id'];
}
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if user is not logged in
    header("Location: login.php");
    exit;
}
$cart_query = "SELECT products.name, cart.quantity, products.price, cart.product_id
               FROM cart
               INNER JOIN products ON cart.product_id = products.id
               WHERE cart.user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_query);

$user_query = "SELECT * FROM user WHERE user_id  = $user_id";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
// echo $user_data['mobile'];

if (isset($_POST['checkout'])) {
    // Step 1: Insert Data into the Bill Table
    $total_price = 0;
    while ($row = mysqli_fetch_assoc($cart_result)) {
        $total_price += $row['price'] * $row['quantity'];
    }
    $insert_bill_query = "INSERT INTO bill (user_id, total) VALUES ($user_id, $total_price)";
    mysqli_query($conn, $insert_bill_query);

    // Get the newly inserted bill ID
    $bill_id = mysqli_insert_id($conn);

    // Step 2: Insert Data into the Order Table
    mysqli_data_seek($cart_result, 0); // Reset the cart result set
    while ($row = mysqli_fetch_assoc($cart_result)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $insert_order_query = "INSERT INTO `order` (bill_id, product_id, quantity) 
                               VALUES ($bill_id, '$product_id', $quantity)";
        mysqli_query($conn, $insert_order_query);
    }

    // Step 3: Clear Cart Items
    $clear_cart_query = "DELETE FROM cart WHERE user_id = $user_id";
    mysqli_query($conn, $clear_cart_query);

     // Redirect to a confirmation page or perform any other necessary actions
     header("Location: thank.php");
     exit;

}

$total_price = 0;
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

    <link href="css/checkout.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://kit.fontawesome.com/d9f213cfa1.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
      <div class="py-5 text-center">
     
      <h1 style="justify-content: center; display: grid; align-items: center;"> Checkout </h1>

       
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <!-- <span class="badge badge-secondary badge-pill">3</span> -->
          </h4>
          <ul class="list-group mb-3">
          <?php
                while ($row = mysqli_fetch_assoc($cart_result)) {

          echo ' <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">'.$row["name"].'</h6>
                <small class="text-muted">' . $row["quantity"] . '</small>
              </div>
              <span class="text-muted">'.$row["price"].' </span>
            </li>';
            $subtotal = $row["price"] * $row["quantity"];
            $total_price += $subtotal;
          
            }?>
          
          
        
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <strong><?php echo $total_price  ?></strong>
            </li>
          </ul>

        
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $user_data['first_name']?> " required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $user_data['last_name']?> "required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Phone number</label>
              <div class="input-group">
                
                <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $user_data['mobile']?> " required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" value="<?php echo $user_data['email']?> ">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>Jordan</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>Aqaba</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
        
            <div>
                <button type="submit" class="option1 " name="checkout"  >Place Order </button> 

            </div>

       
          
           
          </form>
        </div>
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