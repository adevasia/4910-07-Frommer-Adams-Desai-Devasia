<!--
Allows the driver to report their good behavior
-->

<!-- need to disable buttons after click, onClick works but 
it doesn't send the data over -->

<?php include('../server.php');?>
<?php mysqli_select_db($db, 'cloud337');?>

<html> 
      
<head> 
    <title> 
        What good behavior have you displayed today? 
    </title> 
	<link rel="stylesheet" type="text/css" href="../navigation.css">
	<link rel="stylesheet" type="text/css" href="home_bg.css">
</head> 
  
<body class ="style"> 
    <ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="driverprof.php"><img src="profpic.png" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="driver_home.html">HOME</a>
                <a href="../catalog/catalog_home.php">CATALOG</a>
                <a href="points.php">POINTS</a>
                <a href="#">PURCHASES</a>
                <a href="#">COMPANY</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
        <button class="dropbtn2"><li><a href="../catalog/shoppingCart.html"><img src="../catalog/cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

    </ul>  
	
    <h1 style="color:black;"> 
        Reward System 
    </h1> 
      
    <h4 style="color:black;"> 
        What good behavior have you displayed today? 
    </h4> 
  
	<div style="color:black;">
	<?php
		$user = $_SESSION['username'];
		echo "Hi $user, you have ";
		if(isset($_POST['button1'])) { 
			echo "10 points added to your account"; 
			// Increasing the current value with 10
			mysqli_query($db,"UPDATE users SET points = (points + 10) WHERE username='$user'");
		} 
		if(isset($_POST['button2'])) { 
			echo "20 points added to your account";
			mysqli_query($db,"UPDATE users SET points = (points + 20) WHERE username='$user'");
		}
		if(isset($_POST['button3'])) { 
			echo "30 points added to your account";
			mysqli_query($db,"UPDATE users SET points = (points + 30) WHERE username='$user'");
		}
		if(isset($_POST['button4'])) { 
			echo "40 points added to your account";
			mysqli_query($db,"UPDATE users SET points = (points + 40) WHERE username='$user'");
		} 
	?> 
	</div>
      
	<br>
	
    <form method="post" action="points.php"> 
		<table width="50%" align="center">
			<tr>
				<td  align="center" style="color:black;">
					<?php 

						$ten = "SELECT tenpoints FROM company WHERE id=123";
						$result_ten = mysqli_query($db, $ten);

						if(mysqli_num_rows($result_ten) > 0){
							$user = mysqli_fetch_assoc($result_ten);
							$user_ten = $user['tenpoints'];
						   echo "Behavior 1: $user_ten";
						}?>
				</td>
				<td >
					<input  type="submit" name="button1" value="Behavior 1" /> 
				</td>
			</tr>
			<tr>
				<td align="center" style="color:black;">
					<?php 
						$twen = "SELECT twentypoints FROM company WHERE id=123";
						$result_twen = mysqli_query($db, $twen);

						if(mysqli_num_rows($result_twen) > 0){
							$user = mysqli_fetch_assoc($result_twen);
							$user_twen = $user['twentypoints'];
							echo "Behavior 2: $user_twen\n";
						}
					?>
				</td>
				<td>
     			   <input   type="submit" name="button2" value="Behavior 2" onClick="this.disabled=true;"/> 
				</td>
			</tr>
				<tr>
					<td align="center" style="color:black;">
						<?php 
							$ten = "SELECT thirtypoints FROM company WHERE id=123";
							$result_ten = mysqli_query($db, $ten);

							if(mysqli_num_rows($result_ten) > 0){
								$user = mysqli_fetch_assoc($result_ten);
								$user_ten = $user['thirtypoints'];
								echo "Behavior 3: $user_ten \n";
							}
						?>
					</td>
					<td>
						<input  onClick="this.disabled=true;" type="submit" name="button3"  value="Behavior 3"/>				
					</td>
			</tr>
			<tr>
				<td align="center" style="color:black;">
					<?php 
						$ten = "SELECT fortypoints FROM company WHERE id=123";
						$result_ten = mysqli_query($db, $ten);

						if(mysqli_num_rows($result_ten) > 0){
							$user = mysqli_fetch_assoc($result_ten);
							$user_ten = $user['fortypoints'];
							echo "Behavior 4: $user_ten";
						}
					?>
				</td>
				<td>
					<input  onClick="this.disabled=true;" type="submit" name="button4" value="Behavior 4"/>				
				</td>
			</tr>
		</table>
    </form>
</body> 
</html> 
