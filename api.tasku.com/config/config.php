<?php
	//Local
		$host 		= 'localhost';
		$database 	= 'gotasku';
		$user_name	= 'root';
		$password	= '';
	/*
		//production
		$database 	= 'gotasku';
		$user_name	= 'root';
		$password	= 'taskuP@ssw0rd#123';
	*/
	//$con 	= mysql_connect($host,$user_name,$password) or die(mysql_errno());
	//$db 	= mysql_select_db($database,$con) or die(mysql_errno());
	$pdo = null;
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $user_name, $password);
	} catch(PDOException $ex) {
		echo '{"result":["message":'.$ex->getMessage().']}';
		return;
	}
?>