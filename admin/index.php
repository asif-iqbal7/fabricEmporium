<?php
  include "config.php";
  session_start();
  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "../css/bootstrap.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "../css/style.css">
</head>
<body>
<section>
<div class="container">
      <div class="row">
        <div class="col-12 login_box">
            <div class="login-form">
              <h1 class="logo admin-heading">Online Shop</h1>
<!-- Form -->
<form id="adminLogin"  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
        <div class="form-group">
            <label>Email</label>
            <input type="Email" name="username" class="form-control username mb-3" placeholder="Email ID" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password"  class="form-control password" placeholder="password" required>
        </div>
            <input type="submit" name="login" onclick="location.href'dashboard.php'" class="btn mt-4" value="          LOGIN          "/>
    </form>
<!-- /Form -->
<?php
    if(isset($_POST['login'])){
        include "config.php";
          if(empty($_POST['username']) || empty($_POST['password'])){
              echo '<div class="alert alert-danger">All Fields must be entered.</div>';
              die();
          }else{
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = md5($_POST['password']);

          $sql = "SELECT a_id, user_name FROM admin WHERE user_name = '{$username}' AND password= '{$password}'";
              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        session_start();
                        $_SESSION["username"] = $row['user_name'];
                        $_SESSION["a_id"] = $row['a_id'];
                                  header("Location: {$hostname}/dashboard.php");
                                }
                              }else{
                                 echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                              }
                            }
                          }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<!-- bootstrap js -->
<script src = "../js/bootstrap.bundle.js"></script>
<!-- custom js -->
<script src = "../js/script.js"></script>
 </body>
</html>