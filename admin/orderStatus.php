<?php
include 'config.php';
session_start();
$orderNumber = $_GET['id'];
$delivery = $_GET['delivery'];

$sql = "UPDATE `order` SET `delivery` = 1 WHERE `orderNumber` = '$orderNumber'";

$result = mysqli_query($conn,$sql);
if($result){
        header("location: {$hostname}/orders.php");
}else{
    header("location: {$hostname}/orders.php");
}
?>