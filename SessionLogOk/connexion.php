

<?php


//////////////////////////////////////////////////////////////////
// CODE php A METTRE DASN LE BACK API ////////////////////////////
//////////////////////////////////////////////////////////////////

    header('content-Type: application/json; charset=utf-8');    // LIEN POUR GENERER LE JSON
    $reponse=[];

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

    // Affecte ma variable avec la requete SQL
     
    if ($CONNEXION){
        if(isset($_GET["password"])){
            
            $req=$mysqli->prepare("SELECT * FROM `utilisateur` WHERE email=?");   
            $password = $_GET["password"];
            $email = $_GET["email"];
            

            $req->bind_param("s",$email);
            $req->execute();
            $liste_data=$req->get_result();
            // echo $liste_data -> num_rows;
            if($liste_data-> num_rows > 0){           //Si j ai un resultat  a ma requete  
            
                $user = $liste_data -> fetch_object();
                // echo date('Y-m-d');
                

                // pour la verification du mot de passe il faut mettre le nom de la colonne de la table ici s appel mot_de_passe
                if (password_verify($password, $user->mot_de_passe)){
                    // echo " BRAVO VOUS ETES CONNECTE\n";
                    // echo " \n";
                    $reponse["status"]="ok";
                    $reponse["data"]=$user;
                    echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
                    //header('Location: http://localhost/profileUtilisateur.html');  // Permet d'afficher une autre page


                    
                
                }
                else{
                    $reponse["status"]="nok";
                    $reponse["data"]="MOT DE PASSE INCORRECT";
                    echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur 
                }
            }
            else{
                
                $reponse["status"]="nok";
                $reponse["data"]="Cet utilisateur n existe pas ";
                echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
            }
        }else{
        // echo "Champ mot de passe vide veuillez le saisir";
        }
    }   
    else {
        // echo "PAS DE CONNEXION";
    }
        


?>
