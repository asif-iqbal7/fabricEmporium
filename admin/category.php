<?php
include 'header.php';
session_start();?> 
<div class="admin-content-container">
<?php
    if(isset($_SESSION['status']) && $_SESSION !=''){?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hey!</strong><?php echo $_SESSION['status'];?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    unset($_SESSION['status']);
  }  ?>
<div class="row">
      <div class="col-lg-10">
        <h2 class="admin-heading  ms-3">All Categories </h2>
      </div>
      <div class="col-lg-2 ps-5">
        <a class="btn btn-sm add-new pull-right" href="add_category.php">Add New</a> 
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
         $sql = "SELECT * FROM category 
           ORDER BY category_id ASC LIMIT {$offset},{$limit}";
              $result = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result) > 0){ ?>
          <!-- TABLE START  -->
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
        <td><?php echo $row['category_id'];?></td>
        <td><?php echo $row['category_name'];?></td>
        <td>
          <a href="edit_cat.php?id=<?php echo $row['category_id'];?>" class="text-dark"><i class="fa fa-edit"></i></a>
          <a class="delete_category text-dark" href="delete-cat.php?id=<?php echo $row['category_id'];?>" ><i class="fa fa-trash"></i></a>
        </td>
    <?php } ?>
    </tr>
        </tbody>
</table>
<!-- TABLE END -->
<?php
    }else {
          echo "<h3>No Results Found.</h3>";
      }
// show pagination
    $sql1 = "SELECT * FROM category";
      $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

      if(mysqli_num_rows($result1) > 0){

          $total_records = mysqli_num_rows($result1);

          $total_page = ceil($total_records / $limit);

            echo '<ul class="pagination admin-pagination">';
          if($page > 1){
            echo '<li><a href="category.php?page='.($page - 1).'">Prev</a></li>';
           }
          for($i = 1; $i <= $total_page; $i++){
            if($i == $page){
                 $active = "active";
             }else{
                 $active = "";
              }
                echo '<li class="'.$active.'"><a href="category.php?page='.$i.'">'.$i.'</a></li>';
              }
            if($total_page > $page){
              echo '<li><a href="category.php?page='.($page + 1).'">Next</a></li>';
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