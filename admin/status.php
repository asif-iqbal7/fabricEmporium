<?php
include 'config.php';
session_start();
$email = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE `customer` SET `cust_status` = '$status' WHERE `email` = '$email'";

$result = mysqli_query($conn,$sql);
if($result){
           if($status ==1){

                    $subject = "noreply";
                     $body = "Cogragulations! Your account is activated successfully.";
                     $sender = "From: sam03037161818@gmail.com";

                     if (mail($email, $subject, $body, $sender)) {
                         $_SESSION['permit'] = "Status updated and email sent";
                         header("location: {$hostname}/users.php");
                                      }else{
                                        $_SESSION['permit'] = "Oop! something went wrong.Check your internet connection and try again later";
                                        header("location: {$hostname}/users.php");
                                         }
                }else{
                    $subject = "noreply";
                   $body = "Your account is blocked by admin.";
                   $sender = "From: sam03037161818@gmail.com";

                   if (mail($email, $subject, $body, $sender)) {
                    $_SESSION['permit'] = "Status updated and email sent";
                    header("location: {$hostname}/users.php");
                                    }else{
                                        $_SESSION['permit'] = "Oop! something went wrong.Check your internet connection and try again later";
                                        header("location: {$hostname}/users.php"); 
                                       }
                }
}
?>