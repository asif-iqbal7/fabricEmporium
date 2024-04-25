<!-- Activate customer through email link -->
<?php
session_start();

include 'config.php';

if(isset($_GET['token'])){

    $tokenn = $_GET['token'];

    $updatequery ="UPDATE customer SET `status` ='active' WHERE `token`='$tokenn'; ";
 
    $run_query = mysqli_query($link , $updatequery);
    if($run_query){
        if(isset($_SESSION['status']) && $_SESSION !=''){
             $_SESSION['status'] = "Account updated successfully";
            header("location: {$hostname}/login.php");
         }else{
            header("location: {$hostname}/login.php");
           }
    }else{
        $_SESSION['status'] = "Account not updated";
            header("location: {$hostname}/register.php");
    }
}
?>