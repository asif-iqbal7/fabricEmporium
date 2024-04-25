<?php
include 'config.php';
session_start();

$ids=$_GET['id'];

$qry_cat = "DELETE FROM `category` WHERE `category_id` = '$ids'";

$run_qry = mysqli_query($conn,$qry_cat);
if($run_qry){
      $_SESSION['status'] = "Category has been deleted successfully";
      header("location: {$hostname}/category.php");
}else{
    $_SESSION['status'] = "Oops!Something went wrong";
    header("location: {$hostname}/category.php");
}
?>