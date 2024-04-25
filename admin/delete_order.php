<?php
include 'config.php';
session_start();
$user_id=$_GET['id'];

$qry_user= "DELETE FROM `order` WHERE `orderNumber` = '$user_id'";

$runs = mysqli_query($conn,$qry_user);
if($runs){
      header("location: {$hostname}/orders.php");

}else{
    header("location: {$hostname}orders.php");
}
?> 