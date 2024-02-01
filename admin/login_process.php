<!-- login_process.php -->
<?php

session_start();
// Check connection
require_once('config.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT 'email','password' FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
    // Rediriger vers la page d'accueil
	    $_SESSION['logged_in'] = true;

    header('Location: admin.php');
    exit();
    } else {
        // Afficher un message d'erreur et demander les données de connexion à nouveau
        echo "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.";
    }
}

mysqli_close($conn);

?>
