<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $metier = $_POST['metier'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO utilisateur (nom, prenom, age, metier, email, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisss", $nom, $prenom, $age, $metier, $email, $mot_de_passe);
    
    if ($stmt->execute()) {
        echo "Nouvel enregistrement créé avec succès";
        header("Location: connexion.html");
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
