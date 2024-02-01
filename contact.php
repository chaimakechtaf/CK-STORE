<?php


@include 'config.php';
$message = '';
if(isset($_POST['valider'])){
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $msg=$_POST['msg'];

    $sql="INSERT into `contacter`(nom,email,tel,msg) VALUES('$nom', '$email', '$tel', '$msg') ";
    if(mysqli_query($conn,$sql)){
        header("Location: contact.php");
      $message = 'thank you for your message';
     exit();
   } else {
        echo"message was not send".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CK-STORE</title>
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
<style type="text/css">
  
body{
  margin:0px;
  padding: 0px;
  font-family: 'Open Sans', sans-serif;
}



/* form styles */
.formulaire {
  border: 1px solid #ccc;
  margin: 20px auto;
  padding: 20px;
  max-width: 600px;
}



label {
  display: block;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"],
textarea {
  border: 1px solid #ccc;
  font-size: 16px;
  padding: 10px;
  width: 100%;
}

button {
  background-color: #333;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: 16px;
  padding: 10px 20px;
  margin-top: 20px;
}

button:hover {
  background-color: #555;
}
</style>
</head>

<body>

<?php
require_once('navbar.php');?>

  <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/contact us.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Contact Us</h3>
                                    <a href="home.php" class="btn btn-light py-2 px-3">Go To Home</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>

       <form  action="" method="post" class="formulaire">
            <fieldset>
             <legend style="padding:50px;"><h2><strong><u>Contact Us</u></strong></h2></legend>
     
        <div class="nom">
              
         <input type="text" name="nom" placeholder="Full name">
      </div>
      </br>
     </br>
     <div class="email">

         <input type="text" name="email" placeholder="E-mail">
     </div>
     <br>

     <br>
     <div class="tel">
              
        <input type="text" name="tel" placeholder="Phone number ">
     </div>
     </br>
    </br>

    <div class="massage">
    <textarea name="msg" placeholder="Your message" ></textarea>
</br>
</br>
</br>
</br>
    <center> <input class="button" type="submit" name="valider" value="Send"> </center>
     <br><br><br>
    
    
      <p style="color:red">
        <?php echo $message; ?>
            

        </p>

   </fieldset>
     </form>

     
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