<?php
//include config file
include 'config.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['b_name'])){
      
        $brand_name = $_POST['b_name'];

       // select data from database
       $query="SELECT * FROM `brands` where b_name = '$brand_name'";
       $result_select = mysqli_query($conn, $query);
       $number = mysqli_num_rows($result_select);
       if($number){
        echo "<script> alert ('This brand is already present.') </script> ";
    }else{    
        $sql = "INSERT INTO brands(b_name) VALUES('{$brand_name}')";
        $result = mysqli_query($conn, $sql);
        if($result){
               echo"<script> alert ('brand has been inserted successfully.') </script> ";
           }
         } 
      }
   }
mysqli_close($conn);
// include header file
include 'header.php'; ?>
<div class="admin-content-container ps-5">
    <h2 class="admin-heading mt-4">Add New Brand</h2>
    <!-- Form -->
    <div class="row">
        <form id="createCategory" action="" class="add-post-form col-md-6"    
            method="POST" autocomplete="off">
              <div class="form-group">
                  <label class=" mt-4 fw-bold">Brand Name</label> 
                     <input type="text" name="b_name" class="form-control category text-box" placeholder="Brand Name"  required/>
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