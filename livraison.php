<?php
$username = "root";
$dbname = "admin";
$hostname = "localhost";
$password = "";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("probleme de connection" . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_pin = $_POST['code_pin'];

    // Vérifier si le "direct check" est activé
    $payment_method = $_POST['payment'];
    $total_prix = 0;
    $total_product= ""; // Initialisez une chaîne vide pour stocker la liste des produits

    if ($payment_method === 'directcheck') {
        // Calculer le total_prix et la liste des produits avec leurs quantités
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
        if (mysqli_num_rows($select_cart) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                $total_prix += $fetch_cart['prix'] * $fetch_cart['quantity'];
                // Ajoutez le nom du produit suivi de sa quantité à la liste
                $total_products .= $fetch_cart['nom'] . ' (' . $fetch_cart['quantity'] . '), ';
            }
            // Supprimez la virgule et l'espace en trop à la fin de la liste
            $total_products = rtrim($total_products, ', ');
        }
    }

    // Insérer les données de livraison dans la base de données
    $sql = "INSERT INTO livraison(nom,tel,email,adresse,ville,code_pin,total_prix,total_products) 
            VALUES ('$nom','$tel','$email','$adresse','$ville','$code_pin','$total_prix','$total_products')";
    if (mysqli_query($conn, $sql)) {
        header("Location: shop.php");
        echo "Votre commande est bien enregistrée";
    } else {
        echo "Commande n'est pas enregistrée" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
    <?php
require_once('navbar.php');
?>

   
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/checkout.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Checkout and Payement</h3>
                                    <a href="home.php" class="btn btn-light py-2 px-3">Go To Home</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>

    


    <!-- Checkout Start -->
    <form action="livraison.php" method="post">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" name="nom" type="text" placeholder="John">
                        </div>

                         <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="tel"  type="text" placeholder="+123 456 789">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email"  type="text" placeholder="example@email.com">
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>Address </label>
                            <input class="form-control" name="adresse"  type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group" >
                            <label>City</label>
                            <select class="custom-select"  name="ville" >
                                <option selected>Morocco</option>
                                <option>Rabat</option>
                                <option>Casablanca</option>
                                <option>Marrakech</option>
                                <option>Agadir</option>
                                <option>Fes</option>
                                <option>Tanger</option>

                            </select>
                        </div>
                        
                        
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control"  name="code_pin"  type="text" placeholder="123">
                        </div>
                        
                      
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3"   name="total_product" >Products</h5>
                        <div class="d-flex justify-content-between">
                            <p> 
                                
                              <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_prix = number_format($fetch_cart['prix'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_prix;
      ?><br>
      <span><?= $fetch_cart['nom']; ?>(<?= $fetch_cart['quantity']; ?>) :  <?= $total_prix ; ?>DH </span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?><br>
  </p>
                       
                        </div>
                        
                        
                       
                       
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"  name="total_prix" ><?= $grand_total; ?>DH </h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" name="submit">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- Checkout End -->

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