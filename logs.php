<?php
require 'db/db_crud_util.php';

function getAllMessages() {
	$dbConn = getDbConnection();
	
	return getAllLogs($dbConn);
}