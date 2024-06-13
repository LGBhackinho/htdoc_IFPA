

    

<?php
	if(isset($_GET["action"])&&($_GET["action"]=="tirage")){
		if(isset($_GET["num"])&&($_GET["num"]!="")&&(count(explode(",",$_GET["num"]))<5)){
			$num=explode(",",$_GET["num"]);
		} else {
			$num=[];
		}
		do {
			$rand=rand(1,49);
		} while(array_search($rand,$num)!==false);
		array_push($num,$rand);
	} else {
		$num=[];
		$rand=rand(1,49);
		array_push($num,$rand);
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="main.css" />
		<title>Loto PHP</title>
	</head>
	<body>
		<div id="page-container">
			<div id="content-wrap">
				<form method="get" action="loto_2.php">
					<input type="text" name="num" value="<?php echo implode(",",$num); ?>" />
					<input type="hidden" name="action" value="tirage" />
					<input type="submit" value="Tirer un numÃ©ro" />
				</form>
				<table border="1">
				<?php
					for($i=0;$i<10;$i++) {
						echo "<tr>";
						for($j=1;$j<=5;$j++) {
							$val = (5*$i)+$j;
							if($val < 50){
								if(array_search($val,$num)!==false){
									echo "<td class='caseOK' bgcolor=red>".$val."</td>";
								} else {
									echo "<td class='case'>".$val."</td>";
								}
							}
						}
						echo "</tr>";
					}
				?>
			</div>
			<div id="footer">
				
			</div>
		</div>
	</body>
</html>
