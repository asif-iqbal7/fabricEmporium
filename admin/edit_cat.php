<?php
include 'header.php'; ?>
<div class="admin-content container mt-2 ms-4">
    <h3 class="admin-heading">Update Category</h3>
<div class="row">
<?php
    //include config file
    include 'config.php';
         
    $cat_id = $_GET['id'];

    $sql= "SELECT * FROM `category` WHERE category_id = '$cat_id'";
      
  $result = mysqli_query($conn, $sql) or die("Query Failed."); 
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) { ?>
<!-- Form -->
<form id="updateCategory" class="add-post-form col-md-6" action="save_updates.php" method ="POST">
<div class="form-group">                    
    <input type="hidden" name="category_id" class="form-control text-box" value="<?php echo $row['category_id']?>"/>
          <label class="mt-3 fw-bold">Category Name</label>
          <input type="text" name="category_name" class="form-control text-box" value="<?php echo $row['category_name']?>" required />
          <input type="submit" name="update-cat" class="btn add-new mt-3 text-box" value="Update"/>
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