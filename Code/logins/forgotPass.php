<?php include('../server.php');?>

<html>
	<head>
		<title> Forgot password Form Design</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
		<div class = "pass-box"> <br><br>
			<h1 align="center"> Forgot Password? </h1>
			<form>
				<p>You can reset your password here.</p>
				<br>
				<div class="box">
				<input type = "text" name = "username" placeholder = "enter your username from the database"/>
				<input type = "text" name = "question" placeholder="What is a word that noone knows"/>
			</div>
				<br> 
				<button type="submit" name = "reset_pass">SUBMIT</button>
			</form>
	</div>
</body>
</html>