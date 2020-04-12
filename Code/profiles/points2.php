<!--
Allows the sponsor to set behavior rules
for their company
-->
<?php include('../insert2.php')?>
<html>
	
<head>
	<title>Company sets points</title>
	<link rel="stylesheet" type="text/css" href="../navigation.css">
	<link rel="stylesheet" type="text/css" href="home_bg.css">
</head>
	
<body class ="style">

<ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="sponsorprof.php"><img src="spons.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="sponsor_home.html">HOME</a>
                <a href="sponsorDriver_view.php">DRIVER</a>
                <a href="points2.php">POINT SYSTEM</a>
                <a href="sponsor_catalog.php">CATALOG</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    
    </ul>
	
	<h1><font color="black">Company sets points</font></h1>

	<form action="insert2.php" method="post"><font color="black">

		Behavior 1: <input type="text" name="behave1" /><br><br>
		Behavior 2: <input type="text" name="behave2" /><br><br>
		Behavior 3: <input type="text" name="behave3" /><br><br>
		Behavior 4: <input type="text" name="behave4" /><br><br>

		<button type="submit" name = "submit">Set Points</button>
		</font>
	</form>

</body>
</html>