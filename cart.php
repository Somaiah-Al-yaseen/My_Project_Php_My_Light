<?php

require 'connect.php';

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
// Check if the "Update Quantity" form is submitted
if (isset($_POST['update_quantity'])) {
    // Get the product ID and new quantity from the form
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['new_quantity'];

    // Update the quantity in the cart table for the specified product and user
    $update_query = "UPDATE cart SET quantity = $new_quantity WHERE user_id = $user_id AND product_id = $product_id";
    mysqli_query($conn, $update_query);
    header("Location: cart.php");
}
if (isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];
    $delete_query = "DELETE FROM cart WHERE user_id = $user_id AND product_id = $product_id ";
    mysqli_query($conn, $delete_query);
    header("Location: cart.php");
    // header('')
}

// Fetch the user's cart items from the database
$cart_query = "SELECT cart.product_id, products.name, products.image, products.price, cart.quantity
              FROM cart
              INNER JOIN products ON cart.product_id = products.id
              WHERE cart.user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_query);
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


   <div class="container-cart" style="background-color: white; width: 70rem; margin: 30px auto; padding: 30px 60px;">
        <div class="content-cart" style=" display: grid;">
            <h1 style="justify-content: center; display: grid; align-items: center;"> CART </h1>
            <br> <br>
            <table class="table-cart" style="border: 2px solid #f7444e;">
                <tr>
                    <th class='p-2' style="border-bottom: 2px solid #f7444e;">img</th>
                    <th class='p-2' style="border-bottom: 2px solid #f7444e;">PRODUCTS</th>
                    <th class='p-2' style="border-bottom: 2px solid #f7444e;">PRICE</th>
                    <th class='p-2' style="border-bottom: 2px solid #f7444e;">QUANTITY</th>
                    <th class='p-2' style="border-bottom: 2px solid #f7444e;">SUBTOTAL</th>
                  
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($cart_result)) {
                    echo '<tr>';
             
                    echo '<td><div style="left: 0; margin: auto; display: flex; justify-content: space-around; align-items: center; width: 200px;">
                    <img src="'.$row['image'].'" width="50px" alt="Product Image">
                </div></td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>$' . $row["price"] . '</td>';
                    // Create a form for updating quantity
                    echo '<td>
                            <form method="post">
                                <input type="hidden" name="product_id" value="' . $row["product_id"] . '">
                                <div class="d-flex m-3 ">
                                <input class="mr-2 " type="number" name="new_quantity" value="' . $row["quantity"] . '">
                                <input class="p-2 " type="submit" name="update_quantity" value="Update" class="btn">
                                <button type="submit" class="btn btn-danger btn-lg ms-4" name="delete"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </form>
                          </td>';
                          $subtotal = $row["price"] * $row["quantity"];
                    echo '<td>$' .$subtotal  . '</td>';
                    echo '</tr>';
                    // Add the subtotal to the total price
                    $total_price += $subtotal;
                    
                }
                ?>
            </table>
            <br> <br>
            <div class="total" style="margin-left: 5rem;">
                <h3 class="mb-4">CART TOTAL: $<?php echo $total_price; $_SESSION['total']= $total_price;?> </h3>
                <div>
                <a href='checkout.php' class="option1 "  >Checkout </a> </div>

            </div>
            <br> <br>
        </div>
    </div>




                                     

</body>
</div>
</div>


<?php

include("footer.php");

?>