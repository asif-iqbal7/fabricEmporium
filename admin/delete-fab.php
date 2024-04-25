<?php
include 'config.php';
session_start();
$fab_id=$_GET['id'];

$qry_fab = "DELETE FROM `fabric_type` WHERE `fab_id` = '$fab_id'";

$run_query = mysqli_query($conn,$qry_fab);
if($run_query){
      $_SESSION['status'] = "Fabric Type has been deleted successfully";
      header("location: {$hostname}/fabric_type.php");
}else{
    $_SESSION['status'] = "Oops!Something went wrong";
    header("location: {$hostname}/fabric_type.php");
}?>