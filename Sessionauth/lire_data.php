<?php

require_once("../connect.php");

?>

<form action="reset.php" method="get">
	<label for="1">Selectionner la personne a supprimer :</label>
	<select name="choix" id="1">
	<?php

	$req="SELECT * FROM utilisateurs;"; 
	$table_lign = $mysqli -> query($req);
	if($table_lign -> num_rows > 0) {    // si qqch est bien lu 
		while($tuple = $table_lign -> fetch_object()) {                       // SERT A LIRE LA TABLE tant qu elle envoi pas false ( fin de la table)
			
			echo "<option value=".$tuple->id." >" .$tuple -> prenom." ".$tuple -> nom. "</option>";  // affiche toute les donnee prenom et nom dasn des choix de mon select
			
		}
	
	}	
	?>
	</select>
	<br>
	<input type='submit' value ='Effacer'>

</form>


