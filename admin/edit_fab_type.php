<?php
// include header file
include 'header.php'; ?>

<div class="admin-content-container mt-2 ms-3">
        <h3 class="admin-heading">Update Fabric Type</h3>
<div class="row">
<?php
//include config file
include 'config.php';
         
    $fab_id = $_GET['id'];

    $sql= "SELECT * FROM `fabric_type` WHERE fab_id = '$fab_id'";
      
    $result = mysqli_query($conn, $sql) or die("Query Failed."); 
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {  ?>
<!-- Form -->
<form id="updateSubCategory" class="add-post-form col-md-6" action="save_updates.php" method ="POST">
        <input type="hidden" name="fab_id" value="<?php echo $row['fab_id']?>" >
          <div class="form-group mt-3 fw-bold">
             <label>Sub Category Title</label>
             <input type="text" name="fab_name" class="form-control sub_category text-box" value="<?php echo $row['fab_name']?>" required>
          </div>
          <div class="form-group mt-3 fw-bold">
        <input type="submit" name="update-fab" class="btn add-new mt-3 text-box" value="Update" />
    </div>
</form> 
<!-- /Form -->
<?php
      }
        } ?>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
<?php
  // include header file
    include 'footer.php'; ?>