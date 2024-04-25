<?php
include 'config.php';
session_start();
if(isset($_POST['update-pro'])){

$up_pro_id = $_POST['pro_id'];
$up_pro_title = $_POST['pro_title'];
$up_Pro_Cat = $_POST['pro_cat'];
$up_Pro_brand = $_POST['pro_brand'];
$up_Pro_fab_type = $_POST['pro_fab_type'];
$up_Pro_short_Desc = $_POST['pro_short_desc'];
$up_Pro_Desc = $_POST['pro_desc'];
$up_Pro_price = $_POST['pro_price'];
$up_Pro_sale_price = $_POST['pro_sale_price']; 
$up_Pro_qty = $_POST['pro_qty'];
$pro_new_image = $_FILES['new_image']['name'];
$pro_new_image2 = $_FILES['new_image2']['name'];
$pro_old_image = $_POST['old_image'];
$pro_old_image2 = $_POST['old_image2'];
$up_saller_status = $_POST['saller_status'];
$up_Pro_sale_status = $_POST['pro_sale_status'];
$keywords = $_POST['keywords'];

if(isset($_FILES['new_image'])){
    if( $pro_new_image != ''){
     $update_file_name = $_FILES['new_image']['name'];
    
    }else{
    
    $update_file_name =  $pro_old_image;
    }
    if($FILES['new_image']['name']){
         if(file_exists("../image/" .$_FILES['new_image']['name'])){
           $file_name = $_FILES['new_image']['name'];
            $_SESSION['status'] = "Image already exist" . $file_name;
            header("location: {$hostname}/products.php");
          }
           }else{
    //updating
       $sql_update = "UPDATE `product` SET `pro_title`=' $up_pro_title',`pro_cat`='$up_Pro_Cat',`pro_brand`='$up_Pro_brand',`pro_short_desc`='$up_Pro_short_Desc',`pro_desc`='$up_Pro_Desc',`pro_image`='$update_file_name',`pro_fab_type`='$up_Pro_fab_type',`pro_price`='$up_Pro_price',`pro_sale_price`='$up_Pro_sale_price', `keywords`='$keywords',`pro_qty`='$up_Pro_qty',`saller_status`='$up_saller_status',`pro_sale_status`='$up_Pro_sale_status' WHERE `product`.`pro_id` = '$up_pro_id'";
    
    $result_update = mysqli_query($conn, $sql_update); 
    if($result_update){
        if($_FILES['new_image']['name'] != ''){
          unlink("../image/" .$old_image);
            move_uploaded_file($_FILES["new_image"]["tmp_name"],"../image/" .$_FILES["new_image"]["name"]);
           
       }
    $_SESSION['status'] = "Record updated";
     header("location: {$hostname}/products.php");
    
    }else{
    $_SESSION['status'] = "Record not updated";
     header("location: {$hostname}/edit_product.php");
    }
    }
    }
    
    if(isset($_FILES['new_image2'])){
      if( $pro_new_image2 != ''){
       $update_file_name2 = $_FILES['new_image2']['name'];
      
      }else{
      
      $update_file_name2 =  $pro_old_image2;
      }
      if($FILES['new_image2']['name']){
           if(file_exists("../image/" .$_FILES['new_image2']['name'])){
             $file_name = $_FILES['new_image2']['name'];
              $_SESSION['status'] = "Image already exist" . $file_name;
              header("location: {$hostname}/products.php");
          }
      }else{
      //updating
         $sql_update2 = "UPDATE `product` SET `pro_title`=' $up_pro_title',`pro_cat`='$up_Pro_Cat',`pro_brand`='$up_Pro_brand',`pro_short_desc`='$up_Pro_short_Desc',`pro_desc`='$up_Pro_Desc',`pro_image2`='$update_file_name2',`pro_fab_type`='$up_Pro_fab_type',`pro_price`='$up_Pro_price',`pro_sale_price`='$up_Pro_sale_price',`keywords`='$keywords',`pro_qty`='$up_Pro_qty',`saller_status`='$up_saller_status',`pro_sale_status`='$up_Pro_sale_status' WHERE `product`.`pro_id` = '$up_pro_id'";
      
      $result_update2 = mysqli_query($conn, $sql_update2); 
      if($result_update2){
      if($_FILES['new_image2']['name'] != ''){
              unlink("../image/" .$old_image2);
               move_uploaded_file($_FILES["new_image2"]["tmp_name"],"../image/" .$_FILES["new_image2"]["name"]);
               
          }
      $_SESSION['status'] = "Record updated";
       header("location: {$hostname}/products.php");
      
      }else{
      $_SESSION['status'] = "Record not updated.Try again later";
       header("location: {$hostname}/edit_product.php");
      }
      }
      }
    }

// =======================
// Update category
// =======================
if(isset($_POST['update-cat'])){
  $up_cat_id = $_POST['category_id'];
  $up_cat_name = $_POST['category_name'];

$query ="UPDATE `category` SET `category_name`=' $up_cat_name' WHERE `category`.`category_id`= '$up_cat_id'";

$result = mysqli_query($conn, $query); 
if($result){
  $_SESSION['status'] = "Category updated";
   header("location: {$hostname}/category.php");
}else{
  $_SESSION['status'] = "Category not updated";
  header("location: {$hostname}/category.php");
}
}

// ==================
// Update brand
// ==================

if(isset($_POST['update-brand'])){
  $up_brand_id = $_POST['b_id'];
  $up_brand_name = $_POST['b_name'];

$query ="UPDATE `brands` SET `b_name`='$up_brand_name' WHERE `brands`.`b_id`= '$up_brand_id'";

$result = mysqli_query($conn, $query); 
if($result){
  $_SESSION['status'] = "Brand updated";
  header("location: {$hostname}/brands.php");
}else{
  $_SESSION['status'] = "Brand not updated";
  header("location: {$hostname}/brands.php");
}
}

// =====================
//  Update Fabric type
// =====================

if(isset($_POST['update-fab'])){
  $up_fab_id = $_POST['fab_id'];
  $up_fab_name = $_POST['fab_name'];

$query ="UPDATE `fabric_type` SET `fab_name`='$up_fab_name' WHERE `fabric_type`.`fab_id`= '$up_fab_id'";

$result = mysqli_query($conn, $query); 
if($result){
  $_SESSION['status'] = "Fabric Type updated";
  header("location: {$hostname}/fabric_type.php");
}else{
  $_SESSION['status'] = "Fabric Type not updated";
  header("location: {$hostname}/fabric_type.php");
}
}
?>