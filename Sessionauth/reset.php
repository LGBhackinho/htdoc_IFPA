<?php

	require_once("../connect.php");

$utilisateur_id = $_GET["choix"]; // ou la méthode que vous utilisez pour obtenir l'ID de l'utilisateur
// D'abord, supprimer les entrées associées dans utilisateurs_services
$query = "DELETE FROM utilisateurs_services WHERE utilisateur_id = ?";
$stmt  = $mysqli->prepare($query);
$stmt ->bind_param("i", $utilisateur_id);
$stmt ->execute();
$stmt ->close();

	

// envoi de la commande  delete a mysql

	$req="DELETE FROM utilisateurs WHERE id ='".$_GET["choix"]."';"; 
	$table_lign = $mysqli -> query($req);
	if($mysqli->affected_rows > 0) {
		
		echo "UTILISATEUR SUPPRIME";
		
	}
	else{
		echo " CA A GRAVE FOIRE";
	}
	$mysqli-> close();
?>
<br>
<a href="index.html">Page Principale</a>
	
	
		
		
	