<?php

function getDbConnection() {
	
	$dbHost 	= "127.0.0.1:3306";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName		= "simplechatapplication";
	
	$conn = "";
	
	try {
		/* Attempt to connect to MySQL database */
		$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $conn;
	} catch (PDOException $exception) {
		die("Connection Error : ".$exception->getMessage());
	}	
	
	return NULL;
}

function postANewMessage($msg, $conn) {
	
	try {
		//insert query.
		$sqlQuery = 'INSERT INTO logs (message) VALUES ("'.$msg.'")';
		echo $sqlQuery;
		$conn->exec($sqlQuery);
	} catch (PDOException $exception) {
		die("Error during query execution -> ".$exception->getMessage());
	}	
	
	$conn = NULL;
}

function getAllLogs($conn) {
	$result = "";
	try {
		$stmnt = $conn->query("SELECT * FROM logs");
		while ($row = $stmnt->fetch()) {
			$result.=$row["message"];
		}
		
		return $result;
	} catch (PDOException $exception) {
		die("Exception occured while returning all the records -> ".$exception->getMessage());
	}
	
	return $result;
	
}

function isUserAlreadyExists($conn, $username) {
	
	$result = "false";
	try {
		$stmnt = $conn->query("SELECT * FROM users WHERE username='".$username."'");
		$row = $stmnt->fetch();
		
		if(is_array($row) && count($row)>0) {
			$result = "true";
		}
		return $result;

	} catch (PDOException $exception) {
		die("Exception occured while returning all the records -> ".$exception->getMessage());
	}
	
	return $result;
}