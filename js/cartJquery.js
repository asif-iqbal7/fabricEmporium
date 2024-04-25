// Enable/Disable checkout Button on Cart Page
$(".checkoutBtn").hover(function(){
    if(shoppingCart.countCart()>0){
                $(".checkoutBtn").attr('disabled', false);
            }
            else{
                $(".checkoutBtn").attr('disabled', true);
            }
  });

// comment page redirect
$(".commentbtn").click(function(event){
    window.location.href = "single_item.php";
});

// Swapping Images
$(document).ready(function(){
    $('.swapp').hover(function(){
      var current = $(this).attr("src");
      var swap = $(this).attr("data-alt-src");
      $(this).attr("src",swap);
      $(this).attr("data-alt-src",current);
    }, function(){
      var current = $(this).attr("src");
      var swap = $(this).attr("data-alt-src");
      $(this).attr("data-alt-src",current);
      $(this).attr("src",swap);
    });
  })

// show hide credit card payment method
$(document).ready(function(){
    
    $("#cashOnDelivery").click(function(){
        $("#hide").hide();
    });
    $("#creditCard").click(function(){
        $("#hide").show();
      });
});

$(".add-to-cart").click(function(event){
    event.preventDefault();
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    var image = $(this).attr("data-image");
    var price = Number($(this).attr("data-price"));

    shoppingCart.addItemToCart(id, name, image, price, 1);
    displayCart();
});

$("#clear-cart").click(function(event){
    shoppingCart.clearCart();
    displayCart();
});

function displayCart() {
    var cartArray = shoppingCart.listCart();
    console.log(cartArray);
    var output = "";
    
    var productCode = [];
    var qty = [];
    

    for (var i in cartArray) {
        output += "<tr>"+
        "<td width='80px'><img src='image/"+cartArray[i].image+"' alt='' width='80px' /></td>"+
        "<td>"+cartArray[i].name+"</td>"+
        "<td><span class='product-price'>"+cartArray[i].price+"</span></td>"+
        " <td width='53px'><button class='plus-item btn btn-sm' data-id='"
        +cartArray[i].id+"'>+</button>"+
        "<input id='cartinputbox' class='item-count form-control item-qty' type='number' data-name='"
                    +cartArray[i].name
                    +"' value='"+cartArray[i].count+"' ><button class='subtract-item btn btn-sm' data-id='"
            +cartArray[i].id+"'>-</button></td>"+
        "<td> <span class='sub-total'>"+cartArray[i].total+"</span></td>"+
        "<td >"+
            " <button class='delete-item btn btn-sm' data-id='"
            +cartArray[i].id+"'>X</button></td>"+
        "</tr>";
        productCode.push(cartArray[i].id);
        qty.push(cartArray[i].count);
        
    }
    
    $("#show-cart").html(output);
    $(".count-cart").html( shoppingCart.countCart() );
    $(".total-cart").html( shoppingCart.totalCart() );
    $("#grandTotalCart").html(Number(shoppingCart.totalCart())+250);
    
    $("#productCode").val(productCode);
    $("#qty").val(qty);
    $("#totalQty").val(shoppingCart.countCart());
    $("#totalAmount").val(shoppingCart.totalCart());


    
    
}





$("#show-cart").on("click", ".delete-item", function(event){
    var id = $(this).attr("data-id");
    shoppingCart.removeItemFromCartAll(id);
    displayCart();
});

$("#show-cart").on("click", ".subtract-item", function(event){
    var id = $(this).attr("data-id");
    shoppingCart.removeItemFromCart(id);
    displayCart();
});

$("#show-cart").on("click", ".plus-item", function(event){
    var id = $(this).attr("data-id");
    shoppingCart.addItemToCart(id, 0, 0, 0, 1);
    displayCart();
});

$("#show-cart").on("change", ".item-count", function(event){
    var id = $(this).attr("data-id");
    var count = Number($(this).val());
    shoppingCart.setCountForItem(id, count);
    displayCart();
});


displayCart();