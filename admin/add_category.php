<?php
//include config file
include 'config.php';
if(isset($_POST['submit'])){
    if(!empty($_POST['category_name'])){  
        $cat_name = $_POST['category_name'];
// select data from database to check duplication
        $query="SELECT * FROM `category` where category_name = '$cat_name'";
        $result_select = mysqli_query($conn, $query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script> alert ('This category is already present.') </script> ";
        }else{
            //insert data in database
        $sql = "INSERT INTO `category`(category_name) VALUES('{$cat_name}')";
        $result = mysqli_query($conn, $sql);
        if($result){
               echo"<script> alert ('Category has been inserted successfully.') </script> ";
        }
      }
    }
  }
mysqli_close($conn);
// include header file
include 'header.php'; ?>
<div class="admin-content-container ps-5">
    <h2 class="admin-heading mt-4">Add New Category</h2>    
    <!-- Form -->
    <div class="row">
         <form id="createCategory" action="" class="add-post-form col-md-6"  method="POST" autocomplete="off">
            <div class="form-group">
               <label class=" mt-4 fw-bold">Category Name</label>
               <input type="text" name="category_name" class="form-control category text-box"  placeholder="Category Name"  required/>
               <input type="submit" name="submit" class="btn add-new  mt-4 text-box" value="Submit"/>
            </div>
        </form>
    </div>
    <!-- /Form -->
</div>
         </div>
        </div>
      </div>
   </div>
<?php
// include header file
include 'footer.php'; ?>