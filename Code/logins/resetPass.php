<?php include('../server.php');?>
<html>
	<head>
		<title> Forgot password Form Design</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
		<div id="login-box">
		<div class = "login-page">
			<h1 align="center"> Choose your new password </h1>
			<form action="resetPass.php" method="post">
				<?php include('../errors.php');?>
				<p>You can reset your password here.</p>
				<br>
				<input type = "password" name = "pass1" placeholder="Password"/>
				<input type = "password" name = "pass2" placeholder="Confirm Password"/>
				<br> 
				<button type="submit" name = "pass_change">Reset Password</button>
			</form>
			</div>
	</div>
</body>
</html>
