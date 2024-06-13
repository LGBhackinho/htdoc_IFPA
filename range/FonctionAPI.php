
    <?php

// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>FonctionAPI</title>
// </head>
// <body>

//     <form action="FonctionAPI.php" method="get">
//         <label>TABLE : <input type="text" name="table" > </label>
//         <label> CHAMPS : <input type="text" name=champs > </label>
//         <label>FILTRES : <input type="text" name=filtre  > </label>
//         <input type="submit" value=ENVOYER>
        
    
    
    
//     </form>
        header('content-Type: application/json; charset=utf-8');    // LIEN POUR GENERER LE JSON

        //UTILISATION http://localhost/FonctionAPI.php?table=<table>[&champs=<champs,champs,...>]&[filtre=champ1 LIKE '<valuer>']



        function genRequete($table,$champs="*",$filtre=""){
            $req="SELECT ".$champs." FROM ".$table;
            if ($filtre!==""){
                $req.=" WHERE ".$filtre;
            }
            $req.=";";
            return $req;
        }
         

         require_once("connect.php");
        if ( (isset($_GET["table"]))&&($_GET["table"]!=="")) {
            if (( (isset($_GET["table"]))&&($_GET["table"]!=="")) && ((isset($_GET["champs"]))&&($_GET["champs"]!=="")) && ((isset($_GET["filtre"]))&&($_GET["filtre"]!==""))){
                $req=$mysqli->prepare(genRequete($_GET["table"],$_GET["champs"],$_GET["filtre"]));   
            }
            elseif (( (isset($_GET["table"]))&&($_GET["table"]!==""))  && ((isset($_GET["champs"]))&&($_GET["champs"]!==""))){
                $req=$mysqli->prepare(genRequete($_GET["table"],$_GET["champs"]));
            }
            elseif (( (isset($_GET["table"]))&&($_GET["table"]!==""))  && ((isset($_GET["filtre"]))&&($_GET["filtre"]!==""))){
                $req=$mysqli->prepare(genRequete($_GET["table"],$_GET["filtre"]));
            }
            elseif ( (isset($_GET["table"]))&&($_GET["table"]!=="")){
                $req=$mysqli->prepare(genRequete($_GET["table"]));
            }
            $req->execute();
            $liste_data=$req->get_result();
            $reponse=[];
                if($liste_data-> num_rows > 0){           //Si j ai un resultat  a ma requete  
                
                    
                    while($tuple = $liste_data -> fetch_object()){
                        array_push($reponse,$tuple);
                         
                    
                        
                        }
                   
                }
                echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
        }
//         </body>
// </html>
    ?>
    
