<?php
include_once 'include/connect.php';
session_start();
 

$_SESSION['isLoged'] = false;
if (isset($_POST['submit'])) {
  $Email = $_POST['email'];    // Update to use 'your_name'
  $Password = $_POST['pass']; // Update to use 'your_pass'
  
  $sql1 = "SELECT * FROM user WHERE email = '$Email';";
  $result = mysqli_query($conn, $sql1);
  // var_dump($row = mysqli_fetch_assoc($result));
  
  
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $storedPasswordHash = $row['pass'];

        if (password_verify($Password, $storedPasswordHash) && $row['is_admin'] == 1) {
            $_SESSION['user_id'] = $row["user_id"]; // Store user ID in session
            $_SESSION['isAdmin'] = true;
            $_SESSION['fname']= $row['first_name'];
            $_SESSION['email']= $row['email'];
         


        
        header('location: admin.php'); 
        exit();  
      } else {
        // echo "test 1";
          // header("Location: login.php?err=true");
          $_SESSION['isLoged'] = false;
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
  // header("Location: login.php?err=true");
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User login system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="./css/main.css"> -->
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
  <!-- <script defer src="./js/script.js"></script> -->
</head>

<body>
  <div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
      <div class="col-lg-5">
        <?php
        if (!empty($login_err)) {
          echo "<div class='alert alert-danger'>" . $login_err . "</div>";
        }
        ?>
        <div class="form-wrap border rounded p-4">
          <h1>Admin Log In</h1>
          <p>Please login to continue</p>
         
          <form  method="post" novalidate>
            <div class="mb-3">
              <label for="user_login" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" id="user_login" value="">
              <small class="text-danger"></small>
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" id="password">
              <small class="text-danger"></small>
            </div>
          
            <div class="mb-3">
              <input type="submit" class="btn btn-primary form-control" name="submit" value="Log In">
            </div>
           
          </form>

        </div>
      </div>
    </div>
  </div>
</body>

</html>