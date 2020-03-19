<?php include('server.php')?>
<html>
	<head>
		<title> Login Form Design</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
		<div id="login-box">
		<div class = "login-page">
			<h1 align="center"> Login </h1>
			<form action="login.php" method="post">
				<?php include('errors.php');?>
				<p>Username</p>
				<input type = "text" name = "username" placeholder="Enter your username"/>
				<p>Password</p>
				<input type = "password" name = "password" placeholder="Enter your password"/>
				<button type="submit" name = "login_user">Login</button>
				<div class = "para-text">
				<p>
					<a href="forgotPass.html">Forgot your password?: Click here!!</a>
				</p>
				<p>
				  <a href="signup.php">Don't have an account?: Sign up</a>
				</p>
				</div>				
			</form>
		</div>
	</div>
</body>
</html>
