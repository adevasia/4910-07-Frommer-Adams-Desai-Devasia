<?php include('../server.php');?>

<html>
	<head>
		<title> Forgot password Form Design</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
		<div class = "pass-box"> <br><br>
			<h1 align="center"> Security Check </h1>
			<form action="forgotPass.php" method="post">
<?php include('../errors.php');?>	
				<input type = "text" name = "username" placeholder = "enter your username"/>
				<input type = "text" name = "question" placeholder="What is a word that no-one knows"/>
			
				<br> 
				<button type="submit" name = "reset_pass">Submit</button>
			</form>
	</div>
</body>
</html>
