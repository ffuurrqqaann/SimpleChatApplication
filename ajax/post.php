<?php
session_start();

require '../db/db_crud_util.php';

$dbConn = getDbConnection();

if($dbConn!=NULL) {
	if(isset($_SESSION['username'])){
	    $text = $_POST['msg'];
	    
	    $message = "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>";
	    
	    //Insert the message into the database.
	    postANewMessage($message, $dbConn);
	}		
}