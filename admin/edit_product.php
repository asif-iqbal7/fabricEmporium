<?php
// include header file
include 'header.php'; ?>
<div class="admin-content container">
   <h2 class="admin-heading">Edit Product</h2>
<?php
//include config file
include 'config.php'; 
    $ids = $_GET['id'];
    $sql= "SELECT * FROM `product` LEFT JOIN category ON product.pro_cat = category.category_id LEFT JOIN brands ON product.pro_brand = brands.b_id LEFT JOIN fabric_type ON product.pro_fab_type = fabric_type.fab_id WHERE pro_id = '$ids'"; 

    $result = mysqli_query($conn, $sql) or die("Query Failed."); 
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)) {
                                    $product_id = $row['pro_id'];
                                    $product_title = $row['pro_title'];
                                    $Product_Category = $row['pro_cat'];
                                    $Product_brand = $row['pro_brand'];
                                    $Product_fab_type = $row['pro_fab_type'];
                                    $Product_short_Desc = $row['pro_short_desc'];
                                    $Product_Description = $row['pro_desc'];
                                    $Product_price = $row['pro_price'];
                                    $Product_sale_price = $row['pro_sale_price'];
                                    $Product_quantity = $row['pro_qty'];
                                    $Product_image = $row['pro_image'];
                                    $Product_image2 = $row['pro_image2'];
                                    $Product_status = $row['saller_status'];
                                    $Product_sale_status = $row['pro_sale_status'];
                                    $keywords = $row['keywords']; ?>
<!--FORM START  -->
<form id="" class="add-post-form row p-4" action="save_updates.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <div class="col-md-9"> 
    <div class="form-group mt-2 fw-bold">
        <input type="hidden" class="form-control pro_id text-box" name="pro_id" value="<?php echo $product_id;?>"/> 
    </div>
    <div class="form-group mt-2 fw-bold">
        <label for="">Product Title</label>
        <input type="text" class="form-control product_title text-box" name="pro_title" value="<?php echo $product_title;?>" placeholder="Product Title" /> 
    </div>
    <div class="form-group category mt-3 fw-bold">
        <label for="">Product Category</label>
        <select class="form-control product_category  text-box" name="pro_cat">
        <option value="<?php echo   $Product_Category;?>" disabled>Select Category</option>
<?php 
//include config file
include 'config.php';
    $sql1 = "SELECT * FROM category";
       $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessfull.");     
        if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_assoc($result1)){ ?>
                <option value="<?php echo $row1['category_id']?>"><?php echo $row1['category_name']?></option>
        <?php } 
                }?>  
         </select>
    </div>
    <div class="form-group brand mt-3 fw-bold">
        <label for="">Product Brand</label>
        <select class="form-control product_brands text-box" name="pro_brand">
        <option value="<?php echo $Product_brand;?>" disabled>First Select brand</option>
<?php 
//include config file
include 'config.php';

   $sql2 = "SELECT * FROM brands";
        $result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessfull.");
            if(mysqli_num_rows($result2) > 0){
                while($row2 = mysqli_fetch_assoc($result2)){  ?>
                    <option value="<?php echo $row2['b_id']?>"><?php echo $row2['b_name']?></option>
            <?php } 
                    }?>
            </select>
    </div>
    <div class="form-group brand mb-3 fw-bold">
        <label for="">Fabric Type</label>
          <select class="form-control product_brands text-box" name="pro_fab_type">
            <option value="<?php echo $Product_fab_type;?>" disabled>Select Fabric Type</option>
<?php 
//include config file
include 'config.php';

    $sql3 = "SELECT * FROM fabric_type";
       $result3 = mysqli_query($conn, $sql3) or die("Query Unsuccessfull.");

        if(mysqli_num_rows($result3) > 0){
           while($row3 = mysqli_fetch_assoc($result3)){  ?>
               <option value="<?php echo $row3['fab_id']?>"><?php echo $row3['fab_name']?></option>
         <?php } 
                }?>
        </select>
    </div>
    <div class="form-group mt-1 fw-bold">
        <label for="">Product Price</label>
        <input type="text" class="form-control product_price text-box" name="pro_price"  value="<?php echo  $Product_price;?>">
    </div>
    <div class="form-group mt-1 fw-bold">
        <label for="">sale Price</label>
        <input type="text" class="form-control product_price text-box" name="pro_sale_price"  value="<?php echo $Product_sale_price;?>">
    </div>
    <div class="form-group mt-3 fw-bold">
        <label for="">Available Quantity</label>
        <input type="number" class="form-control product_qty text-box" name="pro_qty"  value="<?php echo $Product_quantity;?>"/>
    </div>
    <div class="form-group mt-3 fw-bold">
        <label>Status</label>
        <select class="form-control product_status text-box" name="saller_status">
        <option <?php if($Product_status == '1') echo 'selected'; ?> value="1">Publish</option>
        <option <?php if($Product_status == '0') echo 'selected'; ?> value="0">Draft</option>
        </select>
    </div>
    <div class="form-group mt-3 fw-bold">
        <label>Sale Status</label>
        <select class="form-control product_status text-box" name="pro_sale_status">
        <option <?php if($Product_sale_status == '1') echo 'selected'; ?> value="1">Sale Active</option>
        <option <?php if($Product_sale_status == '0') echo 'selected'; ?> value="0">Sale Disable</option>
      </select>
    </div>
    <div class="form-group mt-3 fw-bold text-box">
    <label>1st Image</label>
        <input type="file" class="product_image"  name="new_image">
        <img id="image" src="../image/<?php echo  $Product_image;?>" width="80px"/>
        <input type="hidden" name="old_image" value="<?php echo $Product_image; ?>">
    </div>
    <div class="form-group mt-3 fw-bold text-box">
        <label for="">2nd Image</label>
        <input type="file" class="product_image"  name="new_image2">
        <img id="image" src="../image/<?php echo $Product_image2?>" width="80px"/>
        <input type="hidden" name="old_image2" value="<?php echo $Product_image2; ?>">
    </div>
    <div class="form-group mt-3 fw-bold">
        <label for="">Keywords</label>
        <textarea class="form-control  text-box" name="keywords" value="" rows="3"  ><?php echo  $keywords;?></textarea>
    </div>
    <div class="form-group mt-3 fw-bold">
        <label for="">Product short Description</label>
        <textarea class="form-control  text-box" name="pro_short_desc" value="" rows="3"  ><?php echo $Product_short_Desc;?></textarea>
    </div>
    <div class="form-group mt-3 fw-bold">
        <label for="">Product Description</label>
        <textarea class="form-control product_description text-box" name="pro_desc"  value="" rows="8"  ><?php echo $Product_Description;?></textarea>
    </div>
</div>
    <div class="form-group mt-3">
        <input type="submit" class="btn add-new text-box" name="update-pro" value="Update">
    </div>
    </div> 
</form>
<!-- end of form -->
<?php
    }
      }?>
    </div>
   </div>
  </div>
 </div>
<?php
  // include header file
    include 'footer.php';?>