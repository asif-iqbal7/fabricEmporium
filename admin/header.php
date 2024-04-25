<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "../css/bootstrap.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "../css/style.css">
   
</head>
<body>
    <!-- Navbar -->
<nav class = "navbar navbar-dark bg-dark p-0">           
      <div class = "container-fluid justify-content-center">
          <div class = "navbar-brand  ">                  
                <span class ="text-light mheading">Fabrics Emporium-Online</span>
                <span id="slogen" class="text-capitalize text-light">Passion for fashion</span>                   
          </div>
      </div>
</nav>
<!-- 2nd navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <a class="nav-link text-dark" href="dashboard.php" class="text-uppercase ">Dashboard</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
   <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="products.php" class="text-uppercase">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="category.php" class="text-uppercase">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fabric_type.php" class="text-uppercase">Fabric Types</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="brands.php" class="text-uppercase">Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orders.php" class="text-uppercase">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php" class="text-uppercase">Users</a>
        </li>  
     </ul>
</div>
  <!-- button -->
      <li class="d-flex nav-item dropdown me-5">
        <a class="btn sdropdown-toggle"data-bs-toggle="dropdown"aria-expanded="false">
         Hi Admin
        </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
</nav>
<!-- END OF 2ND NAVBAR -->
    <div id="admin-menu">      