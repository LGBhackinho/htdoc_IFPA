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
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    
    $sql = "SELECT * FROM utilisateur WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['metier'] = $user['metier'];
            $_SESSION['email'] = $user['email'];
            header("Location: profileUtilisateur.html");
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Email non trouvé";
    }
    
    $stmt->close();
}

$conn->close();
?>
