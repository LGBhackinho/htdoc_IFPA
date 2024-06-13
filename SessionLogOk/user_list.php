<table border="1">
	<th>ID</th>
	<th>Nom</th>
	<th>prenom</th>
	<th>Email</th>
	<th>age</th>
<?php



$SERVEUR="localhost";							//Nom du serveur
	$LOGIN="root";									//Nom d'utilisateur
	$MDP="";										//Mot de passe
	$MABASE="testphp";			//Nom de la base
	$mysqli = new mysqli($SERVEUR,$LOGIN,$MDP,$MABASE);
	if($mysqli->connect_errno) {
		exit ("Echec lors de la connexion � MySQL : " . $mysqli->connect_error);
		$CONNEXION=false;
	}
	else {
		$CONNEXION=true;
		
	}

	$req= " SELECT * from utilisateur;";  //requete SQL pour envoyer 
	$row_list = $mysqli -> query($req);    // recuperation apres envoi de la requete
	if ($row_list -> num_rows > 0){        // 
		while($tuple = $row_list -> fetch_object()) {
				echo "<tr><td>".$tuple -> id."</td><td>".$tuple -> nom."</td><td>".$tuple -> prenom."</td><td>".$tuple -> email."</td><td>".$tuple -> age."</td><td><a href='reset.php?choix=".$tuple -> id."'>supprimer</a></td></tr>";
			}
	}
	

?>
<a href="inscription1-2.html">Page principale</a><br><br>


</table>
