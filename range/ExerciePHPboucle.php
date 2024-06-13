


    <!-- <form action="ExerciePHPboucle.php" method="GET">
        <label for="n1">Votre adresse EMAIL</label>
        <input  type="text" id="n1" name="email" >   
        
        <input  type="submit" value="envoyer">
        
    </form>    -->
    
    
<?php
    // $email=$_GET["email"];
    // $pos_a=strpos($email,"@");
    // $pos_point=strpos($email,".");

    //  $n_adresse=((strlen($email))-1-$pos_a);  //nombre de 
    //  $n_fin=((strlen($email))-1-$pos_point);
    //  $n_debut=($n_adresse-$n_fin-1);


    // if (($n_adresse>=5 && $n_adresse<=255)&&
    //          $n_fin>=2 && 
    //          ($n_debut>=3 && 
    //          $n_debut<=126)&&
    //          ($pos_a!==false)&&
    //          ($pos_point!==false)&&
    //          ($pos_a<$pos_point)&&
    //          ($pos_a>0)&&
    //          ($pos_point<(strlen($email))-1) )
    // {
       
    //             echo "Votre email est valide";

    // }
    // else{
    //     echo "Format non valide";
    // }
    // echo "<br>";
 

    // echo "<br>";
    // echo "<br>";
    // echo "position de @ : $pos_a";
    // echo "<br>";
    // echo "position du point :$pos_point";
    // echo "<br>";
    // echo "Nomnre max de caractere total est de : ".strlen($email);

?>


<form    action="ExerciePHPboucle.php" method="GET">
        <label for="n1">Votre lettre a trouver</label>
        <input  type="text" id="n1" name="letter" >   
        
        <input  type="submit" value="envoyer">
        
    </form>   
<html>
<table border='1'>
    
  <?php 
  


    // $nbre_aleatoire1=rand(1,49);
    // $nbre_aleatoire2=rand(1,49);
    // $nbre_aleatoire3=rand(1,49);
    // $nbre_aleatoire4=rand(1,49);
    // $nbre_aleatoire5=rand(1,49);

    // while ($nbre_aleatoire1===$nbre_aleatoire2||$nbre_aleatoire1===$nbre_aleatoire3||$nbre_aleatoire1===$nbre_aleatoire4||$nbre_aleatoire1===$nbre_aleatoire5){
    //     $nbre_aleatoire1=rand(1,49); 
    // }
    // while ($nbre_aleatoire2===$nbre_aleatoire1||$nbre_aleatoire2===$nbre_aleatoire3||$nbre_aleatoire2===$nbre_aleatoire4||$nbre_aleatoire2===$nbre_aleatoire5){
    //     $nbre_aleatoire2=rand(1,49); 
    // }
    // while ($nbre_aleatoire3===$nbre_aleatoire1||$nbre_aleatoire3===$nbre_aleatoire2||$nbre_aleatoire3===$nbre_aleatoire4||$nbre_aleatoire3===$nbre_aleatoire5){
    //     $nbre_aleatoire3=rand(1,49); 
    // }
    // while ($nbre_aleatoire4===$nbre_aleatoire1||$nbre_aleatoire4===$nbre_aleatoire2||$nbre_aleatoire4===$nbre_aleatoire3||$nbre_aleatoire4===$nbre_aleatoire5){
    //     $nbre_aleatoire4=rand(1,49); 
    // }
    // while ($nbre_aleatoire5===$nbre_aleatoire1||$nbre_aleatoire5===$nbre_aleatoire2||$nbre_aleatoire5===$nbre_aleatoire3||$nbre_aleatoire5===$nbre_aleatoire4){
    //     $nbre_aleatoire5=rand(1,49); 
    // }

    $case=1;
    $grille=[];
    
    for ($i=1;$i<=5;$i++){
        $num=rand(1,49);
        while (array_search($num, $grille)!==false){
            $num=rand(1,49);
        }
        array_push($grille,$num);

    }
    

    for($j = 1;$case <49;$j++){

      for($i = 1;$i <=5;$i++){
            if($case===50){
                echo "<td width='10' height='10'></td>"; 
                }
            elseif(array_search($case,$grille)===false){
                echo "<td width='10' height='10'>$case</td>"; 
            }
            else{
                echo "<td width='10' height='10' bgcolor='red'>$case</td>"; 
            }
            
        
            $case++;   
        }
        echo "<tr width='10' height='10'></tr>"; 
        
    }
?>
    
</table>
</html>

<br>
<?php

    

    $letter=$_GET["letter"];
    
    $tableau=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p"];
    
    $i=0;
    
    while(($tableau[$i]!==$letter)&&($i<count($tableau)-1)){
            $i++;
        }
    // $letter_MAJ=$tableau[$i];
    $letter_MAJ=strtoupper($tableau[$i]);
    if($tableau[$i]===$letter){
        echo "la lettre " .$letter_MAJ  ." à été trouvé en position ".$i+1;
    }
    else{
        echo "non trouve";
    }
    $test="42";
     echo "<br>";
    var_dump($test);
    // echo" <br>";
    // var_export($tableau);
    
    // $i=77000;
    
    // while($i<=77999){
    //     echo "$i <br>";
    //         $i++;
           
    //     }
    
?>
<html>
    <br>
    <br>
<?php

        for ($i=1;$i<=10;$i++){
            echo " la table de multiplication de 5 est : ".$i." x 5"." = ".$i*5 ."<br>";
        }
?>

<?php

        for ($i=1;$i<=10;$i++){
            echo "<br>";
            for ($j=0;$j<$i;$j++){
                if ($j>=1&&$j<$i){
                    echo " ";
                }
                echo "$i";
                
            }
            
        }
?>


<?php

// for ($i=1;$i<=10;$i++){
//     echo "<br>";
//     for ($j=0;$j<$i;$j++){
        
//         if ($j>=1&&$j<$i){
//             echo " ";
//         }
//         echo "*";

        
//     }
    
// }

?>
<br>
<?php
// Nombre total de lignes de la pyramide


// Boucle pour générer chaque ligne de la pyramide
$n=10;
for ($i = 1; $i <= $n; $i++) {
    
    for ($j = $n-$i; $j > 0; $j--) {
        echo "&nbsp;"; 
    }
    for ($j = $i; $j > 0; $j--) {
        echo "* "; 
    }
    
    echo "<br>"; 
}
?>
<?php


function table($a,$b){
    $c=1;
    $resultat=$a*$b*$c;
    
    
    return "le resultat est : $resultat ";  
}


// table(25,5); //Appel de la fonction 

?>
</html>



