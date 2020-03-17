<?php include('server.php')?>
<html>
	<head>
		<title> Login Form Design</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
		<div class = "left-box">
			<h1 align="center"> Login </h1>
			<form action="login.php" method="post">
				<p>Email</p>
				<input type = "text" name = "username" placeholder="Enter your username"/>
				<p>Password</p>
				<input type = "password" name = "password" placeholder="Enter your password"/>
				<button type="submit" name = "login_user">Login</button>
				<p>
					Forgot your password? <a href="forgotPass.html">Forgot Password</a>
				</p>
				<p>
					Don't have an account? <a href="signup.php">Sign up</a>
				</p>				
			</form>
	</div>
</body>
</html>
