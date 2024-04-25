<?php
// Include Config File
require_once "config.php";

// include header file
include 'header.php'; 

// Filter By Price Page
$min = $_GET['min']; 
$max = $_GET['max'];

if($min == 1000 && $max == 2000){
    getResults($link,$min,$max);
}elseif($min == 2000 && $max == 3000){
    getResults($link,$min,$max);
}
elseif($min == 3000 && $max == 5000){
    getResults($link,$min,$max);
}
elseif($min == 5000 && $max == 7000){
    getResults($link,$min,$max);  
}
elseif($min == 7000 && $max == 10000){
    getResults($link,$min,$max);
}
elseif($min == 10000 && $max == 15000){
    getResults($link,$min,$max);
}
elseif($min == 15000 && $max == 30000){
    getResults($link,$min,$max);
}
elseif($min == 30000 && $max == 50000){
    getResults($link,$min,$max);
}
elseif($min == 50000 && $max == 100000){
    getResults($link,$min,$max);
}

function getresults($conn,$mn,$mx){
    echo'<section id="products" class="products mt-5">  
        <div class=" text-center text-uppercase mt-5">
            <h2 class="section-head">Products Between '.$mn.' & '. $mx.'</h2>
        </div>                    
        <div class = "d-flex justify-content-around mt-2 flex-wrap">';
        $select_data ="SELECT * FROM `product`  LEFT JOIN `brands` ON product.pro_brand = brands.b_id WHERE pro_price BETWEEN $mn AND $mx  LIMIT 16";
            $result=mysqli_query($conn,$select_data);
            $num = mysqli_num_rows($result);
            if($num> 0){
                while($row_data=mysqli_fetch_assoc($result)){
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
                    echo'</div>
                    </div>
            </section>'; 
// Filter By Price Page end

//incliude footer file
include 'footer.php'; 
                   
            }
            else{
                echo '<p class = "text-danger">no products found in this range</P>';
                ?>
                <!-- bootstrap js -->
                <script src = "js/bootstrap.bundle.js"></script>
                <!-- /bootstrap js -->

                <!-- custom js -->
                <script src = "js/script.js"></script>
                <!-- /custom js -->
                
                <!-- JQuery3 -->
                <script src="js/jquery-3.6.0.js"></script>
                <!-- /JQuery3 -->

                <!-- shopping cart Functions -->
                <script src="js/cartFunctions.js"></script>
                <!-- /shopping cart Functions-->

                <!-- shopping cart jquery -->
                <script src="js/cartJquery.js"></script>
                <!-- /shopping cart jquery -->
               <?php
            echo '</body>
        </html>';
    }
}
?>