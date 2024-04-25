<!-- Home Page -->

<!-- Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="New_arrival.php">
      <img src="image/slide1.png" class="d-block w-100" alt="...">
      </a>
    </div>
    <div class="carousel-item">
    <a href="category.php?id=9&name=Stitched">
      <img src="image/slide2.png" class="d-block w-100" alt="...">
    </div>
    </a>
    <div class="carousel-item">
      <a href="category.php?id=6&name=party wear">
      <img src="image/slide3.png" class="d-block w-100" alt="...">
      </a>
    </div>  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- /Slider -->

<!-- stitched and unstitched -->
<h2 class="section-head text-center text-uppercase mt-3">Shop by category</h2> 
<div class = "d-flex justify-content-around mt-3">
<div class="card" style="width: 49%;">
  <a href="category.php?id=9&name=Stitched">
  <img class="card-img-top" src="image/lg1.png" alt="Card image cap">
  </a>
</div>
<div class="card" style="width: 49%;">
  <a href="category.php?id=10&name=UnStitched">
  <img class="card-img-top" src="image/lg2.png" alt="Card image cap">
  </a>
</div>
</div>
<!-- /stitched and unstitched -->

<!-- kids and men -->
<div class = "d-flex justify-content-around mt-3">
<div class="card" style="width: 49%;">
  <a href="category.php?id=5&name=kids">
    <img class="card-img-top" src="image/kids.png" alt="Card image cap">
  </a>
</div>
<div class="card" style="width: 49%;">
  <a href="category.php?id=8&name=gents collection">
    <img class="card-img-top" src="image/mens.png" alt="Card image cap">
  </a>
</div>
</div>
<!-- /kids and men -->

<!-- SALE -->
<section id="products" class="products">  
  <h2 class="section-head text-center text-uppercase mt-3"><a href="sale.php">SALE</a></h2>

<!-- Sale Banner -->
<div class="card mt-2" style="width: 100%;">
  <a href="sale.php">
    <img class="card-img-top" src="image/saleBanner.png" alt="Card image cap">
  </a>  
</div>
<!-- /Sale Banner -->

<div class = "d-flex justify-content-around mt-3 ">
  <?php
    $select_sale="SELECT * FROM `product`  LEFT JOIN `brands` ON product.pro_brand = brands.b_id WHERE pro_sale_status = 1 LIMIT 4";  
      $result_sale=mysqli_query($link,$select_sale);
      while($row_data=mysqli_fetch_assoc($result_sale)){
              $pro_brand=$row_data['b_id'];
              $pro_desc=$row_data['pro_short_desc'];
              $pro_image=$row_data['pro_image'];
              $pro_image2=$row_data['pro_image2'];
              $pro_price=$row_data['pro_price'];
              $pro_sale_price=$row_data['pro_sale_price'];
              $brand_name=$row_data['b_name'];
              $pro_id=$row_data['pro_id'];
      echo'<div class="card " style="width: 24%;">
        <div class="imagecontainer">
          <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp "      src="image/'.$pro_image.'"  data-alt-src="image/'.$pro_image2.'" /></a>
        <div class="top-left bg-danger ps-1 pe-1"><b>S A L E</b></div>
        </div> 
        <div class="product-name p-2 text-center d-flex justify-content-between">
          <p class="mb-0"> <b>Brand:</b>'.$brand_name.'</p>
        <div>
          <p class="mb-0"><b><del>Rs.</del></b><del>'.$pro_price.'</del></p>
          <p class="mb-0"><b>Rs.</b>'.$pro_sale_price.'</p>
        </div>
        </div>     
        <div class="bg-dark">
          <a class = " add-to-cart" href="#" data-id="'.$pro_id.'" data-price="'.$pro_sale_price.'" data-name="'.$pro_desc.'" data-image="'.$pro_image.'">
          <h6 class="text-center text-light mb-0 p-2">Add To Cart</h6>
          </a>
        </div>    
        </div>';
            }
        ?>
    </div>
</section>
<!-- /SALE -->

<!-- KIDS -->
<section id="products" class="products">  
    <h2 class="section-head text-center text-uppercase mt-3"><a href="category.php?id=5&name=kids">KIDS</a></h2>   
                     
<!-- KIDS Banner -->
<div class="card mt-2" style="width: 100%;">
  <a href="category.php?id=5&name=kids">
  <img class="card-img-top" src="image/kids banner.png" alt="Card image cap">
  </a> 
</div>
<!-- /KIDS Banner -->

