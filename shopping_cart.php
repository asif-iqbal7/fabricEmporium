<?php
//include header file
include 'header.php';
// Include Config File
require_once 'config.php';
?>

<!-- Shopping Cart Page -->
<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="section-head text-center mt-5">My Cart</h2>
                
                                <table class="table table-bordered table-striped table-sm table-hover" >
                                    <thead>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th width="120px">Product Price</th>
                                    <th width="100px">Qty.</th>
                                    <th width="100px">Sub Total</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody id="show-cart">
                                        
                                   
                                    </tbody>
                                </table>
                
                                <div class = "d-flex justify-content-between">
                                    <div>
                                    <div>Total Item(s): <span class="count-cart">X</span></div>
                                    <div>Total Cart:Rs:<span class="total-cart"></span></div>
                                    <div>Delivery Charges:Rs 250</div>
                                    <div>Grand Total:Rs:<span id="grandTotalCart"></span></div>
                                    <button id="clear-cart"  class = "btn btn-sm">Clear Cart</button>
                                    </div>

                                    <div>
                                    <a class="btn btn-sm" href="index.php">Continue Shopping</a>
                                    <button  class="btn btn-sm checkoutBtn" onclick="location.href='checkout.php'">Proceed to Checkout</button>
                                    </div>

                                </div>
                
                                
                                    <input type="hidden" name="product_id" value="">
                                    <input type="hidden" name="product_total" class="total-price" value="">
                                    <input type="hidden" name="product_qty" class="total-qty" value="1">
                                </form>
                                <div class="checkout mb-4 mt-4">
                                
                                <form action="" class="checkout-form" method="POST">
                                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Shopping Cart Page -->

<!-- Include Footer File -->
<?php include 'footer.php'; ?>
<!-- /Include Footer File -->



