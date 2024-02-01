  

  
  <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
 <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="#">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
</head>

  <link rel="stylesheet" href="#">
<style>
/* Light mode */
#main-container {
  --bg-color: #f8f8f8;
  --text-color: #333;
}

/* Dark mode */
#main-container.dark-mode {
  --bg-color: #333;
  --text-color: #fff;
}

/* Set the default color scheme */
:root {
  --bg-color: #f8f8f8;
  --text-color: #333;
}

/* Set the dark mode color scheme */
.dark-mode {
  --bg-color: #000000;
  --text-color: #fff;
}

/* Set the colors of the body based on the color scheme */
body {
  background-color: var(--bg-color);
  color: var(--text-color);
}

</style>
 <!-- Topbar Start -->
    <div class="container-fluid">
       
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">CK</span>Store</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                
                <class="btn border">
                    <a href="cart.php"><i class="fas fa-shopping-cart text-primary"></i></a>
					<?php
                    require_once('config.php');

      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);



      ?>
   <span class="badge"><?php echo $row_count; ?></span> 
				
            </div>
			

        </div>
    </div>
    <!-- Topbar End -->


 

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">CK</span>Store</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="home.php" class="nav-item nav-link ">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cart</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="cont.php" class="nav-item nav-link">Contact</a>
                        </div>
                        
                    </div>
                </nav>
           
            </div>
        </div>
    </div>
    <!-- Navbar End -->