<div class = "d-flex justify-content-around mt-3 ">
  <?php
    $select_kids ="SELECT * FROM `product`  LEFT JOIN `brands` ON product.pro_brand = brands.b_id WHERE `pro_cat` = 5 LIMIT 4";
      $result_kids=mysqli_query($link,$select_kids);
      while($row_data=mysqli_fetch_assoc($result_kids)){
              $pro_brand=$row_data['b_id'];
              $pro_desc=$row_data['pro_short_desc'];
              $pro_image=$row_data['pro_image'];
              $pro_image2=$row_data['pro_image2'];
              $pro_price=$row_data['pro_price'];
              $brand_name=$row_data['b_name'];
              $pro_id=$row_data['pro_id'];
            echo'<div class="card " style="width: 24%;">
                    <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp"    src="image/'.$pro_image.'" data-alt-src="image/'.$pro_image2.'" /></a>    
                <div class="product-name p-2 text-center d-flex justify-content-between">
                    <p class="mb-0"> <b>Brand:</b>'.$brand_name.'</p>
                    <p class="mb-0"><b>Rs.</b>'.$pro_price.'</p>
                </div>
                <div class="bg-dark">
                    <a class = " add-to-cart" href="#" data-id="'.$pro_id.'" data-price="'.$pro_price.'" data-name="'.$pro_desc.'" data-image="'.$pro_image.'">
                    <h6 class="text-center text-light mb-0 p-2">Add To Cart</h6>
                    </a>
                </div>                     
                </div>';
            }
          ?>
    </div>
</section>
<!-- /KIDS -->

<!-- New Arrial -->
<section id="products" class="products">  
    <h2 class="section-head text-center text-uppercase mt-3"><a href="New_arrival.php">New Arrival</a></h2>                    
  <div class = "d-flex justify-content-around mt-2 ">
    <?php
    $select_newArrival="SELECT * FROM `product` LEFT JOIN `brands` ON product.pro_brand = brands.b_id ORDER BY pro_id  DESC LIMIT 4";
      $result_newArrival=mysqli_query($link,$select_newArrival);
      while($row_data=mysqli_fetch_assoc($result_newArrival)){
              $pro_brand=$row_data['b_id'];
              $pro_desc=$row_data['pro_short_desc'];
              $pro_image=$row_data['pro_image'];
              $pro_image2=$row_data['pro_image2'];
              $pro_price=$row_data['pro_price'];
              $brand_name=$row_data['b_name'];
              $pro_id=$row_data['pro_id'];
            echo'<div class="card " style="width: 24%;">
                  <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp"      src="image/'.$pro_image.'" data-alt-src="image/'.$pro_image2.'" /></a> 
                <div class="product-name p-2 text-center d-flex justify-content-between">
                  <p class="mb-0"> <b>Brand:</b>'.$brand_name.'</p>
                  <p class="mb-0"><b>Rs.</b>'.$pro_price.'</p>
                </div>                
                <div class="bg-dark">
                  <a class = " add-to-cart" href="#" data-id="'.$pro_id.'" data-price="'.$pro_price.'" data-name="'.$pro_desc.'" data-image="'.$pro_image.'">
                  <h6 class="text-center text-light mb-0 p-2">Add To Cart</h6>
                  </a>
                </div>     
                </div>';
             }
          ?>
    </div>
</section>
<!-- /New Arrial -->

<!-- Best Sallers -->
<section id="products" class="products">  
    <h2 class="section-head text-center text-uppercase mt-3"><a href="Best_saller.php">BEST SALLERS</a></h2>                    
<div class = "d-flex justify-content-around mt-2 pb-5">
  <?php
    $select_saller="SELECT * FROM `product`  LEFT JOIN `brands` ON product.pro_brand = brands.b_id WHERE saller_status = 1 LIMIT 4";
      $result_saller=mysqli_query($link,$select_saller);
      while($row_data=mysqli_fetch_assoc($result_saller)){
              $pro_brand=$row_data['b_id'];
              $pro_desc=$row_data['pro_short_desc'];
              $pro_image=$row_data['pro_image'];
              $pro_image2=$row_data['pro_image2'];
              $pro_price=$row_data['pro_price'];
              $brand_name=$row_data['b_name'];
              $pro_id=$row_data['pro_id'];
            echo'<div class="card mb-5" style="width: 24%;">
                    <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp"    src="image/'.$pro_image.'"  data-alt-src="image/'.$pro_image2.'" /></a>     
                <div class="product-name p-2 text-center d-flex justify-content-between">
                    <p class="mb-0"> <b>Brand:</b>'.$brand_name.'</p>                
                    <p class="mb-0"><b>Rs.</b>'.$pro_price.'</p>
                </div>            
                <div class="bg-dark">
                    <a class = " add-to-cart" href="#" data-id="'.$pro_id.'" data-price="'.$pro_price.'" data-name="'.$pro_desc.'" data-image="'.$pro_image.'">
                    <h6 class="text-center text-light mb-0 p-2">Add To Cart</h6>
                    </a>
                </div>
                </div>';
             }
          ?>
    </div>
</section>
<!-- /Best Sallers -->