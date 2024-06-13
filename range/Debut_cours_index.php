<?php

// Debut du cours sur le PHP



	$variable='coucou       ';    // Declaration de variable
	echo $variable;               // affiche la variable
	const test = 3.12222222 ;	//Declaration d une variable constante
	echo test;
	echo "\n<P>";	
	

	//phpinfo();  //affiche toutes les infos de la machine

	//echo $_SERVER['HTTP_USER_AGENT']; // affiche les infos du navigateur client
	
?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>UserAgent</title>
      <link rel="stylesheet" type="text/css" href="main.css" />
   </head>
   <body>
        <div id="page-container">
            <div id="content-wrap">
                Les informations sur le Navigateur sont :
                <?php
                    $AGENT=$_SERVER['HTTP_USER_AGENT'];
                    echo $AGENT;
                    echo("\n<P>");
                    if (stristr($AGENT,"MSIE")) {
                ?>
                <b>Vous semblez utiliser Internet Explorer !</b>
                <?php }
                    elseif (preg_match("/Firefox/i",$AGENT))
                    {
                ?>
                <b>Vous semblez utiliser Firefox !</b>
                <?php
                    }
                    elseif (preg_match("/chrome/i",$AGENT))
                    {
                ?>
                <b>Vous semblez utiliser Chrome !</b>
                <?php
                    }
                    elseif (preg_match("/Safari/",$AGENT))
                    {
                ?>
                <b>Vous semblez utiliser Safari !</b>
                <?php
                    }
                    else echo "Navigateur Inconnu !";
                ?>
            </div>
            <div id="footer">
                <a href="J1-Formulaire.php">Suite</a>
            </div>
        </div>
   </body>
</html>


