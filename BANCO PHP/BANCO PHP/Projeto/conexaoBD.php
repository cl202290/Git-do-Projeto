<?php
	/*conexaoBD.php*/
	try {
	//conexão PDO
	$db = 'mysql:host=143.106.241.3;dbname=cl202290;charset=utf8';
	$user = 'cl202290';
	$passwd = 'cl*27102001';
	$pdo = new PDO($db,$user,$passwd);

	$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch (PODException $e){
		$output = 'Impossivel conectar BD: ' .$e . '<br>';
		echo $output;
	}	

?>