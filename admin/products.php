<?php // include header file
include 'header.php';
session_start();?>
<div class="px-0">
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
             <h2 class="admin-heading ms-3">All Products </h2>
             </div>
             <div class="col-lg-2 ps-5">
             <a class="btn btn-sm add-new pull-right" href="add_product.php">Add New</a>
             </div>
             </div>
         <?php
                 // database configuration
                  include "config.php"; 
                  /* Calculate Offset Code */
                  $limit = 15;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                
                  $sql = "SELECT * FROM product 
                  LEFT JOIN category ON product.pro_cat = category.category_id
                  LEFT JOIN brands ON product.pro_brand = brands.b_id 
                  LEFT JOIN fabric_type ON product.pro_fab_type = fabric_type.fab_id  
                  ORDER BY pro_id DESC LIMIT {$offset},{$limit}";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
        <div style="overflow-x:auto;">
        <table id="productsTable scrollbar" class="mt-4 mx-0 table table-striped table-sm table-hover table-bordered">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Fabric Type</th>
                    <th>short Description</th>
                    <th>Price</th>
                    <th>sale_Price</th>
                    <th>Quantity</th>
                    <th>1st Image</th>
                    <th>Saller status</th>
                    <th>sale_status</th>
                    <th >Action</th>
                </thead>
                <tbody>
                <tr>
                 <?php   while($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <td><b><?php echo $row['pro_id'];?></b></td>
                    <td><?php echo $row['pro_title'];?></td>
                    <td><?php echo $row['category_name'];?></td>
                    <td><?php echo $row['b_name'];?></td>
                    <td><?php echo $row['fab_name'];?></td>
                    <td><?php echo $row['pro_short_desc'];?></td>  
                    <td><?php echo $row['pro_price'];?></td>
                    <td><?php echo $row['pro_sale_price'];?></td>
                    <td><?php echo $row['pro_qty'];?></td>
                    <td>
                            <?php  if($row['pro_image'] != ''){ ?>
                               <img src="../image/<?php echo $row['pro_image']; ?>" alt="<?php echo $row['pro_image']; ?>" width="80px"/>
                            <?php }else{ ?>
                                <img src="images/index.png" alt="" width="50px"/>
                            <?php } ?>
                    </td>
                    <td><?php
                            if($row['saller_status'] == '1'){
                                echo '<span class="text-primary">Best saller</span>';
                                }else{
                                    echo '<span class="text-danger">Saller</span>';
                                }
                          ?>
                    </td>
                    <td><?php
                           if($row['pro_sale_status'] == '1'){
                                echo '<span class="text-primary">Sale Active</span>';
                                }else{
                                    echo '<span class="text-danger">sale Disable</span>';
                                }
                            ?>
                        </td>
                    <td>                 
                      <a class="text-dark pt-5"href="edit_product.php?id=<?php echo $row['pro_id'];?>"><i class="fa fa-edit "></i></a>
                       <a class="delete_product text-dark"
                          name="delete-pro" href="delete-pro.php?id=<?php echo $row['pro_id'];?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
         </div>
      </div>
    <?php
          }else {
                  echo "<h3>No Results Found.</h3>";
                }
     // show pagination
       $sql1 = "SELECT * FROM product";
           $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination mb-3">';
                  if($page > 1){
                    echo '<li><a href="products.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){ 
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.' "><a href="products.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="products.php?page='.($page + 1).'">Next</a></li>';
                  }
                  echo '</ul>';
                }
                  ?>            
          </div>
<?php
// include footer file
    include 'footer.php'; ?>              