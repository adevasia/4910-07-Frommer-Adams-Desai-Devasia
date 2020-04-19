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

<table class="column">
	<tr>
	  <td >
		<?php echo $results?>
	  </td>
	</tr>
</table>


<script src="catalog_items.js"></script>
</body>
</html>