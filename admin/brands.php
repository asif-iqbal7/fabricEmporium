<?php
include 'header.php'; 
session_start();?>
 <div class="admin-content-container">
 <div class="row"> 
    <?php
      if(isset($_SESSION['status']) && $_SESSION !=''){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Hey!</strong><?php echo $_SESSION['status'];?>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
      <?php
             unset($_SESSION['status']);
           } ?>
        <div class="col-lg-10">
          <h2 class="admin-heading ms-3">All Brands </h2>
        </div>
        <div class="col-lg-2 ps-5">
            <a class="btn btn-sm add-new pull-right" href="add_brand.php">Add New</a> 
        </div>
        </div>
      <?php
            // database configuration
            include "config.php"; 
            /* Calculate Offset Code */
            $limit = 10;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
              }else{
                  $page = 1;
               }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM `brands` 
                ORDER BY b_id Asc LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){ ?>
        <!-- TABLE START -->
      <table class="table table-striped table-hover table-bordered mt-4">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr>
                 <?php   while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['b_id'];?></td>
                  <td><?php echo $row['b_name'];?></td>
                <td>
              <a href="edit_brand.php?id=<?php echo $row['b_id'];?>" class="text-dark"><i class="fa fa-edit"></i></a>
              <a class="delete_category text-dark" href="delete-brand.php?id=<?php echo $row['b_id'];?>" ><i class="fa fa-trash"></i></a>
          </td>
        <?php } ?>
      </tr>
    </tbody>
</table>
           <!-- END OF TABLE -->
<?php 
      }else {
          echo "<h3>No Results Found.</h3>";
        }
      // show pagination
          $sql1 = "SELECT * FROM brands";
          $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
             if(mysqli_num_rows($result1) > 0){
                $total_records = mysqli_num_rows($result1);
                $total_page = ceil($total_records / $limit);
                  echo '<ul class="pagination admin-pagination">';
                    if($page > 1){
                          echo '<li><a href="brands.php?page='.($page - 1).'">Prev</a></li>';
                       }
                    for($i = 1; $i <= $total_page; $i++){
                         if($i == $page){
                               $active = "active";
                            }else{
                               $active = "";
                        }
                          echo '<li class="'.$active.'"><a href="brands.php?page='.$i.'">'.$i.'</a></li>';
                     }
                       if($total_page > $page){
                            echo '<li><a href="brands.php?page='.($page + 1).'">Next</a></li>';
                          }
                             echo '</ul>';
                     } ?>
              </div>
           </div>
       </div>
      </div>
   </div>
<?php
  // include header file
    include 'footer.php'; ?>