<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: add-post.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
    <a class="navbar-brand" href="../index.php">Home</a>
	
    
    <div class="navbar">
		<ul class="navbar-nav text-right">
		<li class="nav-item active">
		</li>
		
		</ul>
    </div>
</nav>

<div id="login" class="container-fluid">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: add-post.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
     </br> </br>
    <center> <h1>Login</h1> </center> </br> </br>
	<center> <form action="" method="post"class="form-group">
	<p><label> Username</label><input type="text" name="username" value="" class="form-control" style="width:25%" /></p>
	<p><label> Password </label><input type="password" name="password" value="" class="form-control" style="width:25%" /></p>
	<center> <p><label></label><input type="submit" name="submit" value="Login" class="btn btn-primary"  /></p> </center>
	<a href="add-user.php"  class="btn btn-danger" role="button">Register</a>
	
	</form> </center>

</div>
</body>
</html>
