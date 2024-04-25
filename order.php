<?php
// Include Config File
require_once "config.php";

// Order Page
   $totalQty = $_GET['totalQty'];
   $qty = $_GET['qty'];
   $totalAmount = $_GET['totalAmount'];
   $productCode = $_GET['productCode'];
   $fName = $_GET['fName'];
   $lName = $_GET['lName'];
   $email = $_GET['email'];
   $address = $_GET['address'];
   $city = $_GET['city'];
   $phone = $_GET['phone'];
   $orderDate = date("Y/m/d");
   $paymentMethod = $_GET["paymentMethod"];
   $totalBill =  $totalAmount+250;

   if((isset($_GET['paymentMethod'])) && ($_GET['paymentMethod'] == "creditCard") ) {
     $paymentStatus = 1;
   }else{
     $paymentStatus = 0;
   }
  
   if($totalQty>0){
    $query = "INSERT INTO `order`(`productCode`, `qty`, `totalQty`, `totalAmount`, `firstName`, `lastName`, `address`, `city`, `phoneNumber`, `orderDate`, `paymentStatus`) VALUES ('$productCode','$qty','$totalQty','$totalAmount','$fName','$lName','$address','$city','$phone','$orderDate','$paymentStatus')";
        $run = mysqli_query($link,$query) or die(mysqli_error());     
     }
   else{
    echo "Cart is empty";
   } 
  
   if(isset($_GET['order'])){
      $subject = "Hey $fName, your Order is placed!";
               $body = 
"<html>
      <div>
           <div style='width:100%;border: 2px solid #F0EBE3; 
                     background:rgb(248, 249, 250);display: block;
                     margin-left: auto;margin-right: auto;'>
               <div style='width:80%;border: 2px solid            
                     #F0EBE3; background: white ;display: block;
                     margin-left: auto;margin-right: auto;'>
                   <h1 style='color:#2d2d53;text-align:center; font-weight:bold;'>Fabric Emporium-Online</h1>
                   <h2 style='color:#2d2d53;text-align:center;margin-top: 30px;'>Your order is placed!</h2>
                   <p style='margin-right: 8px; margin-left: 12px;'>
                   Hi $fName,<br><br>
                       Thank you for ordering from <b>Fabric Emporium-Online!</b><br><br>
                   We're excited for you to receive your order #137005726788669 and  We hope you had a great shopping experience! You can check your order status here.<br><br>
                   <b>Please note</b>, we are unable to change your delivery address once your order is placed.
                     </p>   
               </div>
            <div style='width:80%;border: 2px solid  #F0EBE3;                           background: white;display: block;
                  margin-left: auto;margin-right: auto;'>
               <p style = 'margin-right:8px; margin-left: 12px;'>
                   <b style='color: rgb(15, 20, 109);'>	DELIVERY DETAILS</b><br><br>
                   <table>
                       <tr>
                           <td><b>Name:</b></td>
                           <td>$fName</td>
                       </tr>
                       <tr>
                           <td><b>Address:</b></td>
                           <td>$address</td>
                       </tr>
                       <tr>
                           <td><b>Phone:</b></td>
                           <td>$phone</td>
                       </tr>
                       <tr>
                           <td><b>Email:</b></td>
                           <td>$email</td>
                       </tr>
                   </table>
               </p>
               </div>
               
                <div  style='width:80%;border: 2px solid #F0EBE3 ;background: white ;display: block;
               margin-left: auto;
               margin-right: auto;'>
               <p style = 'margin-right:8px; margin-left: 12px;'>
               <table>
                   <tr>
                       <td>Subtotal:</td>
                       <td>Rs.</td>
                       <td>$totalAmount</td>
                   </tr>
                   <tr>
                       <td>Shipping fee:</td>
                       <td>Rs.</td>
                       <td>250</td>
                   </tr>  <tr>
                       <td>Total Bill(GST Incl):</td>
                       <td>Rs.</td>
                       <td>$totalBill</td>
                   </tr>
                   <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                   </tr>
               </table>
           </p>
               </div>
               <div  style='width:80%;border: 2px solid #F0EBE3 ;background: white ;display: block;
               margin-left: auto;
               margin-right: auto;'>
            
                  <h3 style = 'text-align:center;'> <b>HELP CENTER | CONTACT US</b></h3>
                  <p style = 'text-align:center;'>
                      18th Floor Sky Tower (A), Dolmen City,<br>
                       HC-3, Block-4, Scheme-5, Clifton, Karachi, Pakistan.
                </p>
                   <p style='font-size: 10px; text-align:center;'>This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail.</p>
                </div>   
           
        </div>
    </div>
</html>";
               
                 
               $sender = "From: asif110f@gmail.com";
               $sender = "MIME-Version: 1.0\r\n";
               $sender = "Content-Type: text/html; charset=ISO-8859-1\r\n";

               if (mail( $email, $subject, $body, $sender )) {
               
                header("location: {$hostname}/thanks.php");
                   } else {
                        echo "Email sending failed...";
                      }
                } 
// Ender of Order Page             
?>