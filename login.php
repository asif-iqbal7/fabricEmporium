<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: {$hostname}/index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST['email']))){
        $email_err = "Please enter Email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT `cid`,`first_name`, `email`, `user_pass` FROM `customer` WHERE `email` = ? and `status` = 'active' and `cust_status` ='1'";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id,$firstName, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["firstName"] = $firstName;                            
                            
                            // Redirect user to welcome page
                            header("location: {$hostname}/index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // Email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!-- include header file -->
<?php include 'header.php';?>  
<!-- /include header file -->

<!-- signup success alert -->
<?php  
    if(isset($_SESSION['status']) && $_SESSION !=''){?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Sign Up Successfull!</strong><?php echo $_SESSION['status'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"     aria-label="Close"></button>
            </div>
         <?php
        }
    ?>
<!-- /signup success alert -->
         
<!-- login page  -->
    <div class="row mt-5 pb-4 pt-2">
        <div class="col-md-offset-3 col-md-6">
<!-- Form -->
        <form id="register_sign_up" class="signup_form" action = "" method ="POST"      autocomplete="off">
    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
                <h2>Login form</h2>
                <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email" requried>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" requried>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

                <input type="submit" name="login" class="btn" value="Login"/>
                 <div class="account">
                <p>Do'nt have an account? <a href="register.php" class="text-danger">Register</a></p>
                </div>
            </form>
<!-- end of form-->
        </div>
    </div>

<!-- include footer file -->
<?php include 'footer.php'; ?>
<!-- /include footer file -->