<?php include('server.php');?>

<html>
	<head>
		<title> Signup Form </title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
		<div id="login-box">
		<div class = "left-box">
			<h1 align="center"> Sign up </h1>
			<form action="signup.php" method="post">
				<?php include('errors.php');?>
				<input type = "text" name = "username" placeholder="Username" value="<?php echo $username; ?>"/>
				<input type = "text" name = "email" placeholder="Email" value="<?php echo $email; ?>"/>
				<input type = "password" name = "password" placeholder="Password"/>
				<input type = "password" name = "password2" placeholder="Confirm Password"/>
				<button type="submit" name = "signup_user">Submit</button>
				<p>
					Already a member? <a href="login.php">Sign in</a>
				</p>
			</form>
		</div>
	</div>
</body>
</html>
