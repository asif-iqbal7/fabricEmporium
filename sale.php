<?php
// Include Config File
require_once "config.php";
// include header file
include 'header.php'; 

echo'<section id="products" class="products mt-3">  
    <h2 class="section-head text-center text-uppercase mt-2"><a href="#">SALE</a></h2>                    
        <div class = "d-flex justify-content-around mt-2 flex-wrap">';
             $select_data ="SELECT * FROM `product`  LEFT JOIN `brands` ON product.pro_brand = brands.b_id WHERE pro_sale_status = 1 LIMIT 16"; 

        $result=mysqli_query($link,$select_data);
        $num = mysqli_num_rows($result);
            if($num> 0){
                while($row_data=mysqli_fetch_assoc($result)){
    
                    $pro_desc=$row_data['pro_short_desc'];
                    $pro_image=$row_data['pro_image'];
                    $pro_image2=$row_data['pro_image2'];
                    $pro_price=$row_data['pro_price'];
                    $pro_sale_price=$row_data['pro_sale_price'];
                    $brand_name=$row_data['b_name'];
                    $pro_id=$row_data['pro_id'];

            echo'<div class="card mb-5 " style="width: 24%; ">
                <div class="imagecontainer">
                    <a href="single_item.php?id='.$pro_id.'"><img class="card-img-top swapp "   src="image/'.$pro_image.'"  data-alt-src="image/'.$pro_image2.'" /></a>
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
                    <a class = " add-to-cart" href="#" data-id="'.$pro_id.'" data-price="'.$pro_price.'" data-name="'.$pro_desc.'" data-image="'.$pro_image.'">
                    <h6 class="text-center text-light mb-0 p-2">Add To Cart</h6>
                    </a>
                </div>
                </div>';                   
                }
            echo'</div>
        </div>
</section>';
                        
//incliude footer file
include 'footer.php'; 
                }
            else{
                echo '<p class = "text-danger">No Sale</P>

                <!-- bootstrap js -->
                <script src = "js/bootstrap.bundle.js"></script>

                <!-- custom js -->
                <script src = "js/script.js"></script>
    </body>
</html>';
               }
?>


