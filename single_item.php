<?php
// Include Config Fille
require_once "config.php";
//include header file
include 'header.php';



// Single Product Detail Page
$pro_Id = $_GET['id'];
$select_data = "SELECT * FROM `Product`
        WHERE pro_id = '$pro_Id'";
        $result=mysqli_query($link,$select_data);
        $num = mysqli_num_rows($result);
        
            $row_data=mysqli_fetch_assoc($result);
    
                $pro_short_desc=$row_data['pro_short_desc'];
                $pro_desc=$row_data['pro_desc'];
                $pro_image=$row_data['pro_image'];
                $pro_image2=$row_data['pro_image2'];
                $pro_price=$row_data['pro_price'];
                $pro_sale_price=$row_data['pro_sale_price'];
                $pro_sale_status=$row_data['pro_sale_status'];
                $pro_qty=$row_data['pro_qty'];
                $pro_id=$row_data['pro_id'];

if($pro_sale_status==1){
    $price = $pro_sale_price ;
}else{
    $price = $pro_price;
}

echo'<form action = "shopping_cart.php" method = "POST">
<div class="single-product-container mt-3">
        <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-md-2">
                    <div class="flex-box">
                        <div class="left">
                            <div class="big-img example">
                                <img class="zoom" src="image/'.$pro_image.'" alt="">     
                            </div>
                              <div class="images">
                                  <div class="small-img">
                                      <img src="image/'.$pro_image.'" alt="" onclick="showImg(this.src)">     
                                  </div>
                                  <div class="small-img ms-4">
                                      <img src="image/'.$pro_image2.'" alt="" onclick="showImg(this.src)">       
                                  </div>
                              </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 mx-5 mt-3">
                    <div class="product-content">
                        <h3 class="text-danger">'.$pro_short_desc.'</h3>
                        <span class="fw-bold">Available Quantity : '.$pro_qty.'item</span>
                        <p class="description"> <b class="fs-5">Discription:</b><br>
                        '.$pro_desc.'</p>';
                        
                        if($pro_sale_status==1){
                            echo '<div>
                            <p class="mb-0"><b><del>Rs.</del></b><del>'.$pro_price.'</del></p>
                            <p class="mb-0"><b>Rs.</b>'.$pro_sale_price.'</p>
                            </div>';
                        }else{
                        echo'<div class="price fs-4">Rs. '.$pro_price.'</div>';
                        }
                        echo'<a class = "btn add-to-cart" href="#" data-id="'.$pro_id.'" data-price="'.$price.'" data-name="'.$pro_short_desc.'" data-image="'.$pro_image.'">add to cart</a>

                        <input type = "hidden" name = "Item_Name" value = "'.$pro_desc.'">
                              <input type = "hidden" name = "Price" value = "'.$pro_price.'">
                    </div>
                </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
</form>';

// comment coding
echo'
<div class="wrapper">
<form action="" method="POST" class="form">
<p class="fs-5 fw-bold">Leave a comment</p>
<div class="row">
    <div class="input-group">  
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your Name" required>
    </div>
</div>
<div class="input-group textarea">
    <label for="comment">Comment</label>
    <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
</div>
<div class="input-group">
    <button name="post-comment" class="btn" id= "commentbtn">Post Comment</button>
</div>
</form>
</div>';?>

<div class="container reviews mb-5">
<div class="row">
        <div class="col-md-12 review-head">
            <p class="fs-5 fw-bold"> Customer reviews</p>
        </div>
			<?php 
			 $commentID = $_GET['id'];
			$sql = "SELECT * FROM `comments` WHERE id = '$commentID' ";
			$result = mysqli_query($link, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
            <i class="fa fa-user-circle ms-4 fs-5"><?php echo $row['name']; ?></i>
				<h4></h4>
                <p class="ms-5"><?php echo $row['comment']; ?></p>
			</div>
			<?php
				}
			}else{
                echo "No review found yet.";
            }
			?>
		</div>
        </div>
        <?php
if (isset($_POST['post-comment'])) { // Check press or not Post Comment Button
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        
    

    $commentID = $_GET['id'];
    $name = $_POST['name']; // Get Name from form
	$comment = $_POST['comment']; // Get Comment from form

    

    

	$sql = "INSERT INTO `comments` (`id`, `name`,`comment`)
			VALUES ('$commentID','$name','$comment')";
	$result = mysqli_query($link, $sql);
	if ($result) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}else{
    echo "<script>
    window.location.href = 'http://localhost/Fabrics_Emporium_Online/login.php';
    </script>";
    exit;
}
}

    
// comment coding
?>
<?php

    // include footer file
    include 'footer.php'; 
?>
<script>
let bigImg = document.querySelector('.big-img img');
function showImg(pic){
    bigImg.src = pic;
}
</script>