<?php
session_start();

include("connect.php");







$first_name_err = $last_name_err = $email_err = $password_err =   $passwordc_err = "";
$first_name = $last_name = $email = $password = $mobile = $passwordc =  "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # Validate fisrt name
    if (empty(trim($_POST["fname"]))) {
        $first_name_err = "Please enter your first name.";
    } else {
        $first_name = trim($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
            $first_name_err = "Only alphabets and whitespace are allowed";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # Validate full name
        if (empty(trim($_POST["lname"]))) {
            $last_name_err = "Please enter your last name.";
        } else {
            $last_name = trim($_POST["lname"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
                $last_name_err = "Only alphabets and whitespace are allowed";
            }
        }

        # Validate email 
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email address";
        } else {
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Please enter a valid email address.";
            } else {

                $sql = "SELECT user_id FROM user WHERE email = ?";

                if ($stmt = mysqli_prepare($conn, $sql)) {

                    mysqli_stmt_bind_param($stmt, "s", $param_email);


                    $param_email = $email;


                    if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_store_result($stmt);


                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            $email_err = "This email is already registered.";
                        }
                    } else {
                        echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
                    }


                    mysqli_stmt_close($stmt);
                }
            }
        }

        # Validate password
        if (empty(trim($_POST["pass"]))) {
            $password_err = "Please enter a password.";
        } else {
            $password = trim($_POST["pass"]);
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                $password_err = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            }
        }
        if (empty(trim($_POST['re_pass']))) {
            $passwordc_err = "Please enter a  confirm password.";
        } else {
            $password = trim($_POST["re_pass"]);
            if ($_POST["pass"] == $_POST['re_pass']) {
            } else {
                $passwordc_err = "Password did not match!";
            }
        }
        $mobile = $_POST['mobile'];

        if (empty($username_err) && empty($email_err) && empty($password_err)) {

            $sql = "INSERT INTO user(first_name,last_name, mobile, email, pass) VALUES (?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                # Bind varibales 
                mysqli_stmt_bind_param($stmt, "sssss", $param_fname, $param_lname,$param_mobile, $param_email, $param_password);


                $param_fname = $first_name;
                $param_lname = $last_name;
                $param_mobile = $mobile;
                $param_email = $email;
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                $param_password = $passHash;


                if (mysqli_stmt_execute($stmt)) {
                    // echo "<script>" . "alert('Registeration completed successfully. Login to continue.');" . "</script>";
                    echo "<script>" . "window.location.href='./login.php';" . "</script>";
                    exit;
                } else {
                    echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
                }

                # Close statement
                mysqli_stmt_close($stmt);
            }
        }


        // mysqli_close($conn);
    }
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
</head>

<body>


    <?php

    include("nav.php");

    ?>
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Register</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="row" style="padding-top: 75px;">
                    <div class="col-8">

                        <form method="POST" class="register-form" id="register-form">
                            <div>
                                <label for="first-name"> First Name<i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="first-name" placeholder="First Name" required />
                                <small class="text-danger"><?= $first_name_err; ?></small>
                            </div>
                            <div>
                                <label for="last-name"> Last Name<i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="lname" id="last-name" placeholder="Last Name" required />
                                <small class="text-danger"><?= $last_name_err; ?></small>
                            </div>
                            <div>
                                <label for="email"> Email<i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                                <small class="text-danger"><?= $email_err; ?></small>
                            </div>
                            <div>
                                <label for="mobile">Mobile<i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="mobile" id="mobile" placeholder="Your Mobile" required pattern="[0-9]{14}" />
                            </div>

                            <div>
                                <label for="pass">Password<i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required />
                                <small class="text-danger"><?= $password_err; ?></small>
                            </div>
                            <div>
                                <label for="re_pass">Confirm Password<i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required />
                                <small class="text-danger"><?= $passwordc_err; ?></small>
                            </div>
                            <input type="submit" name="submit" id="signup" class="form-submit" value="Register" />

                        </form>
                        <br>
                        <br>
                    </div>
                    <div class="col-4">
                        <figure><img src="images/signup-image.jpg" alt="sign up image"></figure>
                    </div>
                </div>
            </div>
        </section>
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>