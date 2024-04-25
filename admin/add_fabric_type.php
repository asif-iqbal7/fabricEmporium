<?php
//include config file
include 'config.php';
if(isset($_POST['submit'])){
    if(!empty($_POST['fab_name'])){  
        $fabrics = $_POST['fab_name'];
        // select data from database to check duplication
         $query = "SELECT * FROM `fabric_type` WHERE `fab_name` = '$fabrics'";
         $result_select = mysqli_query($conn,$query); 
         $number =mysqli_num_rows($result_select);
         if($number >0){
             echo "<script> alert ('This Fabric type already exist')</script>";
            }else{
                  $sql = "INSERT INTO `fabric_type`(fab_name) VALUES('{$fabrics}')";
                   $result = mysqli_query($conn, $sql);
                  if($result){
                       echo"<script> alert ('Fabric type has been inserted successfully.') </script> ";
                  }
               }
             }
          }
mysqli_close($conn);
// include header file
include 'header.php'; ?>
<div class="admin-content-container ps-5">
    <h2 class="admin-heading mt-4">Add New Fabric Type</h2>
    <!-- Form -->
    <div class="row">
         <form id="" action="" class="add-post-form col-md-6" method="POST" autocomplete="off">
             <div class="form-group">
                 <label class=" mt-4 fw-bold">Fabric Type</label>
                 <input type="text" name="fab_name" class="form-control text-box"  placeholder="Fabric Type"  required/>           
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