<?php

////// !!!!!!!!!!!!!    VERSION SANS LA FONCTION PREPARE QUI SERT A SE PROTEGER DES INJECTIONS SQL !!!!!!!!!!!!!!!!!





//  require_once("../connect.php");


// // Affecte ma variable avec la requete SQL
// $req= "UPDATE utilisateurs SET prenom = '".$_GET['prenom']."',nom = '".$_GET['nom']."',email = '".$_GET['email']."' WHERE id = '".$_GET['id']."';";

// $mysqli -> query($req); // envoi de la requete sans stockage   !!! en modification on affecte rien 

// // Recupere le nombre de ligne affecte  !!!!!   affected row quand on modifie sinon num_rows

// if($mysqli-> affected_rows > 0){         ///   !!! en modification on affecte rien et on utilise MYSQLI
    
//     echo "UTILISATEUR MIS A JOUR";
		
// }
// else{
//     echo " PAS DE MISE A JOUR EFFECTUE";
   
// }
// $mysqli-> close();
?>


<?php

    require_once("../connect.php");



    // Affecte ma variable avec la requete SQL

    "UPDATE utilisateurs SET prenom = '".$_GET['prenom']."',nom = '".$_GET['nom']."',email = '".$_GET['email']."' WHERE id = '".$_GET['id']."';";
    $req=$mysqli->prepare("UPDATE utilisateurs SET prenom = ?,nom = ?,email = ? WHERE id = ?;");   
    $req->bind_param("sssi",$_GET['prenom'],$_GET['nom'],$_GET['email'],$_GET['id']);
    $req->execute();
    //$liste_data=$req->get_result();

    if($mysqli-> affected_rows > 0){         ///   !!! en modification on affecte rien et on utilise MYSQLI
        
        echo "UTILISATEUR MIS A JOUR";
            
    }
    else{
        echo " PAS DE MISE A JOUR EFFECTUE";
    
    }
    $mysqli-> close();
?>