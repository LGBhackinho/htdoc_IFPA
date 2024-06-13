
<?php


    // $temp = 12.872 /60; //min
    // $distance=32.5;  //km
    // $vitesse = $distance / $temp;
    // // echo "la vitesse pour une distance de 32,5 et un temps de 12,8 est de : $vitesse km/h";
    // echo "<p>";
    // echo "la vitesse pour une distance de 32,5 et un temps de 12,8 est de : " .round($vitesse,2) ." ".ceil($vitesse); // Autre facon d afficher une variable en concatenant  et fonction arrondi
    // echo "<p>";
   
    // echo"test $prenom  $nom";


    // Exercice n°2 :
    // Saisir un nom et un âge en utilisant l’instruction input() . Les afficher.
    // Refaire la saisie du nom, mais avec l’instruction raw_inpu() . L’afficher.
    // Enfin, utilisez la « bonne pratique » : recommencez l’exercice en transtypant les saisies effectuées
    // avec l’instruction raw_input() 

    ?>

    <!-- <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercice 2 PHP</title>
    </head>
    <body>
        <form action="ExerciePHP.php" method="GET">
            <label for="nom">Votre nom</label>
            <input  id="nom" type="text" name="nom">
            <label for="prenom">Votre prenom</label>
            <input type="text" name="prenom">
            <button>ENVOYER</button>
        </form>
    </body>
    </html> -->

    <!-- Exercice n°3 :
    Saisissez un flottant. S’il est positif ou nul, affichez sa racine, sinon affichez un message d’erreur.
    (Fonction racine : sqrt() ; il faut importer la fonction sqrt() du module math)  -->


    <?php
        // if(isset($_GET["nombre"])){
        //     $n=$_GET["nombre"];

        //     if($n>=0){
        //         try{
        //         $res=sqrt($n);
        //         }
        //         catch (error $e) {
        //             $res="erreur";
        //         }
        //     }
        //     else{
        //         $res="erreur";
        //     }
            
        // }
        // else {
        //     $n="";
        // }
        
    ?>

    <!-- <form action="ExerciePHP.php" method="GET">
        <label for="nom">Votre nom</label>
        <input  type="text" name="nombre" value="<?php echo ($n>=0)&&(is_numeric($n))?sqrt($n):"ERREUR"; ?>">   on verifie la variable nombre si defini sinon on affiche rien 
        <input  type="submit" value="envoyer">
        
    </form> -->
<?php
    // echo $e;
?>

<!-- Exercice 5 :
On désire sécuriser une enceinte pressurisée.
On se fixe une pression seuil et un volume seuil : pSeuil = 2.3, vSeuil = 7.41.
On demande de saisir la pression et le volume courant de l’enceinte et d’écrire un script qui simule le
comportement suivant :
 si le volume et la pression sont supérieurs aux seuils : arrêt immédiat ;
 si seule la pression est supérieure à la pression seuil : demander d’augmenter le volume de
l’enceinte ;
 si seul le volume est supérieur au volume seuil : demander de diminuer le volume de
l’enceinte ;
 sinon déclarer que « tout va bien ».
Ce comportement sera implémenté par une alternative multiple  -->
<?php
    // const pSeuil = 2.3;
    // const vSeuil = 7.41;
    // $pression = $_GET["p"];
    // $pression = $_GET["v"];

    // if (vSeuil>$_GET["v"] && pSeuil>$_GET["p"]) {
    //     echo "arret immediat";

    // }
?>


<!-- Exercice n°4 :
Saisir deux nombres, comparez-les pour trouver le « plus petit » et affichez le résultat.
Faire l’exercice en utilisant l’instruction ternaire (3 élèments):
<res> = <a> if <condition> else <b>  -->



    
    <form action="ExerciePHP.php" method="GET">
        <label for="n1">Votre premier nombre</label>
        <input  type="text" id="n1" name="nombre1" >   
        <label for="n2">Votre deuxieme nombre</label>
        <input  type="text" id="n2" name="nombre2" >   
        <input  type="submit" value="envoyer">
        
    </form>   

    <?php

     //$n1=$_GET["nombre1"];
    // $n2=$_GET["nombre2"];

    // if($n1>$n2){
    //     echo "$n2 est plus petit que $n1";
    // }
    // if($n2>$n1){
    //     echo "$n1 est plus petit que $n2";
    // }
    // elseif($n2===$n1){
    //     echo " les nombre sont egaux ";
    // }



    //Mode ternere
      //  echo $n1<$n2?$n1." est plus petit":$n2 " est plus petit";
    ?>

    <!-- Demander 2 nombres puis l afficher le plus grand et afficher la somme des deux et le produit des deux  -->
<?php
$n1=$_GET["nombre1"];
    $n2=$_GET["nombre2"];
?>
    <?php
        echo "vos nombres sont $n1 et $n2 <p>";
         echo $n1>$n2?$n1." est plus grand":$n2. " est plus grand";
    ?>
     <br>
     <?php
         echo $n1+$n2." est la somme";
    ?>
    <br>
     <?php
         echo $n1*$n2." est le produit";
    ?>
    <br>
    <?php
         echo $n2!=0?$n1/$n2." est la division":"impossible a calculer trou noir";
    ?>
    <br>
    <?php
         echo $n1!=0?$n2/$n1." est la division":"impossible a calculer trou noir";
    ?>
    <br>
    <?php
        $n1<$n2?$petit=$n1:$petit=$n2;
         echo ($n1+$n2)*$petit." est le bla bla";
        //  echo  $n1<$n2?($n1+$n2)*$n1." est le prodiut de la somme du + grand et + petot par le plus petit":($n1+$n2)*$n2." est le prodiut de la somme du + grand et + petot par le plus petit";
      
    ?>
    <br>
<?php
    echo $n1%2===1?$n1." est impaire ":$n1." est paire ";
    echo $n2%2===1?$n2." est impaire ":$n2." est paire";
    echo "<br>";
    echo floor($n1/$n2);
    echo"<br>";
    echo ($n1%$n2);
    
    ?>  

    