<?php
include 'config.php';
session_start();
$id=$_GET['id'];

$qry1 = "SELECT * FROM `product` WHERE `pro_id` = '$id' ";
$result=mysqli_query($conn,$qry1) or die("Query Failed:select");
$row =mysqli_fetch_assoc($result);

print_r($row);
unlink("../image/" .$row['pro_image'] );
unlink("../image/" .$row['pro_image2'] );

$qry = "DELETE FROM `product` WHERE `pro_id` = '$id'";

$run = mysqli_query($conn,$qry);
if($run){
      $_SESSION['status'] = "Product has been deleted successfully";
      header("location: {$hostname}/products.php");
}else{
    $_SESSION['status'] = "Oops!Something went wrong";
    header("location: {$hostname}/products.php");
}?>