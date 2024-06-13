<?php
	header('Content-Type: application/json; charset=utf-8');
	require_once("api-func.php");
	
	if(isset($_GET["token"])){
		$user = token_log($_GET["token"]);
		if($user !== null){
			if(isset($_GET["verb"])){
				$verb = $_GET["verb"];
				switch ($verb) {
					case 'select' :
						$result = [];
						if(isset($_GET["table"])){
							//http://localhost/api.php?token=8F616EFE-AE5C-440F-BB38-3F7A32900E0F&verb=select&table=utilisateurs&fields=id,prenom,nom&filter=prenom%20LIKE%20%27Thom%%27

							$fields = isset($_GET["fields"]) ? $_GET["fields"] : "*";
							$filter = isset($_GET["filter"]) ? " WHERE ".$_GET["filter"] : "";
							$req = "SELECT ".$fields." FROM ".$_GET["table"].$filter.";";
							try {
								$data = [];
								$req=$mysqli->prepare($req);
								$req->execute();
								$curs=$req->get_result();
								//var_export($curs,true);
								if($curs->num_rows > 0){
									while($tuple=$curs->fetch_object()){
										array_push($data,$tuple);
									}
								}
								$result["result"]="Success";
								$result["data"]=$data;
							}
							catch (Exception $e) {
								$result["result"]="Error";
								$result["data"]=$e->getMessage();
							}
						}
						else {
							$result["result"]="Error";
							$result["data"]="Table non spécifiée";
						}
						echo json_encode($result);
						break;
					case 'insert' :
						$result = [];
						if(isset($_GET["table"])){
							//http://localhost/api.php?token=8F616EFE-AE5C-440F-BB38-3F7A32900E0F&verb=insert&table=utilisateurs&fieldset=prenom,nom&donnees=('Prenom','Nom'),('Prenom2','Nom2')
						
							$fieldset = isset($_GET["fieldset"]) ? $_GET["fieldset"]." " : " ";
							$donnees = $_GET["donnees"];
							//var_export($donnees);
							echo $req = "INSERT INTO ".$_GET["table"]." ".$fieldset." VALUES ".$donnees.";";
						}
						else {
							$result["result"]="Error";
							$result["data"]="Table non spécifiée";
						}
						echo json_encode($result);
						break;
					case 'update' :
						
						break;
					case 'delete' :
						
						break;
				}
			}
		}
	}
	else{
		echo json_encode(auth($_GET["login"],$_GET["pass"]));
	}
?>