<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="admin.php">

   <title>crud</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 


</head>

<body>
  <style>
 body {
    background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
background-attachment: fixed;
  background-repeat: no-repeat;

    font-family: 'Vibur', cursive;
/*   the main font */
    font-family: 'Abel', sans-serif;
opacity: .95;
/* background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%); */
}


h3{
  text-align:center;

}
    .form-group{
      text-align:center;
    }
    .form-group .form-control{
   text-transform: none;
   padding:10px 10px;
   font-size: 17px;
   color:var(--black);
   border-radius: 8.5px;
   background-color: var(--white);
   margin:10px 0;
   width: 20%;
   place-items: center;
  


}

.row  table{
   width: 40%;
   text-align: center;
  align-items: center;
  justify-content: space-between;
}

.row  table thead th{
   padding:15px;
   font-size: 13px;
   background-color: var(--black);
   color:var(--white);
}

.row  table td{
   padding:2 px;
   font-size: 3 px;
   color:var(--black);
}

.btn-info{
  border: 1px solid rgb(177, 214, 11);
  border-radius: 2px;

}
.btn-info:hover{
  background-color: rgb(177, 214, 11);
border-color: rgb(177, 214, 11);
}

.btn-danger{
  border: 1px solid rgb(96, 5, 5);
  border-radius: 2px;
}
.btn-danger:hover{
  background-color: rgb(246, 15, 15);
border-color: rgb(96, 5, 5);
}
.btn-primary{
  border: 3px solid  rgb(15, 246, 27);
  border-radius: 4px;
}
.btn-primary:hover{
  background-color:  rgb(15, 246, 27);
border-color:  rgb(15, 246, 27);
}



  </style>
    
    <?php 
        @include 'ADMINheader.php';
?>
<br><br><br>
<center>
<?php
    @include 'config.php';

    @include 'process.php';?>

    <?php
    if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
 
<?php
 echo $_SESSION['message'];
 unset ($_SESSION['message']);


?>
</div>

<?php endif?>
<div class="container">

  <?php
 $mysqli=new mysqli('localhost','root','','admin')
 or die (mysqli_error($mysqli)); 

 $result=$mysqli->query("SELECT * FROM produits")or die($mysqli->error);
//pre_r($result);
?>


<div class="row">
<table class="table">
<thead>  
<tr>
<th>image</th>
<th>nom</th> 
<th>prix</th>
<th colspan="2">action</th>

</tr>
</thead>
    <tbody>
<?php

while($row=$result->fetch_assoc()):

?>
<tr>
  <td> <?php echo '<img src="upload/' .$row['image'].'"width="100px;" height="100px;" alt="">' ?></td>
  <td> <?php  echo  $row['nom'];?></td>
  <td> <?php  echo  $row['prix'];?></td>
<td>

<a href="process.php?supprimer=<?php echo $row['id'];?> "
class="btn-danger"><i class="fas fa-trash"></i></a>

</td>
</tr>
<?php
endwhile;
 
?>
</tbody>
</table>
</center>
</div>
<br><br><br>
<?php 


 function pre_r($array){

     echo'<pre>';
     print_r($array);
     echo'</pre>';
 }

?>
<div class="slogan">
    <h3>Ajouter Produits</h3>
    </div>
   

    <div class="row">
        <?php

   
  
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='upload/".$row['image']."' >";
      
      echo "</div>";
    }
  ?>
<div class="form-group">
    <form method="POST"  action="admin.php" enctype="multipart/form-data">

    <img src="upload/<?php echo $row['image']; ?>" height="20px" width="10px" alt="">
    <input type="hidden" name="id" value="<?php echo $id;?>">
<br>

        <input type="text" name="nom" class="form-control" value="<?php echo $nom ;?>" placeholder=" nom du produit " required>
<br>




<input type="text" name="prix" min="0" class="form-control" value="<?php echo $prix ;?>" placeholder=" prix du produit " required>
<br>

<input type="file" name="image" class="form-control"  required>
<br>

 <?php
 if($update==true):
    ?>
        <button type="submit" class="btn-info" name="update" >update  </button>
<?php else: ?>

        <button type="submit" class=" btn-primary" name="ajouter" >Ajouter produit </button>

  <?php endif;?>

</form>
</div>
</div>
</div>
</body>
</html>