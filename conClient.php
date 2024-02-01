<?php
 $username = "root";
 $dbname   = "admin";
 $hostname = "localhost";
 $password = "";

 $conn =mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die("probleme de connection".mysqli_connect_error());
}
if(isset($_POST['submit'])){
	    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $tel=$_POST['tel'];

    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="INSERT INTO client(nom,prenom,tel,email,password) values ('$nom','$prenom','$tel','$email','$password') ";
    if(mysqli_query($conn,$sql)){
                  header("Location:login.php");

        echo"connexion avec succes";
    }else{
        echo"connexion echouee".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
