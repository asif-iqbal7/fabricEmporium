<?php
// include header file
include 'header.php'; ?> 
<div class="admin-content-container">
    <h2 class="admin-heading text-center">Add New Product</h2>
    <!-- form -->
        <form class="add-post-form row" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class=" col-md-5 ms-5 ps-4">
            <div class="form-group mt-2 fw-bold">
                <label for="">Product ID</label>
                <input type="text" class="form-control product_title text-box" name="pro_id" placeholder="Product ID" autocomplete="off" requried></input>
            </div>
            <div class="form-group mt-2 fw-bold">
                 <label for="">Product Title</label>
                 <input type="text" class="form-control product_title text-box" name="pro_title" placeholder="Product Title" requried></input>
            </div>
            <div class="form-group category mt-3 fw-bold">
                <label for="">Product Category</label>
                <select class="form-control product_category  text-box" name="pro_cat">
                <option selected disabled required>Select Category</option>
           <?php 
            //include config file
            include 'config.php';
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull.");
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){ ?>
                          <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                          <?php } 
                          }?>  
                    </select> 
            </div>
                <div class="form-group brand mt-3 fw-bold">
                    <label for="">Product Brand</label>
                     <select class="form-control product_brands text-box" name="pro_brand">
                        <option selected disabled>Select product brand</option>
                        <?php 
                        //include config file
                        include 'config.php';
                        $sql = "SELECT * FROM brands";
                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull.");
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['b_id']?>"><?php echo $row['b_name']?></option>
                        <?php } 
                        }?>
                    </select>
            </div>
              <div class="form-group brand mt-3 fw-bold">
                <label for="">Fabric Type</label>
                   <select class="form-control product_brands text-box" name="pro_fab_type">
                     <option selected disabled>Select Fabric Type</option>
                    <?php 
                        //include config file
                        include 'config.php';
                        $sql = "SELECT * FROM fabric_type";
                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull.");
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['fab_id']?>"><?php echo $row['fab_name']?></option>
                     <?php } 
                    }?>
                    </select>
        </div>
        <div class="form-group mt-3 fw-bold">
            <label for="">Product Price</label>
            <input type="text" class="form-control product_price text-box" name="pro_price" autocomplete="off" value="" required />
        </div>
        <div class="form-group mt-3 fw-bold">
            <label for="">Sale Price</label>
            <input type="text" class="form-control product_price text-box" name="pro_sale_price" autocomplete="off" value="" required />
        </div>
        <div class="form-group mt-3 fw-bold">
            <label for="">Available Quantity</label>
            <input type="number" class="form-control product_qty text-box" name="pro_qty" requried autocomplete="off" value=""/>
        </div>
        <div class="form-group mt-3 fw-bold">
            <label>saller_Status</label>
            <select class="form-control product_status text-box" name="saller_status">
                <option selected value="1">Best Saller</option>
                <option value="0">saller</option>
                </select>
           </div>
        </div>
         <div class="col-md-5 ms-5 ps-4">
            <div class="form-group mt-4 fw-bold">
              <label for="">1st Image</label>
              <input type="file" class="product_image"  name="pro_image" required >
              <img id="image" src="" width="150px"/>
            </div>
        <div class="form-group mt-4 fw-bold">
              <label for="">2nd Image</label>
              <input type="file" class="product sale_image"  name="pro_image2" required>
              <img id="image" src="" width="150px"/>
        </div>
        <div class="form-group mt-4 fw-bold">
             <label>Sale_status</label>
             <select class="form-control product_status text-box" name="pro_sale_status">
             <option selected value="1">sale active</option>
            <option value="0">sale disable</option>
            </select>
        </div>
        <div class="form-group mt-3 fw-bold">
            <label for="" >Keywords</label>
            <textarea class="form-control text-box" placeholder ="Enter Keywords for search purpose" name="keywords" rows="3" requried ></textarea>
        </div>
        <div class="form-group mt-4 fw-bold">
            <label for="">Product short Description</label>
            <textarea class="form-control  text-box" placeholder ="Enter short description of the product" name="pro_short_desc" rows="3" requried ></textarea>
        </div>
        <div class="form-group mt-4 fw-bold">
            <label for="">Product Description</label>
            <textarea class="form-control text-box" placeholder ="Enter detailed description of the product" name="pro_desc" rows="7" requried ></textarea>
          </div>
        </div>    
        <div class="col-md-10 ms-5 ps-4 text-center">
        <div class="mt-4 ms-5 ps-5">
            <input type="submit" class="btn px-5" name="submit" value="  A D D   N E W   P R O D U C T  ">
        </div>
      </div>
    </form>
   </div>
  </div>
 </div>
</div>
<?php
// include header file
include 'footer.php';
//include config file
include 'config.php';
// 1st image 
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
// 2nd image
if(isset($_FILES['pro_image2'])){
    $errors2 = array();

    $file_name2 = $_FILES['pro_image2']['name'];
    $file_size2 = $_FILES['pro_image2']['size'];
    $file_tmp2  = $_FILES['pro_image2']['tmp_name'];
    $file_type2 = $_FILES['pro_image2']['type'];
    $extension2 = explode('.',$file_name2);
    $file_ext2  = strtolower(end($extension2));

    $extensions2 = array("jpeg","jpg","png");

    if(in_array($file_ext2,$extensions2) === false)
    {
      $errors2[] = "This extension file not allowed, Please choose a JPG JPEG or PNG file.";
    } 
    
      if(empty($errors2) == true){
        move_uploaded_file($file_tmp2,"../image/".$file_name2);
      }else{
        print_r($errors2);
        die();
      }
}
if(isset($_POST['submit'])){

        $product_id = $_POST['pro_id'];
        $product_title = $_POST['pro_title'];
        $Product_Category = $_POST['pro_cat'];
        $Product_brand = $_POST['pro_brand'];
        $Product_fab_type = $_POST['pro_fab_type'];
        $Product_short_Desc = $_POST['pro_short_desc'];
        $Product_Description = $_POST['pro_desc'];
        $Product_price = $_POST['pro_price'];
        $Product_sale_price = $_POST['pro_sale_price'];
        $Product_quantity = $_POST['pro_qty'];
        $Product_image = $_FILES['pro_image'];
        $Product_image2 = $_FILES['pro_image2'];
        $saller_status = $_POST['saller_status'];
        $Product_sale_status = $_POST['pro_sale_status'];
        $keywords = $_POST['keywords'];

$sql = "INSERT INTO `product`(`pro_id` , `pro_title` , `pro_cat` , `pro_brand` , `pro_fab_type`,  `pro_short_desc` , `pro_desc` ,`pro_price` , `pro_sale_price` ,`pro_qty` ,  `pro_image` ,  `pro_image2` ,`saller_status` ,`pro_sale_status`,`keywords`) VALUES ('{$product_id}', '{$product_title}' , '{$Product_Category}' , '{$Product_brand}' , '{$Product_fab_type}' , '{$Product_short_Desc}' , '{$Product_Description}' , '{$Product_price}' , '{$Product_sale_price}' ,'{$Product_quantity}' ,'{$file_name}', '{$file_name2}', '{$saller_status}', '{$Product_sale_status}' , '{$keywords}')";

//yahoobaba php news project at 29:00

$result = mysqli_query($conn, $sql); 
if($result){
  echo "<script> alert ('Product inserted successfully.') </script>";
}
mysqli_close($conn);
}
?>