<?php
// INCLUDE CONFIG FILE
  include "config.php";
  session_start();
if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/index.php");
  } ?>
<?php
// include header file
include 'header.php'; ?>
    <div class="admin-content-container">
      <h3 class="admin-heading  text-center">Dashboard</h3>
        <div class="row">
            <div class="col-md-3 dashboard">
              <div class="detail-box">
                <span class="count-tag "> <a  class ="text-white"href="products.php">
                        Products</a></span>
            </div>
          </div>
      <div class="col-md-3 dashboard">
          <div class="detail-box">
              <span class="count-tag"> <a  class ="text-white"href="category.php">
                 Catagories</a></span>
          </div>
      </div>
      <div class="col-md-3 dashboard">
          <div class="detail-box">
              <span class="count-tag"> <a  class ="text-white"href="fabric_type.php">
                   Fabrics Type</a></span><br>
          </div>
      </div>
      <div class="col-md-3 dashboard">
          <div class="detail-box">
              <span class="count-tag"> <a  class ="text-white"href="brands.php">
                Brand</a></span><br>
          </div>
      </div>
      <div class="col-md-3 dashboard">
          <div class="detail-box">
              <span class="count-tag"> <a  class ="text-white"href="orders.php">
                Orders</a></span>
          </div>
      </div>
      <div class="col-md-3 dashboard">
          <div class="detail-box">
             <span class="count-tag"> <a  class ="text-white"href="users.php">
               Users</a></span>
        </div>
      </div>
    </div>
  </div>
 </div>
</div> 
<?php
// include header file
 include 'footer.php'; ?>


