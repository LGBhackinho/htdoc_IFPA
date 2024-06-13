<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="color: red; font-size: 20px;" >Version de code classique pour envoi mais possible injection SQL dasn le ou les champs</p>
     <form action="update.php" method="get">
        
            <?php

                require_once("../connect.php");
                // Affecte ma variable avec la requete SQL
               // $req= "SELECT * FROM utilisateurs WHERE id = '".$_GET['choix']."';";     VERSION DE COTE SANS LA FONCTION sprintf()

                // VERSION SANS LA FONCTION PREPARE (QUI SERT DE SECURITE POUR PAS QUE L UTILISATEUR MODIFIE LES CHAMPS A LA VOLE) 
                
                $req= sprintf("SELECT * FROM utilisateurs WHERE id = '%s';",$_GET['choix']);   // Version pour cote avec sprint()

                $liste_data=$mysqli -> query($req); // Envoi la requete et retourne en brute   a faire seulement quand  on lit la table

                if($liste_data-> num_rows > 0){
                    
                    while($tuple = $liste_data -> fetch_object()){

                        echo "<label for=''>Prenom : </label>";
                        echo "<input type='text' name='prenom' VALUE='".$tuple->prenom."'><br>";
                        echo "<label for=''>Nom : </label>";
                        echo "<input type='text' name='nom' VALUE='".$tuple->nom."'><br>";
                        echo "<label for=''>Email : </label>";
                        echo "<input type='text' name='email' VALUE='".$tuple->email."'><br>";
                        echo "<input type='hidden' name='id' VALUE='".$tuple->id."' >";
                      
                        
                        }
                     }
             ?>
        <input type='submit' VALUE='Mettre a jour'>  <br><br>
        <p style="color: red; font-size: 20px;" >Version de code avec la fonction PREPARE qui aide a l injection SQL</p>

<!-- VERSION DU CODE AVEC LA FONCTION PREPARE POUR PREVENIR DES HACKER -->

    </form>   
    
    <form action="update.php" method="get">
        
        <?php

            require_once("../connect.php");
            // Affecte ma variable avec la requete SQL
                // VERSION SANS LA FONCTION PREPARE (QUI SERT DE SECURITE POUR PAS QUE L UTILISATEUR MODIFIE LES CHAMPS A LA VOLE) 
            if ($CONNEXION){
                $req=$mysqli->prepare("SELECT * FROM utilisateurs WHERE id = ?;");   
                $req->bind_param("i",$_GET['choix']);
                $req->execute();
                $liste_data=$req->get_result();
                if($liste_data-> num_rows > 0){
                    
                    while($tuple = $liste_data -> fetch_object()){

                        echo "<label for=''>Prenom : </label>";
                        echo "<input type='text' name='prenom' VALUE='".$tuple->prenom."'><br>";
                        echo "<label for=''>Nom : </label>";
                        echo "<input type='text' name='nom' VALUE='".$tuple->nom."'><br>";
                        echo "<label for=''>Email : </label>";
                        echo "<input type='text' name='email' VALUE='".$tuple->email."'><br>";
                        echo "<input type='hidden' name='id' VALUE='".$tuple->id."' >";
                    
                        
                        }
                    }
                }
         ?>
    <input type='submit' VALUE='Mettre a jour'>  
</form>  

</body>
</html>