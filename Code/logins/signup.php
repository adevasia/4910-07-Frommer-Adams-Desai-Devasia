<?php include('../server.php');?>

<html>
	<head>
		<title> Signup Form </title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.check').click(function() {
					$('.check').not(this).prop('checked', false);
				});
			});
</script>
	</head>
<body>
		<div id="login-box">
			<div class = "left-box">
<h1 align="center"> Sign up </h1>
			<form action="signup.php" method="post">
				<?php include('../errors.php');?>
				<input type = "text" name = "username" placeholder="Username" value="<?php echo $username; ?>"/>
				<input type = "text" name = "email" placeholder="Email" value="<?php echo $email; ?>"/>
				<input type = "password" name = "password" placeholder="Password"/>
				<input type = "password" name = "password2" placeholder="Confirm Password"/><br>
				<?php
				  $db = new mysqli("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

				  $resultSet = $db->query("SELECT name FROM company");

				  $color1 = "lightblue";
				  $color2 = "teal";
				  $color = $color1;
				  $select = "Select";

				  // Check if an error happened when connecting.
				  if ($db->connect_error) {
					echo("Connection failed");
				  }
				?>
				<label for="company">Select your company from below:</label>
				<select name="company" method="post">
				<?php
				while($rows = $resultSet->fetch_assoc())
				{
					$color == $color1 ? $color = $color2 : $color = $color1;

					$company_name = $rows['name'];
					echo "<option value='$company_name' style='background:$color;'>$company_name</option>";
				}
				?>
				</select><br><br>
				<input type="checkbox" name="Driver" class="check" value = "Driver"/>Driver 
				<input type="checkbox" name="Sponsor" class="check" value = "Sponsor"/>Sponsor 
				<input type="checkbox" name="Administrator" class="check" value="Administrator"/>Administrator<br>
				<button type="submit" name = "signup_user">Submit</button>
				<div class = "para-text">
					<p>
						<a href="login.php">Already have an account?: Sign up</a>
					</p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
