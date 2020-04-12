<!---
Allow Drivers to see who they represent and 
allow them to choose other companies
-->
<!DOCTYPE html>
<html>
<head>
<title>Catalog</title>
<link rel="stylesheet" type="text/css" href="../navigation.css">
<link rel="stylesheet" type="text/css" href="search.css">
<link rel="stylesheet" type="text/css" href="catalog_items.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="style">
<ul>
	<h2 class="pointer">POINTS: </h2>

    <div class="dropdown">
            <button class="dropbtn"><a href="driverprof.php"><img src="profpic.png" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="driver_home.html">HOME</a>
                <a href="../catalog/catalog_home.php">CATALOG</a>
                <a href="points.php">POINTS</a>
                <a href="#">PURCHASES</a>
                <a href="driver_company.php">COMPANY</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
     </div>

	 <button class="dropbtn2"><li><a href="../catalog/shoppingCart.html"><img src="../catalog/cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

</ul>

<br style = “line-height:10”>
	
<h2 align="center">Request to Join a Company</h2>
<p align="center">Here you will see your companies and list of all companies</p>
	
<h3 align="left">Your Companies:</h3>
<p align="left">McDonalds</p>
<h3 align="left">Companies to choose from: </h3>
<p align="left">Choose a company to send an request to</p>
	<div align="left">
	<!--List all the companies in the database-->
	<?php
		$db = new mysqli("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

		$resultSet = $db->query("SELECT name FROM company");
	
		while($rows = $resultSet->fetch_assoc())
		{
			$company_name = $rows['name'];
			echo "<input type='checkbox' id='CompanyName' name='CompanyName[]' value=$company_name/>";
			echo $company_name;
			echo "<br>";
		}
	
		// Check if an error happened when connecting.
		if ($db->connect_error) {
			echo("Connection failed");
		}
	?>
		<br><br>
		<button style="float: left" type="submit" name = "sendRequest">Send Request</button>
		</div>

</body>
</html>