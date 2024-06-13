<?php

require_once("connect.php");

?>


<?php
		$prenom=$_GET['prenom'];
		$nom=$_GET['nom'];
		$email=$_GET['email'];
		$annee=$_GET['annee'];
		$ville=$_GET['ville'];

		$req="INSERT INTO utilisateurs (id, prenom, nom, email,annee_naissance,ville) VALUES (null,'$prenom','$nom','$email',$annee,'$ville');"; 
		$table_lign = $mysqli -> query($req);
		if($mysqli->affected_rows > 0) {
			
				echo "UTILISATEUR AJOUTE";
				// header('Location: http:/index2.html');  //permet d afficher une autre page
			
				

			}
		
		
		$mysqli-> close();
	?>

<?php
		// $req="SELECT id, prenom, nom, email FROM utilisateurs;"; 
        // $table_lign = $mysqli -> query($req);
		// if($table_lign -> num_rows > 0) {    // si qqch est bien lu 
		// 	while($tuple = $table_lign -> fetch_object()) {                       // SERT A LIRE LA TABLE
		// 		// echo "<tr><td>".$tuple -> prenom ."</td><td>".$tuple -> nom ."</td><td>".$tuple -> email ."</td></tr>";
        //         echo "<tr><td>".$tuple -> prenom ."</td><td>".$tuple -> nom ."</td><td>".$tuple -> email ."</td></tr>";
               
                

		// 	}
           
		// }
       
?>
<br>
<a href="index.html">Page Principale</a>