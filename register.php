<?php
// Include config file
require_once "config.php";
session_start();
 
// Define variables and initialize with empty values
$username = $password = $confirm_password =$email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a valid Email.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+@/', trim($_POST["email"]))){
        $email_err = "Required formate is 'example@gmail.com'";
    } else{
        // Prepare a select statement
        $sql1 = "SELECT `cid` FROM `customer` WHERE `email` = ?";
        
        if($stmt1 = mysqli_prepare($link, $sql1)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                /* store result */
                mysqli_stmt_store_result($stmt1);
                
                if(mysqli_stmt_num_rows($stmt1) > 0 ){
                    $email_err = "This Email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt1);
        }
    }
  
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT cid FROM customer WHERE user_name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    // Generate tokken
        $token=bin2hex(random_bytes(15));



    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO `customer` (`first_name`,`last_name`,`email`,`user_name`,`user_pass`,`phone_no`,`address`,`city`,`token`,`status`,`cust_status`) VALUES (?,?,?,?,?,?,?,?,?,'inactive','0')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssisss", $_POST['firstName'],$_POST['lastName'],$param_email, $param_username, $param_password,$_POST['phoneNo'],$_POST['address'],$_POST['city'],$token);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
  
               $subject = "Account Activation Email";
               $body = "Hi! $param_username. Click here to Activate your account
                http://localhost/Fabrics_Emporium_Online_Final/activation.php?token={$token}"; 
               $sender = "From: sam03037161818@gmail.com";

              if (mail( $param_email, $subject, $body, $sender )) {
               $_SESSION['status'] ="Check your mail to activate your account.";
                header("location: {$hostname}/login.php");
                   } else {
                        echo "Email sending failed...";
                      }

                // Redirect to login page
              //  header("location: {$hostname}/login.php?signupsuccess=true");
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
<?php include 'header.php'; ?>  
<!-- /include header file -->
  
<!-- login page  -->
         <div class="row mt-5 pt-2 pb-4">
        <div class="col-md-offset-3 col-md-6">
           
            <!-- Form -->
            <form id="register_sign_up" class="signup_form" action ="" method ="POST" autocomplete="off">
                <h2>register here</h2>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstName" class="form-control first_name" placeholder="First Name" requried />
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastName" class="form-control" placeholder="Last Name" requried />
                </div>
                <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="example@gmail.com" requried>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div> 
                <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="user Name" requried>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password" requried>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password" requried>
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>


                <div class="form-group">
                    <label>Mobile</label>
                    <input type="phone" name="phoneNo" class="form-control mobile" placeholder="Mobile" requried />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control address" placeholder="Address" requried>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control city" placeholder="City" requried>
                </div>
                <input type="submit" name="signup" class="btn" value="sign up"/>
                <p class="text-center mt-3">Already have an account? <a class=" text-danger" href="login.php">Log In</a></p>
            </form>
            <!-- end of form-->
            
        </div>
    </div>

<!-- include footer file -->
<?php include 'footer.php'; ?>
<!-- /include footer file -->