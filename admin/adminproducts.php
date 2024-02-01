<?php require_once('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   <title>Produits</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
   <link rel="stylesheet" href="style.css">
   
   <style>
	*{
    margin: 0;
    padding: 0;
}
body {
    background-image: url('upload/pexels-artem-podrez-7232493.jpg');
    background-repeat: no-repeat;
    background-size: cover;
	}
      /* Style for the message box */
      .message {
         background-color: #ffcccb;
         color: #b22222;
         padding: 10px;
         margin-bottom: 10px;
         position: relative;
      }
      
      .message span {
         display: inline-block;
         margin-right: 5px;
      }
      
      .message i {
         position: absolute;
         top: 5px;
         right: 5px;
         cursor: pointer;
      }
      
      /* Style for the products section */
      .products {
         padding: 50px 0;
         text-align: center;
      }
      
      .products .heading {
         font-size: 2rem;
         font-weight: bold;
         margin-bottom: 50px;
      }
      
      .products .box-container {
         display: flex;
         justify-content: center;
         flex-wrap: wrap;
      }
      
      .products .box {
         background-color: #fff;
         border: 1px solid #ccc;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0,0,0,0.2);
         margin: 20px;
         padding: 20px;
         text-align: center;
         width: 300px;
      }
      
      .products .box img {
         width: 100%;
         height: 200px;
         object-fit: cover;
         border-radius: 10px;
         margin-bottom: 20px;
      }
      
      .products .box h3 {
         font-size: 1.5rem;
         font-weight: bold;
         margin-bottom: 10px;
      }
      
      .products .box .prix {
         font-size: 1.2rem;
         font-weight: bold;
      }
      
      /* Style for the ADMIN header */
      /* Please adjust these styles to match your header */
      .admin-header {
         background-color: #333;
         color: #fff;
         padding: 10px;
      }
      
      .admin-header h1 {
         font-size: 2rem;
         margin: 0;
      }
   </style>
</head>
<body>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
      };
   };
   ?>

<?php 
        @include 'ADMINheader.php';
?>   
   <br><br><br><br>
   
   <div class="container">
      <section class="products">
         <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `produits` ");
            if(mysqli_num_rows($select_products) > 0){

           while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
  
           <div class="box">
              <img src="upload/<?php echo $fetch_product['image']; ?>" alt="">
              <h3><?php echo $fetch_product['nom']; ?></h3>
              <div class="prix"><?php echo $fetch_product['prix']; ?> DH <br><br><br></div>
           </div>

        <?php
           };
        };
        ?>
     </div>
  </section>
</div>

</body>
</html>
