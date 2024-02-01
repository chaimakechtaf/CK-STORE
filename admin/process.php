  <?php

  session_start();

  $mysqli = new mysqli('localhost','root','','admin')
  or die (mysqli_error($mysqli)); 

  $id=0;
   $update=false;
   $nom='';
   $prix=''; 
   $image='';
   

  if(isset($_POST['ajouter'])){
      $nom=$_POST['nom'];
      $prix =$_POST['prix'];
      $image = $_FILES['image']['name'];

      $target = "upload/".basename($_FILES['image']['name']);
      
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

      

     $mysqli->query("INSERT INTO produits(nom,prix,image) 
     VALUES ('$nom','$prix','$image')")
     or die ($mysqli->error);

     $_SESSION['message']="produit a ete ajoute";
     $_SESSION['msg_type']="success";

     header("location: admin.php");

  }
}

  if(isset($_GET['supprimer'])){
      $id=$_GET['supprimer'];
      $mysqli->query("DELETE FROM produits where id=$id")
      or die ($mysqli->error());

      $_SESSION['message']="produit a ete supprime";
       $_SESSION['msg_type']= "danger";

       header("location: admin.php");

  }

  

  if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM produits WHERE id=$id")
    or die($mysqli->error());

    if(count($result)==1){

  $row=$result->fetch_array();

  $nom=$row['nom'];
  $prix=$row['prix'];
  $image=$row['image'];
 
     header("location: admin.php");
  }

}



if(isset($_POST['update'])){  
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
    $image=$_POST['image'];

   

    $qr=$mysqli->query("UPDATE produits set nom='$nom',prix=' $prix',image='$image'  WHERE id='$id'") ;
    if($qr)
    {
    echo "mise à jour avec succes";
    
    }else
    {
      echo"mise à jour echouée";
    }
    header("location: admin.php");

    }





  
  ?>
