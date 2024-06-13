<?php

require_once("connect.php");

//   requete pour inserer une ligne dasn ma base 

// if ($CONNEXION){
//     echo ("CONNECTE");
//     $mysqli -> query("INSERT INTO DWWM  VALUES ('','ruddy', 'MARIA')");
// }

// if($mysqli->affected_rows > 0){
//     echo " c est ok ligne insere";
// }

//   requete pour recuperer qqch de ma base

// $req="SELECT * FROM table WHERE 1;";   // je recupere de ma table le champ 1
		// $curs = $mysqli -> query($req);
		// if($curs -> num_rows > 0) {
		// 	while($tuple = $curs -> fetch_object()) {
		// 		//On traite les enregistrements
		// 		//Si on insert, update ou delete sans affecter dans $curs : if($mysqli->affected_rows > 0)
		// 	}
		// }

        //$req="SELECT * FROM utilisateurs;";   // je recupere de ma table utilisateur
?>
<table border='1'>
    <tr><th>Prenom</th><th>Nom</th><th>Email</th></tr>
<?php
		$req="SELECT id, prenom, nom, email FROM utilisateurs;"; 
        $table_lign = $mysqli -> query($req);
		if($table_lign -> num_rows > 0) {
			while($tuple = $table_lign -> fetch_object()) {
				// echo "<tr><td>".$tuple -> prenom ."</td><td>".$tuple -> nom ."</td><td>".$tuple -> email ."</td></tr>";
                echo "<tr><td>".$tuple -> prenom ."</td><td>".$tuple -> nom ."</td><td>".$tuple -> email ."</td></tr>";
               
                

			}
           
		}
       
?>

<?php
		$req="INSERT INTO utilisateurs (id, prenom, nom, email) VALUE (NULL,'ruddy','MARIA','ruddy@gmail.com');"; 
        $table_lign = $mysqli -> query($req);
		if($mysqli->affected_rows > 0){
			     echo " c est ok ligne insere";
			}
		// if($mysqli->affected_rows > 0) {
		// 	while($tuple = $table_lign -> fetch_object()) {
        //         echo "UTILISATEUR AJOUTE";
               
                

		// 	}
           
		// }
        $mysqli-> close();
?>
</table>