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

?>


<?php
	
	$nom=$_GET['nom'];
    $prenom=$_GET['prenom'];
	$age=$_GET['age'];
	$metier=$_GET['metier'];
    $annee_exp=$_GET['annee_exp'];
    $langue=$_GET['langue'];
    $projet=$_GET['projet'];
    $email=$_GET['email'];
    $mdp=$_GET['mdp'];
	
	
	

	// Hasher le mot de passe
	$hashed_password = password_hash($mdp, PASSWORD_BCRYPT);
	// Préparer la requête SQL
	
	$req = $mysqli->prepare("INSERT INTO utilisateur (nom, prenom, age, metier,annees_experience,langues_parlees,projet_professionnel, email,mot_de_passe ) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");

	// Vérifier la préparation de la requête
	if ($req === false) {
		echo "Erreur de préparation de la requête: " . $mysqli->error;
		exit();
	}

	// Lier les paramètres
	$req->bind_param("ssisissss", $nom, $prenom,$age,$metier,$annee_exp, $langue, $projet, $email,$hashed_password);

	// Exécuter la requête
	if ($req->execute()) {
		echo "UTILISATEUR AJOUTE\r\n";
		// header('Location: http:/index2.html');  // Permet d'afficher une autre page
        
        echo " \r\n";
        $req=$mysqli->prepare("SELECT * FROM `utilisateur` WHERE email=?");   
                    

        $req->bind_param("s",$email);
        $req->execute();
        $liste_data=$req->get_result();
        echo $liste_data -> num_rows;
        if($liste_data-> num_rows > 0){           //Si j ai un resultat  a ma requete  
        
            $user = $liste_data -> fetch_object();
            echo date('Y-m-d');
            
            
                $reponse["status"]="ok";
                $reponse["data"]=$user;
                echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur


                
        }     
          
	} 
    else {
		echo "Erreur: " .$req->error;
	}

	// Fermer la déclaration et la connexion
	$req->close();
	$mysqli->close();
?>

<br>
<a href="inscription1-2.html">Page Principale</a>

