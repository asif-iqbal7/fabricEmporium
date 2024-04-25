<?php
// include header file
    include 'header.php';
    session_start(); ?>
    
   <div class="admin-content-container">
   <?php 
           if(isset($_SESSION['permit']) && $_SESSION !=''){?>

           <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Hey!</strong><?php echo $_SESSION['permit'];?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         <?php
          unset($_SESSION['permit']); }
           if(isset($_SESSION['msgs']) && $_SESSION !=''){?>

           <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Hey!</strong><?php echo $_SESSION['msgs'];?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         <?php
          unset($_SESSION['msgs']); }
           if(isset($_SESSION['set']) && $_SESSION !=''){?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Hey!</strong><?php echo $_SESSION['set'];?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
             <?php
             unset($_SESSION['set']);
           }
           ?>
        <h2 class="admin-heading ps-3 pb-2">All Users</h2>
       
        <?php
                 // database configuration
                  include "config.php"; 
                  /* Calculate Offset Code */
                  $limit = 5;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                
                  $sql = "SELECT * FROM `customer`   
                  ORDER BY cid DESC LIMIT {$offset},{$limit}";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>

        <table class="table table-striped table-hover table-bordered">
                <thead>
                <th class="text-center">#</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th> 
                    <th class="text-center">User Name</th>
                    <th class="text-center" >Phone No.</th>
                    <th class="text-center" >Address</th> 
                    <th class="text-center" >City</th> 
                    <th class="text-center" >Action</th> 
                    <th class="text-center" >Delete</th> 
                </thead>
                <tbody>
                    <tr>
                    <?php   
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <td><b><?php echo $row['cid'];?></b></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['phone_no'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['city'];?></td>
                        <td> 
                        <?php
                            if($row['cust_status'] == '1'){ 
                              echo '<p><a class="btn btn-sm" href="status.php?id=' .$row['email'] .'&status=0">Deny</a></p>';
                             } else{
                              echo '<p><a class="btn btn-sm" href="status.php?id=' .$row['email'] .'&status=1.">Allow</a></p>'; 
                             }?>                       
                        </td>
                        <td>
                        <a class=" btn-xs delete_user" href="delete-user.php?id=<?php echo $row['cid'];?>"><i class="fa fa-trash text-dark"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>   
         </table>
         <?php
        }else {
          echo "<h3>No Results Found.</h3>";
        }
        // show pagination
        $sql1 = "SELECT * FROM customer";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

        if(mysqli_num_rows($result1) > 0){

          $total_records = mysqli_num_rows($result1);

          $total_page = ceil($total_records / $limit);

          echo '<ul class="pagination admin-pagination">';
          if($page > 1){
            echo '<li><a href="users.php?page='.($page - 1).'">Prev</a></li>';
          }
          for($i = 1; $i <= $total_page; $i++){
            if($i == $page){
              $active = "active";
            }else{
              $active = "";
            }
            echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
          }
          if($total_page > $page){
            echo '<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
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