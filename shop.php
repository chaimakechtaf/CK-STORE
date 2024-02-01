
<?php

require_once('config.php');


if(isset($_POST['add_to_cart'])){

   $nom = $_POST['nom'];
   $prix = $_POST['prix'];
   $image = $_POST['image'];
   $quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE imge = '$image'");

   if($select_cart){
      $message[] = 'produit deja ajoute au panier';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(nom, prix, image, quantity) VALUES('$nom', '$prix', '$image', '$quantity')");
      $message[] = 'Produit Ajoute au panier avec succes';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CK-Store - shop</title>
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
    <link href="#" rel="stylesheet">


    <style>
/* Add styles for the alert message */
.alert {
  margin-top: 20px;
  padding: 10px;
  border-radius: 4px;
}
body{
  margin:0px;
  padding: 0px;
  font-family: 'Open Sans', sans-serif;
}

/* Add styles for the card */
.card {
  margin-bottom: 20px;
  border-radius: 4px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-img-top {
  height: 200px;
  object-fit: cover;
}

.card-body {
  padding: 20px;
}

.card-title {
  font-size: 18px;
  font-weight: bold;
}

.card-text {
  font-size: 16px;
  color: #888;
  margin-bottom: 10px;
}

.btn {
  font-size: 16px;
  font-weight: bold;
  border: none;
  transition: all 0.3s ease-in-out;
}



</style>

</head>


<body>
    <?php require_once('navbar.php'); ?>



 <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/shopping 2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Shop</h3>
                                    <a href="home.php" class="btn btn-light py-2 px-3">Go To Home</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>


           <br>    <?php require_once('categories.php'); ?>


    <!-- Shop Product Start -->
       <div class="container">

<section class="products">

         <br><br><br><br><br>

         <div class="row">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `produits` ");
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_product = mysqli_fetch_assoc($select_products)){
         ?>

         <div class="col-md-4">
            <form action="" method="post">
               <div >
                  <img class="card-img-top" src="upload/<?php echo $fetch_product['image']; ?>" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title"><?php echo $fetch_product['nom']; ?></h5>
                     <p class="card-text"><?php echo $fetch_product['prix']; ?>DH</p>
                     <input type="hidden" name="nom" value="<?php echo $fetch_product['nom']; ?>">
                     <input type="hidden" name="prix" value="<?php echo $fetch_product['prix']; ?>">
                     <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
                     <button type="submit" class="btn btn-danger" name="add_to_cart" style="background-color:#ef9a9a">Ajouter au panier</button>
                  </div>
               </div>
            </form>
         </div>

         <?php
               };
            };
         ?>

         </div>

      </section>
</div>
    <!-- Shop End -->


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