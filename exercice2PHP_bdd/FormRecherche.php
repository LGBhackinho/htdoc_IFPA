<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="color: red; font-size: 20px;" >Voici les detail de <?php echo $_GET['search']; ?></p>
    
    
    
        
        <?php

            require_once("../connect.php");
            // Affecte ma variable avec la requete SQL
                // VERSION SANS LA FONCTION PREPARE (QUI SERT DE SECURITE POUR PAS QUE L UTILISATEUR MODIFIE LES CHAMPS A LA VOLE) 
            if ($CONNEXION){
                $search='%'.$_GET['search'].'%';
                $req=$mysqli->prepare("SELECT * FROM `utilisateurs` WHERE nom LIKE ? OR email LIKE ? ");   
                $req->bind_param("ss",$search,$search);
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
    
</form>  

</body>
</html>