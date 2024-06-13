<?php

$url = "http://localhost/API/api.php?login=ruddy&pass=123456";
$me=json_decode(file_get_contents($url));
echo "<pre>".var_export($me,true)."</pre>";

echo "Suite prog";

$url="http://localhost/API/api.php?token=".$me->token."&verb=select&table=utilisateurs&champs=prenom&filter=prenom%20LIKE%20%27ruddy%27";
$users=json_decode(file_get_contents($url));
echo "<pre>".var_export($users,true)."</pre>";
$test= $users->data;
echo var_export($test[0]->prenom);
echo "<br>";


?>