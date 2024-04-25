<?php
include 'config.php';
session_start();
$brand_id=$_GET['id'];

$qry_brand= "DELETE FROM `brands` WHERE `b_id` = '$brand_id'";

$runs = mysqli_query($conn,$qry_brand);
if($runs){
      $_SESSION['status'] = "Brand has been deleted successfully";
      header("location: {$hostname}/brands.php");
}else{
    $_SESSION['status'] = "Oops!Something went wrong";
    header("location: {$hostname}/brands.php");
}
?>   