<?php
// include header file
include 'header.php'; ?>  
<div class="admin-content-container mt-2 ms-4">
    <h3 class="admin-heading">Update brand</h3>
<div class="row">
<?php     
//include config file
include 'config.php'; 
   $brand_id = $_GET['id'];
   $sql= "SELECT * FROM `brands` WHERE b_id = '$brand_id'";
   $result = mysqli_query($conn, $sql) or die("Query Failed."); 
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) { ?>                   
<!-- Form -->
<form id="updateBrand" class="add-post-form col-md-6" action="save_updates.php" method ="POST">
    <input type="hidden" name="b_id" value="<?php echo $row['b_id']?>" />
        <div class="form-group mt-3 fw-bold">
            <label>Brand Title</label>
                <input type="text" name="b_name" class="form-control brand_name text-box" value="<?php echo $row['b_name']?>" required />
        </div>
        <div class="form-group mt-3 fw-bold">
                <input type="submit" name="update-brand" class="btn add-new mt-3 text-box" value="Update"/>
        </div>
</form>
<!-- /Form -->
<?php
     }
        }?>
       </div>
      </div>
     </div>
    </div>
   </div>
</div>
<?php
// include header file
include 'footer.php'; ?>