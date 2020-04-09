<?php include 'finding_catalog.php';?>
<?php include('../server.php');?>

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
          <button class="dropbtn"><a href="../profiles/driverprof.html"><img src="../profiles/profpic.png" alt="Avatar" width="50" height="50" >
          </a></button>
          <div class="dropdown-content">
            <a href="catalog_home.php">CATALOG</a>
            <a href="#">SPONSORS</a>
            <a href="../logins/login.php">LOGOUT</a>
          </div>
        </div>


	<button class="dropbtn2"><li><a href="shoppingCart.html"><img src="cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

</ul>

<br style = “line-height:10”>

<!-- The search form -->
<form class="example" action="search_catalog.php" method="post" style="margin:auto;max-width:500px">
	<input type="text" id="user_input" placeholder="Search..." name="search2">
	<button id="subButton" type="submit" onclick="myFunc()"><i class="fa fa-search"></i></button>
</form>

<br style = “line-height:10”>

<!--Categories-->
<div class="buttons">
	<button class="active" data-sort="sort-all">All</button>
	<button>Recommended</button>
	<button>Pants</button>
	<button>Shirts</button>
</div>
  
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
    <input type="text" name="t" placeholder="title" value="<?php session_start(); echo $search[2]; ?>" />
    <?php 
    echo "<tr><td><img src=\"$search[0]\"></td><td><a href=\"$search[1]\">$search[2]</a><br>$$search[3]</td></tr>"; ?> 
     
  </td>
</tr>
</table>

<br><br>


<button type="submit" name = "add">Add to Cart</button>
<input type="text" name="p" placeholder="price of item" value="<?php echo $search[3]; ?>" />
</form>

<script src="catalog_items.js"></script>
</body>
</html>
