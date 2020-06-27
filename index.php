<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Simple Chat Application</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
<link rel="shortcut icon" href="images/chaticon.png" />
</head>
<body>
<?php require 'login.php';?>
<?php require 'logout.php';?>
<?php require 'logs.php';?>

<?php 
if(!isset($_SESSION['username'])){
	userLoginForm();
} else {
?>

<div id="wrapper" class="row container align-center">
    <div id="menu" class="row">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
        <p class="logout"><a id="exit" class="btn btn-info" role="button" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox" class="row"><?php echo getAllMessages(); ?></div>
	    <form name="message" action="" method="post">
	        <input name="usermsg" type="text" id="usermsg" size="50" value=""/>
	        <input name="submitmsg" type="submit" class="btn btn-default" id="submitmsg" value="Send" />
	    </form>
</div>
<?php } ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	
	 //if a user clicks exit chat.
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});

	//If user submits the message.
	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("ajax/post.php", {msg: clientmsg});				
		$("input#usermsg").val("");

		return false;
	});

	//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "ajax/chatlogs.php",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}

	//loading the chat log every 1ms.
	setInterval (loadLog, 1000);
});
</script>
</body>
</html>