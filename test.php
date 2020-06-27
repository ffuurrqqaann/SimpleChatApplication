<?php
session_start();

require 'db/db_crud_util.php';

$dbConn = getDbConnection();

$msg = "<div class='msgln'>(3:07 PM) <b>faizan</b>: testing<br></div>";


for ($x=1;$x<=5000;$x++) {
	
	postANewMessage($msg, $dbConn);	
	
}





/*if(isset($_SESSION['username'])){
    $text = "This is a test message.";
    
    $message = "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>";
    
    //Insert the message into the database.
    postANewMessage($message);
    
}*/