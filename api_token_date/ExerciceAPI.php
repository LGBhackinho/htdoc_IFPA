

<?php
//////////////////////////////////////////////////////////////////
// CODE php A METTRE DASN LE BACK API ////////////////////////////
//////////////////////////////////////////////////////////////////



    header('content-Type: application/json; charset=utf-8');    // LIEN POUR GENERER LE JSON
    $reponse=[];
    require_once("../connect.php");

    

    /// FONCTION DE GENERATION DE TOKEN
    function genToken(){
        if(function_exists('com_create_guid')===true){
            return trim(com_create_guid(),"{}");
        }
        else {
            return sprintf("%04X%04X-%04X-%04X-%04X-%04X%04X%04X",
                mt_rand(0,65535),
                mt_rand(0,65535),
                mt_rand(0,65535),
                mt_rand(16394,20479),
                mt_rand(32768,49151),
                mt_rand(0,65535),
                mt_rand(0,65535),
                mt_rand(0,65535));
        }
    }
    //FONCTION DE CALCUL DE LA DATE D EXPIRATION
    function getExpire ($date,$days=8){
        return date('y-m-d',strtotime($date.'+ '.$days.' days'));
    }

    // Affecte ma variable avec la requete SQL
        // VERSION SANS LA FONCTION PREPARE (QUI SERT DE SECURITE POUR PAS QUE L UTILISATEUR MODIFIE LES CHAMPS A LA VOLE  INJECTION SQL) 
    if ($CONNEXION){
        if(isset($_POST["token"])){
            $req=$mysqli->prepare("SELECT * FROM `utilisateurs` WHERE token= ? ");   
            $req->bind_param("s",$_POST["token"]);
            $req->execute();
            $liste_data=$req->get_result();
            if($liste_data-> num_rows > 0){           //Si j ai un resultat  a ma requete  
            
                $user = $liste_data -> fetch_object();
                echo date('Y-m-d');
                //echo "<pre>". var_export($user,true)."</pre>";
                if ($user->expire < date('Y-m-d')){
                    $reponse["status"]="nok";
                    $reponse["data"]="TOKEN expiré";
                    echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
                }
                
            
                else{
                    $req=$mysqli->prepare("UPDATE utilisateurs SET expire=? where id=?");
            // echo genToken()."<br>";  //TOKEN GENERE
                // echo date('y-m-d')."<br>";  //DATE Du JOUR
            // echo getExpire(date('y-m-d'));  //DATE D EXPIRATION

            
                $user->expire=getExpire(date('Y-m-d'));
                $reponse["status"]="ok";
                $reponse["data"]=$user;
                echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
            
                $req->bind_param("si",$user->expire,$user->id);
                $req->execute();
                }
            
            }
            else{
                $reponse["status"]="nok";
                $reponse["data"]="TOKEN invalide";
                echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
            }
            

        }
        else{
            $req=$mysqli->prepare("SELECT * FROM `utilisateurs` WHERE login= ? and password= ? ");   
            $req->bind_param("ss",$_POST["login"],$_POST["password"]);
            $req->execute();
            $liste_data=$req->get_result();
            if($liste_data-> num_rows > 0){           //Si j ai un resultat  a ma requete  
                
                $user = $liste_data -> fetch_object();

                //echo "<pre>". var_export($user,true)."</pre>";
                 $req=$mysqli->prepare("UPDATE utilisateurs SET token=?, expire=? where id=?");
            // echo genToken()."<br>";  //TOKEN GENERE
                // echo date('y-m-d')."<br>";  //DATE Du JOUR
            // echo getExpire(date('y-m-d'));  //DATE D EXPIRATION
                $reponse["status"]="ok";
                $reponse["data"]=$user;
                echo json_encode($user);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
                $user->token=genToken();
                $user->expire=getExpire(date('y-m-d'));
            
                $req->bind_param("ssi",$user->token,$user->expire,$user->id);
                $req->execute();
            
            }
            else{
                $reponse["status"]="nok";
                $reponse["data"]="Nom d utilisateur ou pas de passe incorrect";
                echo json_encode($reponse);  // Affectation au format JSON  de mon objet USER qui correspond a l utilisatur
            }
            
        }

        
    }   
    else {
        echo "PAS DE CONNEXION";
    }

?>