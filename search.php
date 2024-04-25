<!-- incliude header file -->
<?php include 'header.php';?>
<!-- /incliude header file -->

<!-- Search Page -->
<section id="products" class="products mt-5">
    <h2 class="section-head text-center text-uppercase mt-2"><a href="#">Search Result</a></h2>
<div class="d-flex justify-content-around mt-2 flex-wrap">
    <?php
        if (isset($_GET['search_data_pro'])){
            $search_data_value =$_GET['search_data'];
            $search_query = "SELECT * FROM `product` LEFT JOIN `brands` ON product.pro_brand = brands.b_id WHERE keywords Like '%$search_data_value%' LIMIT 16";
            $resullt_query = mysqli_query($link,$search_query) or die("Query Failed.");
            if(mysqli_num_rows($resullt_query) > 0){
                while($row_data=mysqli_fetch_assoc($resullt_query)){
                    $pro_brand=$row_data['b_id'];
                    $pro_desc=$row_data['pro_short_desc'];
                    $pro_image=$row_data['pro_image'];
                    $pro_image2=$row_data['pro_image2'];
                    $pro_price=$row_data['pro_price'];
                    $brand_name=$row_data['b_name'];
                    $pro_id=$row_data['pro_id'];
                        echo'<div class="card mb-5" style="width: 24%;">
                             <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp"      src="image/'.$pro_image.'"  data-alt-src="image/'.$pro_image2.'" /></a> 
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

<!-- incliude footer file -->
<?php include 'footer.php';?>
<!-- incliude footer file -->
<?php      
}else{
    echo '<p class = "text-danger">No products found. Please try another keyword</P>';
}
}
?>
<!-- /Search Page -->



