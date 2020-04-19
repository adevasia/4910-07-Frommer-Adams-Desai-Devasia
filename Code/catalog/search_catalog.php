<?php 

include('../server.php');
$userID = $_SESSION['id'];

mysqli_select_db($db, 'cloud337');
$query = "select points from users where id='$userID'";
$results = mysqli_query($db,$query);
if(mysqli_num_rows($results) > 0){
		$user = mysqli_fetch_assoc($results);
		$points = $user['points'];
}else{
		echo "empty";
}

mysqli_select_db($db, 'cloud337');
$query = "select company_id from users_has_company where users_id='$userID'";
$results = mysqli_query($db,$query);

if(mysqli_num_rows($results) > 0){
		$user = mysqli_fetch_assoc($results);
		$companyID = $user['company_id'];
}else{
		echo "empty";
}
mysqli_select_db($db, 'cloud337');
$query = "select * from company where id='$companyID'";
$results = mysqli_query($db,$query);

 while($row=mysqli_fetch_assoc($results))
    {
	 	$name = $row['name'];
       	$cat1 = $row['categoryone'];
		$cat2 = $row['categorytwo'];
		$cat3 = $row['categorythree'];
		$cat4 = $row['categoryfour'];  
    }
?>

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
	<h2 style="color:black;" class="pointer">POINTS: <?php echo $points?> </h2>

    <div class="dropdown">
            <button class="dropbtn"><a href="driverprof.php"><img src="../profiles/profpic.png" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="../profiles/driver_home.html">HOME</a>
                <a href="../catalog/catalog_home.php">CATALOG</a>
                <a href="../profiles/points.php">POINTS</a>
                <a href="#">PURCHASES</a>
                <a href="../profiles/driver_company.php">COMPANY</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
     </div>

	<button class="dropbtn2"><li><a href="shoppingCart.html"><img src="cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

</ul>

<br style = “line-height:10”>

<?php include 'finding_catalog.php';?>
<!-- The search form -->
<form class="example" action="search_catalog.php" method="post" style="margin:auto;max-width:500px">
	<input type="text" id="user_input" placeholder="Search..." name="search2">
	<button id="subButton" type="submit" name="search" onclick="myFunc()"><i class="fa fa-search"></i></button>
</form>

<br style = “line-height:10”>

<!--Categories-->
<form class="buttons" action="catalog_home.php" method="post">	
	<button data-sort="sort-all" type="submit" name="cat" value="<?php echo $cat1?>" ><?php echo $cat1?></button>
	<button type="submit" name="cat" value="<?php echo $cat2?>"><?php echo $cat2?></button>
	<button type="submit" name="cat" value="<?php echo $cat3?>"><?php echo $cat3?></button>
	<button type="submit" name="cat" value="<?php echo $cat4?>"><?php echo $cat4?></button>
</form>	
  
<br style = “line-height:10”>

<!-- Load Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Buttons to choose list or grid view -->
<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
<br style = “line-height:10”>

<form action="search_catalog.php" method="post">
<table class="column">
  <tr>
  <td >
   <input type="text" name="t" placeholder="title" value="<?php session_start(); echo $search[0][2]; ?>" />
	<?php session_start();
	$pic = $search[0][0];
	$link = $search[0][1];
	$title = $search[0][2];
	$price = $search[0][3];
	$category = $search[0][4];
	$shippingInfo = $search[0][5];
	echo "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a><br>$price<br>$category<br>$shippingInfo</td></tr>";
	//echo "<tr><td><img src=\"$search[0][0]\"></td><td><a href=\"$search[0][1]\">$search[0][2]</a><br>$search[0][3]<br>$search[0][4]<br>$search[0][5]</td></tr>"; ?>    
  </td>
</tr>

  <tr>
  <td >
   <input type="text" name="t1" placeholder="title" value="<?php session_start(); echo $search[1][2]; ?>" />
        <?php session_start();
        $pic = $search[1][0];
        $link = $search[1][1];
        $title = $search[1][2];
        $price = $search[1][3];
        $category = $search[1][4];
        $shippingInfo = $search[1][5];
        echo "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a><br>$price<br>$category<br>$shippingInfo</td></tr>";
        //echo "<tr><td><img src=\"$search[0][0]\"></td><td><a href=\"$search[0][1]\">$search[0][2]</a><br>$search[0][3]<br>$search[0][4]<br>$search[0][5]</td></tr>"; ?>
  </td>
</tr>

  <tr>
  <td >
   <input type="text" name="t2" placeholder="title" value="<?php session_start(); echo $search[2][2]; ?>" />
        <?php session_start();
        $pic = $search[2][0];
        $link = $search[2][1];
        $title = $search[2][2];
        $price = $search[2][3];
        $category = $search[2][4];
        $shippingInfo = $search[2][5];
        echo "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a><br>$price<br>$category<br>$shippingInfo</td></tr>";
        //echo "<tr><td><img src=\"$search[0][0]\"></td><td><a href=\"$search[0][1]\">$search[0][2]</a><br>$search[0][3]<br>$search[0][4]<br>$search[0][5]</td></tr>"; ?>
  </td>
</tr>

  <tr>
  <td >
   <input type="text" name="t3" placeholder="title" value="<?php session_start(); echo $search[3][2]; ?>" />
        <?php session_start();
        $pic = $search[3][0];
        $link = $search[3][1];
        $title = $search[3][2];
        $price = $search[3][3];
        $category = $search[3][4];
	$shippingInfo = $search[3][5];
	$_SESSION['save'] = $pic;
        echo "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a><br>$price<br>$category<br>$shippingInfo</td></tr>";
        //echo "<tr><td><img src=\"$search[0][0]\"></td><td><a href=\"$search[0][1]\">$search[0][2]</a><br>$search[0][3]<br>$search[0][4]<br>$search[0][5]</td></tr>"; ?>
  </td>
</tr>

  <tr>
  <td >
   <input type="text" name="t4" placeholder="title" value="<?php session_start(); echo $search[4][2]; ?>" />
        <?php session_start();
        $pic = $search[4][0];
        $link = $search[4][1];
        $title = $search[4][2];
        $price = $search[4][3];
        $category = $search[4][4];
        $shippingInfo = $search[4][5];
        echo "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a><br>$price<br>$category<br>$shippingInfo</td></tr>";
        //echo "<tr><td><img src=\"$search[0][0]\"></td><td><a href=\"$search[0][1]\">$search[0][2]</a><br>$search[0][3]<br>$search[0][4]<br>$search[0][5]</td></tr>"; ?>
  </td>
</tr>

</table>

<br><br>
<button type="submit" name = "add">Add to Cart</button>
<input type="text" name="p" placeholder="price of item" value="<?php echo $search[0][3]; ?>" />

<br><br><br><br><br><br><br>
<button type="submit" name = "add1">Add to Cart</button>
<input type="text" name="p1" placeholder="price of item" value="$<?php echo $search[1][3]; ?>" />

<br><br><br><br><br><br><br>
<button type="submit" name = "add2">Add to Cart</button>
<input type="text" name="p2" placeholder="price of item" value="$<?php echo $search[2][3]; ?>" />

<br><br><br><br><br><br><br>
<button type="submit" name = "add3">Add to Cart</button>
<input type="text" name="p3" placeholder="price of item" value="$<?php echo $search[3][3]; ?>" />

<br><br><br><br><br><br><br>
<button type="submit" name = "add4">Add to Cart</button>
<input type="text" name="p4" placeholder="price of item" value="$<?php echo $search[4][3]; ?>" />
</form>

<script src="catalog_items.js"></script>
</body>
</html>
