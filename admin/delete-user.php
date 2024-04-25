<?php
include 'config.php';
session_start();
$user_id=$_GET['id'];

$qry_user= "DELETE FROM `customer` WHERE `cid` = '$user_id'";

$runs = mysqli_query($conn,$qry_user);
if($runs){
      $_SESSION['msgs'] = "User record has been deleted successfully";
      header("location: {$hostname}/users.php");
}else{
    $_SESSION['msgs'] = "Oops!Something went wrong";
    header("location: {$hostname}/users.php");
}
?> 