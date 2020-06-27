<?php
session_start();
 
function userLoginForm(){
    echo'
    <div class="container">
    	<div class="row">
    		<div class="form_bg">
			    <form action="index.php" method="post" id="loginForm">
			    	<h3 class="text-center">Enter a Username</h2>
			    	<br/>
			    	<div class="form-group">
			    		<input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
			    	</div>
			    	<br/>
			    	<div class="align-center">
			        	<button type="submit" name="user" id="user" class="btn btn-default" /> Enter </button>
			        </div>
			    </form>
		    </div>
		</div>
    </div>
    ';
}
 
if(isset($_POST['user'])){
    if($_POST['username'] != "") {
		$_SESSION['username'] = stripslashes(htmlspecialchars($_POST['username']));
    }
    else {
        echo '<span class="error">Please type in a username!!!</span>';
    }
} 
?>