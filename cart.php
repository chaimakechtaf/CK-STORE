<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};


if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    


<?php require_once('navbar.php'); ?>
   


         <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/shopiing cart.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Shopping cart</h3>
                                    <a href="home.php" class="btn btn-light py-2 px-3">Go To Home</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>

    

<div class="container">
    <section class="shopping-cart">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <br><br>
            <tbody>
                <?php 
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $grand_total = 0;
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                ?>
                <tr>
                    <td><img src="upload/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $fetch_cart['nom']; ?></td>
                    <td><?php echo number_format($fetch_cart['prix']); ?>dh</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" value="Update" name="update_update_btn" class="btn btn-primary btn-sm">
                        </form>   
                    </td>
                    <td><?php echo $sub_total = number_format($fetch_cart['prix'] * $fetch_cart['quantity'],0,'',''); ?>DH</td>

                    <td>
                        <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Supprimer ce produit du panier?')" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </td>
                </tr>
                <?php

                    $grand_total += $sub_total;
                    }
                }
                ?>
                <tr class="table-bottom"> 
                    <td colspan="4">
                        <a href="shop.php" class="btn btn-secondary">
                            <strong>Continuez vos achats</strong>
                        </a>
                    </td>
                    <td colspan="2" class="text-right">
                        Grand Total: <?php echo $grand_total; ?>DH
                        <br>
                        <a href="cart.php?delete_all" onclick="return confirm('Voulez-vous supprimer toute la commande?');" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Supprimer tous
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <div class="checkout-btn">
            <a href="checkout.php" class="btn btn-primary <?= ($grand_total > 1) ? '' : 'disabled'; ?>">
                <strong>Confirmer votre commande</strong>
            </a>
            <br><br>
        </div>
    </section>
</div>









    <?php

@include 'footer.php';
?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>