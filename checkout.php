<?php
// include config file
require_once "config.php";

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
  header("location: {$hostname}/login.php");
  exit;
}

//include header file
include 'header.php'; ?>

<!-- Checkout Page -->
  <div class="container ms-5 px-5">
      <div class="row">
        <div class="col-md-12 py-5 text-center">
          <h2>Checkout form</h2>
        </div>
        <div class="col-md-10">
          <h4 class="mb-3 px-5 mx-5">Shipping address</h4></div>
            <form  action="order.php" method = "get">
              <div class="row g-3 px-5 mx-5">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" name="fName" required>
                </div>
                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" name="lName" required>
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="you@example.com" required>                  
                </div>    
                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="" required>                 
                </div>
                <div class="col-md-5">
                  <label  class="form-label">Phone Number</label>
                  <input type="phone" class="form-control" name="phone" placeholder="" required>
                  <label  class="form-label">City</label>
                  <input type="text" class="form-control" name="city" placeholder="" required>
                </div>
              </div>
                <div class="px-5 mx-5">
                  <h4 class="my-3">Payment</h4>
                  <hr class="my-4">
                <div class="my-3">
                <div class="form-check">
                  <input id="cashOnDelivery" name="paymentMethod" type="radio" class="form-check-input" value="cashOnDelivery"   required>
                  <label class="form-check-label" for="credit">Cash On Delivery</label>
                </div>
                  <hr class="my-4">
                <div class="form-check">
                  <input id="creditCard" name="paymentMethod" type="radio" class="form-check-input" value="creditCard" checked  required>
                  <label class="form-check-label" for="debit">Credit card</label>
                </div>
                  <hr class="my-4">
              </div class="px-5 mx-5">
              <div class="row gy-3" id="hide">
                <div class="col-md-6">
                  <label for="cc-name" class="form-label">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="">
                  <small class="text-muted">Full name as displayed on card</small>
                </div>    
              <div class="col-md-6">
                  <label for="cc-number" class="form-label">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="">                  
              </div>
              <div class="col-md-3">
                  <label for="cc-expiration" class="form-label">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="">                
              </div>
              <div class="col-md-3 mb-3">
                  <label for="cc-cvv" class="form-label">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="">
              </div>
              </div>
                <input id= "productCode" type="hidden" name="productCode" value="">
                <input id= "totalQty" type="hidden" name="totalQty" value="">
                <input id= "totalAmount" type="hidden" name="totalAmount" value="">
                <input id= "qty" type="hidden" name="qty" value="">
                <button class="btn " type="submit" name="order" >Place Order</button>
            </form>
          </div>
        </div>
       </div>
   </div>
</div>
<!-- /Checkout Page -->

<!-- include footer file -->
<?php include 'footer.php';?>
<!-- /include footer file -->