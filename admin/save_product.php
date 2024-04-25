<?php
//include config file
include 'config.php';
if(isset($_FILES['pro_image'])){
    $errors = array();

    $file_name = $_FILES['pro_image']['name'];
    $file_size = $_FILES['pro_image']['size'];
    $file_tmp  = $_FILES['pro_image']['tmp_name'];
    $file_type = $_FILES['pro_image']['type'];
    $extension = explode('.',$file_name);
    $file_ext  = strtolower(end($extension));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG JPEG or PNG file."; 
    } 
    
      if(empty($errors) == true){
        move_uploaded_file($file_tmp,"../image/".$file_name );
      }else{
        print_r($errors);
        die();
      }
   }
        $product_id = $_POST['pro_id'];
        $product_title = $_POST['pro_title'];
        $Product_Category = $_POST['pro_cat'];
        $Product_brand = $_POST['pro_brand'];
        $Product_Description = $_POST['pro_desc'];
        $Product_image = $_FILES['pro_image'];
        $Product_price = $_POST['pro_price'];
        $Product_quantity = $_POST['pro_qty'];
        $Product_status = $_POST['pro_status'];

$sql = "INSERT INTO product(pro_id , pro_title , pro_cat , pro_brand , pro_desc , pro_image , pro_price , pro_qty , pro_status) VALUES ('{$product_id}', '{$product_title}' , '{$Product_Category}' , '{$Product_brand}' , '{$Product_Description}' ,'{$file_name}', '{$Product_price}' , '{$Product_quantity}' , '{$Product_status}')";

//yahoobaba php news project at 29:00

$result = mysqli_query($conn, $sql); 
if($result){
  echo "<script> alert ('Product inserted successfully.') </script>";
}else{
  echo "<script> alert ('This product ID is already exist.') </script>";
}
mysqli_close($conn);
?> 