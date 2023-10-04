<?php 

	try {
		$str = "mysql:host=localhost; dbname=projet";

		$pdo = new PDO($str, 'root', '');
		
		
	} catch (PDOException $e) {
		$msg ='erreur PDO'.$e->getMessage();
		die($msg);
		
	}

 ?>