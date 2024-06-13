
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selection utilisateur</title>
</head>
<body>

<form action="FormUpdate.php" method="get">
    <select name="choix" id="liste">   
        
    

        <?php

        require_once("../connect.php");

        
        $req= " SELECT  * FROM utilisateurs;";   // Affecte ma variable avec la requete SQL
        $liste_data=$mysqli -> query($req); // Envoi la requete et retourne en brute

        if($liste_data-> num_rows > 0){
            
            while($tuple = $liste_data -> fetch_object()){
                echo "<option value='".$tuple->id."'>".$tuple->nom." ".$tuple->prenom."</option>";
                

            }
        }
        ?>
            <input type="submit" VALUE='envoye'>

</select> 
</form>
<?php

?>



</body>
</html>