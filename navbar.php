<?php
//  Include Config File
require_once "config.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

//<!-- First Nabar -->
echo'<nav class = "navbar navbar-dark bg-dark p-0  ">
      <div class = "container-fluid justify-content-between">
        <div class="mt-1">
          <a class="text-decoration-none text-light" target="_blank" href="https://wa.me/+923073078000">
          <span><img src="image/whatsappnew.png" alt="" class= "bg-light mb-1" width="40"><span class="mt-1">03073078000</span></span></a>
        </div>
        <div class = "navbar-brand  ">
          <span class ="text-light mheading">Fabrics Emporium-Online</span>
          <span id="slogen" class="text-capitalize
            text-light">Passion for fashion</span>
        </div>
        <div>';
                
    if(isset($_SESSION['loggedin'])) {
          echo'<span class = "text-light">Hi... '.$_SESSION['firstName'] .'</span> <button type="button" class= "btn btn-outline-danger btn-sm"><a href="logout.php" class = "text-decoration-none text-dark">Logout</a></button>';
        } else{
            echo'<a href="login.php"><img src="image/usernew.png" class="rounded float-right bg-light" width="30"   alt=""></a>';
          }
            echo'</div>
            </div>
        </nav>';
// End of First Nabar
    
// Second Navbar
echo'<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 sticky-top">
      <div class="container-fluid mx-4">';

// Menu
echo'<ul class = "navbar-nav me-auto"  id = "navMenu">
        <li class = "nav-item px-2 py-2">
          <a class = "nav-link active" href = "index.php">Home</a>
        </li>
        <li class = "nav-item px-2 py-2">
          <a class = "nav-link" href = "category.php?id=9&name=summer collection">Summer Collection</a>
        </li>    
        <li class = "nav-item px-2 py-2">
          <a class = "nav-link" href = "Best_saller.php">Best saller</a>
        </li>
        <li class = "nav-item px-2 py-2">
          <a class = "nav-link" href = "sale.php">Sale</a>
        </li>
        <li class = "nav-item px-2 py-2">
          <a class = "nav-link" href = "about_us.php">About Us</a>
        </li>
      </ul>';
// End of Menu

// shopping cart icon
echo'<div style="float: right; cursor: pointer;" id = "ct">
        <a class = "text-decoration-none" id="cartid" href="shopping_cart.php">
        <span class="fa fa-shopping-cart  text-dark  ms-4"> </span><sup class = "text-danger h6 ms-1 count-cart">X</sup>
      </div></a>';
// End of shopping cart icon

// Filter Icon and Menu 
echo'<ul class="mb-0 p-2">
        <li class="nav-item dropdown d-flex">
          <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class = "fa fa-filter"> Filters</i> 
          </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li class = "nav-item px-2">
          <a class = "nav-link text-dark" href = "allProducts.php">All Products</a>
        </li>
        <li class = "nav-item px-2">
          <a class = "nav-link text-dark" href = "New_arrival.php">New Arrival</a>
        </li>';

// Price Range
echo'<li class="nav-item dropdown px-2 py-2 drop-down02">
      <a class="nav-link text-dark dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Price Range
      </a>
          <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=1000&max=2000">Rs.1000-2000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=2000&max=3000">Rs.2000-3000</a></li>
            <li><a class="dropdown-item text-capitalizr" href="filterPrice.php?min=3000&max=5000">Rs.3000-5000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=5000&max=7000">Rs.5000-7000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=7000&max=10000">Rs.7000-10,000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=10000&max=15000">Rs.10,000-15,000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=15000&max=30000">Rs.15,000-30,000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=30000&max=50000">Rs.30,000-50,000</a></li>
            <li><a class="dropdown-item text-capitalize" href="filterPrice.php?min=50000&max=100000">Rs.50,000-100,000</a></li>
          </ul>
      </li>';

//  Fabric Type
echo'<li class="nav-item dropdown px-2 py-2 drop-down02">
      <a class="nav-link text-dark dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fabric Type
      </a>
          <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdownMenuLink">';
            $select_fabric="SELECT * FROM `fabric_type`";
            $result_fabric=mysqli_query($link,$select_fabric);
 
                  while($row_data=mysqli_fetch_assoc($result_fabric)){
                        $fabric_type=$row_data['fab_name'];
                        $fabric_id=$row_data['fab_id'];
                                  
                  echo'<li><a class="dropdown-item text-capitalize" href="fabricsType.php?id='.$fabric_id.'&name='.$fabric_type.'">'.$fabric_type.'</a></li>';
                  }

        echo'</ul>
    </li>';

//  Category
echo'<li class="nav-item dropdown px-2 py-2 drop-down02">
        <a class="nav-link text-dark  dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category
        </a>
            <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdownMenuLink">';

              $select_category="SELECT * FROM `category`";
              $result_category=mysqli_query($link,$select_category);
                  while($row_data=mysqli_fetch_assoc($result_category)){
                    $category_name=$row_data['category_name'];
                    $category_id=$row_data['category_id'];
                  echo'<li><a class="dropdown-item text-capitalize" href="category.php?id='.$category_id.'&name='.$category_name.'">'.$category_name.'</a></li>';
                    }
        echo'</ul>
    </li>';
    
// Brand
echo'<li class="nav-item dropdown px-2 py-2 drop-down02">
      <a class="nav-link text-dark dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Brands
      </a>
          <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdownMenuLink">';
                                
            $select_brands="SELECT * FROM `brands`";
            $result_brands=mysqli_query($link,$select_brands);
                while($row_data=mysqli_fetch_assoc($result_brands)){
                    $brands_title=$row_data['b_name'];
                    $brands_id=$row_data['b_id'];
                  echo'<li><a class="dropdown-item text-capitalize" href="brands.php?id='.$brands_id.'&name='.$brands_title.'">'.$brands_title.'</a></li>';
                    }
      echo'</ul>
    </li>';

// Best Saller
echo'<li class = "nav-item px-2 py-2">
        <a class = "nav-link text-dark" href = "Best_saller.php">Best saller</a>
      </li>';

// Sale
echo'<li class = "nav-item px-2 py-2">
        <a class = "nav-link text-dark" href = "sale.php">Sale</a>
      </li>
    </ul>
  </li>
</ul>';
// End Filter Icon and Menu

//  Search
echo'<form class="d-flex my-0 ms-2" action = "search.php" autocomplete = "OFF">
        <input class="form-control me-2 form-control-sm" type="search" placeholder="Search" aria-label="Search" name = "search_data" required>
        <input class="btn btn-sm" type = "submit" value ="search" name = "search_data_pro">
    </form>  
  </div>
</nav>';
// End of Second Navbar
?>