<!-- incliude header file -->
<?php include 'header.php';?>
<!-- /incliude header file -->

<!-- new arrival -->
<section id="products" class="products mt-5">  
        <h2 class="section-head text-center text-uppercase mt-2"><a href="New_arrival.php">New Arrival</a></h2>                    
  <div class = "d-flex justify-content-around mt-2 flex-wrap">
        <?php
        $select_newArrival="SELECT * FROM `product` LEFT JOIN `brands` ON product.pro_brand = brands.b_id ORDER BY pro_id  DESC LIMIT 16";
            $result_newArrival=mysqli_query($link,$select_newArrival);
                while($row_data=mysqli_fetch_assoc($result_newArrival)){
                    $pro_brand=$row_data['b_id'];
                    $pro_desc=$row_data['pro_short_desc'];
                    $pro_image=$row_data['pro_image'];
                    $pro_image2=$row_data['pro_image2'];
                    $pro_price=$row_data['pro_price'];
                    $brand_name=$row_data['b_name'];
                    $pro_id=$row_data['pro_id'];
                 echo'<div class="card mb-5" style="width: 24%;">
                        <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp" src="image/'.$pro_image.'"  data-alt-src="image/'.$pro_image2.'" /></a> 
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
<!-- /new arrival -->
  
<!-- incliude footer file -->
<?php include 'footer.php';?>
<!-- /incliude footer file -->

 
