<?php include('../server.php');?>

<!DOCTYPE html>
<html>
<head>
<style>
    .button {
	float: middle;
	border: 0;
	margin-top: 20px;
	padding: 6px 25px;
	background-color: #6b6;
	color: #fff;
	font-size: 25px;
	border-radius: 3px;
    }
    .button:hover {
	background-color: 494;
    }
</style>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="../navigation.css">
    <link rel="stylesheet" type="text/css" href="shoppingCart.css">
</head>

<body class="style">
    <ul>
        <h2 class="pointer">POINTS: 70.82</h2>

        <div class="dropdown">
          <button class="dropbtn"><a href="../profiles/driverprof.php"><img src="../profiles/profpic.png" alt="Avatar" width="50" height="50" >
          </a></button>
          <div class="dropdown-content">
            <a href="catalog_home.php">CATALOG</a>
            <a href="#">SPONSORS</a>
            <a href="../logins/login.php">LOGOUT</a>
          </div>
        </div>

        <button class="dropbtn2"><li><a href="shoppingCart.php"><img src="cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

    </ul>
    <br>
    <h1> Checkout </h1>
    
        <p style="font-size:17px">You have purchased:</p>
        <p style="font-size:25px"><?php echo $_SESSION['title']; ?></p>
        <p style="font-size:17px">Price:</p>
	<p style="font-size:25px">$<?php echo $_SESSION['total']; ?> ( <?php echo $_SESSION['ptotal']; ?>) </p>
        <p style="font-size:17px">Your purchase will be shipped to:</p>
        <p style="font-size:25px"><?php echo $_SESSION['street']; echo " "; echo $_SESSION['city']; ?></p>
        <p style="font-size:17px">You now have:</p>
        <p style="font-size:25px"><?php $newp = $_SESSION['points'] - $_SESSION['ptotal']; 
			echo $newp; ?> points</p>
    <button class="button"><a href="catalog_home.php">Keep Shopping</button>
   
</body>
</html>
