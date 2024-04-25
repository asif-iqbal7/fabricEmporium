<?php
// include header file
include 'header.php'; ?>
 
<div class="admin-content-container ">
<h2 class="admin-heading ms-3">All Orders</h2>
<?php
// database configuration
include "config.php"; 
/* Calculate Offset Code */
    $limit = 20;
      if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
         }
        $offset = ($page - 1) * $limit; 
          $sql = "SELECT * FROM `order` ORDER BY orderNumber DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
          if(mysqli_num_rows($result) > 0){  ?>
<!-- TABLE START -->
<table class="table table-striped table-hover table-bordered mt-3 fs-0">
    <thead>
      <th>Order No.</th>
      <th width="250px">Product Details</th>
      <th>Total QTY.</th>
      <th>Total Amount</th>
      <th>Customer Details</th>
      <th>Order Date</th>
      <th>Payment Status</th>
      <th>Delivery Status</th>
      <th>Action</th>
    </thead>
    <tbody>
      <tr>
        <?php   while($row = mysqli_fetch_assoc($result)) {
            $proCodeString = $row['productCode'];
            $proQtyString = $row['qty'];
            $proCodeArray  = explode(",",$proCodeString);
            $proQtyArray  = explode(",",$proQtyString);  ?>
            <td><b>ORD0<?php echo $row['orderNumber'];?></b></td>
            <td>
              <!-- Nesting of table -->
              <table>
                <thead>                    
                  <th class="pe-5">Product Code </th> 
                  <th class="pe-0">Quantity</th>    
                </thead>
                <tbody>
                  <tr>
                  <?php $arraylength = count($proCodeArray); 
                    for($i=0; $i < $arraylength;$i++) {  ?>
                      <td><?php echo $proCodeArray[$i] ;?></td>
                      <td><?php echo $proQtyArray[$i];?></td>
                        </tr> <?php }?>
                </tbody>
                </table>  
              <!--End of nesting table  -->
            </td>
            <td><?php echo $row['totalQty'];?></td>
            <td><?php echo $row['totalAmount'];?></td>
            <td><b>Name : </b><?php echo $row['firstName'];?> &nbsp<?php echo $row['lastName'];?><br><b>Address :</b><?php echo $row['address'];?>,<?php echo $row['city'];?><br><b>Contact : </b><?php echo $row['phoneNumber'];?><br>
            </td>
            <td><?php echo $row['orderDate'];?></td>
            <td><?php
                if($row['paymentStatus'] == '1'){
                          echo '<span class="text-primary">Paid</span>';
                      }else{
                          echo '<span class="text-danger">COD</span>';
                        }  ?>
            </td>
            <td> 
            <?php
              if($row['delivery'] == '0'){ 
                            echo '<a class="btn btn-sm" href="orderStatus.php?id='.$row['orderNumber'] .'&delivery=0" >processing</a>';
                      } else{
                          echo 'delivered'; 
                      }?>                       
            </td>
            <td>
                <a class=" btn-xs delete_user" href="delete_order.php?id=<?php echo $row['orderNumber'];?>"><i class="fa fa-trash text-dark"></i></a>
            </td>
        </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Table of outer table -->
</div>
<?php
  }else {
       echo "<h3>No Results Found.</h3>";
    } 
// pagination
    $sql1 = "SELECT * FROM `order`";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

    if(mysqli_num_rows($result1) > 0){

      $total_records = mysqli_num_rows($result1);

      $total_page = ceil($total_records / $limit);

      echo '<ul class="pagination admin-pagination">';
    if($page > 1){

      echo '<li><a href="orders.php?page='.($page - 1).'">Prev</a></li>';
    }
    for($i = 1; $i <= $total_page; $i++){
    if($i == $page){ 
        $active = "active";
          }else{
            $active = "";
          }
            echo '<li class="'.$active.'"><a href="orders.php?page='.$i.'">'.$i.'</a></li>';
        }
    if($total_page > $page){
        echo '<li><a href="orders.php?page='.($page + 1).'">Next</a></li>';
      }
        echo '</ul>';
    } ?> 
  </div>
 </div>
<?php
  // include header file 
    include 'footer.php';