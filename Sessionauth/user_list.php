<table border="1">
	<th>ID</th>
	<th>Prenom</th>
	<th>Nom</th>
	<th>Email</th>
	<th>Supprimer</th>
<?php



require_once("../connect.php");

	$req= " SELECT * from utilisateurs;";  //requete SQL pour envoyer 
	$row_list = $mysqli -> query($req);    // recuperation apres envoi de la requete
	if ($row_list -> num_rows > 0){        // 
		while($tuple = $row_list -> fetch_object()) {
				echo "<tr><td>".$tuple -> id."</td><td>".$tuple -> prenom."</td><td>".$tuple -> nom."</td><td>".$tuple -> email."</td><td><a href='reset.php?choix=".$tuple -> id."'>supprimer</a></td></tr>";
				
				

			}
	}
	

?>



</table>
