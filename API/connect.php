<?php
	/*$SERVEUR="localhost";							//Nom du serveur
	$LOGIN="root";									//Nom d'utilisateur
	$MDP="";										//Mot de passe
	$MABASE="test";			//Nom de la base
	$CONNEXION=mysql_connect($SERVEUR,$LOGIN,$MDP);	//Requ�te de connexion
	mysql_select_db($MABASE);						//S�lection de la BDD
	$req="SELECT * FROM table WHERE 1;";
	$curs = mysql_query($req, $CONNEXION);
	if(mysql_num_rows($curs) == 0){
		//Aucune ligne retourn�e
	} else {
		while($tuple=mysql_fetch_array($curs)) {
			//On traite les enregistrements
			//Si on insert, update ou delete : if(mysql_affected_rows($CONNEXION) > 0)
		}
	}
	*/
?>

<?php
	//ini_set('display_errors', 1);
	$SERVEUR="localhost";							//Nom du serveur
	$LOGIN="root";									//Nom d'utilisateur
	$MDP="";										//Mot de passe
	$MABASE="test";			//Nom de la base
	$mysqli = new mysqli($SERVEUR,$LOGIN,$MDP,$MABASE);
	if($mysqli->connect_errno) {
		exit ("Echec lors de la connexion � MySQL : " . $mysqli->connect_error);
		$CONNEXION=false;
	}
	else {
		$CONNEXION=true;
		// $req="SELECT * FROM table WHERE 1;";
		// $curs = $mysqli -> query($req);
		// if($curs -> num_rows > 0) {
		// 	while($tuple = $curs -> fetch_object()) {
		// 		//On traite les enregistrements
		// 		//Si on insert, update ou delete : if($mysqli->affected_rows > 0)
		// 	}
		// }
	}
	
?>
