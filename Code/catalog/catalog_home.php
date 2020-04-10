<?php include 'finding_catalog.php';?>
<?php include '../profiles/sponsor_catergories.php';?>



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

<!-- The search form -->
<form class="example" action="search_catalog.php" method="post" style="margin:auto;max-width:500px">
	<input type="text" id="user_input" placeholder="Search..." name="search2">
	<button id="subButton" type="submit" name="search" onclick="myFunc()"><i class="fa fa-search"></i></button>
</form>

<br style = “line-height:10”>

<!--Categories-->

<form class="buttons" action="catalog_home.php" method="post">	
	<button class="active" data-sort="sort-all" type="submit" name="cat" value="<?php echo $_SESSION['category1'];?>" > <?php echo $_SESSION['category1']?></button>
	<button type="submit" name="cat" value="<?php echo $_SESSION['category2'];?>"><?php echo $_SESSION['category2']?></button>
	<button type="submit" name="cat" value="<?php echo $_SESSION['category3'];?>"><?php echo $_SESSION['category3']?></button>
	<button type="submit" name="cat" value="<?php echo $_SESSION['category4'];?>"><?php echo $_SESSION['category4']?></button>
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