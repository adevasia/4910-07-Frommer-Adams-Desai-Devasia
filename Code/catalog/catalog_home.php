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

<form action="catalog_home.php" method="post">
<table class="column">
  <tr>
  <td >
    <input type="text" name="t0" placeholder="title" value="<?php session_start(); echo $search[0][2]; ?>" />
    <?php session_start();
    $pic = $search[0][0];
    $link = $search[0][1];
    $title = $search[0][2];
    $price = $search[0][3];
    $category = $search[0][4];
    $shippingInfo = $search[0][5];
    $results = $search[0][6];
    echo $results;  ?>
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
    $result = $search[1][6];
    echo $results;  ?>
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
    $result = $search[2][6];
    echo $results; ?>
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
    $results = $search[3][6];
    //echo "<img src=\"$pic\">";
    echo $results;  ?>

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
    $results = $search[4][6];
    echo $results;  ?>

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
    $results = $search[4][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t5" placeholder="title" value="<?php session_start(); echo $search[5][2]; ?>" />
    <?php session_start();
    $pic = $search[5][0];
    $link = $search[5][1];
    $title = $search[5][2];
    $price = $search[5][3];
    $category = $search[5][4];
    $shippingInfo = $search[5][5];
    $results = $search[5][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t6" placeholder="title" value="<?php session_start(); echo $search[6][2]; ?>" />
    <?php session_start();
    $pic = $search[6][0];
    $link = $search[6][1];
    $title = $search[6][2];
    $price = $search[6][3];
    $category = $search[6][4];
    $shippingInfo = $search[6][5];
    $results = $search[6][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t7" placeholder="title" value="<?php session_start(); echo $search[7][2]; ?>" />
    <?php session_start();
    $pic = $search[7][0];
    $link = $search[7][1];
    $title = $search[7][2];
    $price = $search[7][3];
    $category = $search[7][4];
    $shippingInfo = $search[7][5];
    $results = $search[7][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t8" placeholder="title" value="<?php session_start(); echo $search[8][2]; ?>" />
    <?php session_start();
    $pic = $search[8][0];
    $link = $search[8][1];
    $title = $search[8][2];
    $price = $search[8][3];
    $category = $search[8][4];
    $shippingInfo = $search[8][5];
    $results = $search[8][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t9" placeholder="title" value="<?php session_start(); echo $search[9][2]; ?>" />
    <?php session_start();
    $pic = $search[9][0];
    $link = $search[9][1];
    $title = $search[9][2];
    $price = $search[9][3];
    $category = $search[9][4];
    $shippingInfo = $search[9][5];
    $results = $search[9][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t10" placeholder="title" value="<?php session_start(); echo $search[10][2]; ?>" />
    <?php session_start();
    $pic = $search[10][0];
    $link = $search[10][1];
    $title = $search[10][2];
    $price = $search[10][3];
    $category = $search[10][4];
    $shippingInfo = $search[10][5];
    $results = $search[10][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t11" placeholder="title" value="<?php session_start(); echo $search[11][2]; ?>" />
    <?php session_start();
    $pic = $search[11][0];
    $link = $search[11][1];
    $title = $search[11][2];
    $price = $search[11][3];
    $category = $search[11][4];
    $shippingInfo = $search[11][5];
    $results = $search[11][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t12" placeholder="title" value="<?php session_start(); echo $search[12][2]; ?>" />
    <?php session_start();
    $pic = $search[12][0];
    $link = $search[12][1];
    $title = $search[12][2];
    $price = $search[12][3];
    $category = $search[12][4];
    $shippingInfo = $search[12][5];
    $results = $search[12][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t13" placeholder="title" value="<?php session_start(); echo $search[13][2]; ?>" />
    <?php session_start();
    $pic = $search[13][0];
    $link = $search[13][1];
    $title = $search[13][2];
    $price = $search[13][3];
    $category = $search[13][4];
    $shippingInfo = $search[13][5];
    $results = $search[13][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t14" placeholder="title" value="<?php session_start(); echo $search[14][2]; ?>" />
    <?php session_start();
    $pic = $search[14][0];
    $link = $search[14][1];
    $title = $search[14][2];
    $price = $search[14][3];
    $category = $search[14][4];
    $shippingInfo = $search[14][5];
    $results = $search[14][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t15" placeholder="title" value="<?php session_start(); echo $search[15][2]; ?>" />
    <?php session_start();
    $pic = $search[15][0];
    $link = $search[15][1];
    $title = $search[15][2];
    $price = $search[15][3];
    $category = $search[15][4];
    $shippingInfo = $search[15][5];
    $results = $search[15][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t16" placeholder="title" value="<?php session_start(); echo $search[16][16]; ?>" />
    <?php session_start();
    $pic = $search[16][0];
    $link = $search[16][1];
    $title = $search[16][2];
    $price = $search[16][3];
    $category = $search[16][4];
    $shippingInfo = $search[16][5];
    $results = $search[16][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t17" placeholder="title" value="<?php session_start(); echo $search[17][2]; ?>" />
    <?php session_start();
    $pic = $search[17][0];
    $link = $search[17][1];
    $title = $search[17][2];
    $price = $search[17][3];
    $category = $search[17][4];
    $shippingInfo = $search[17][5];
    $results = $search[17][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t18" placeholder="title" value="<?php session_start(); echo $search[18][2]; ?>" />
    <?php session_start();
    $pic = $search[18][0];
    $link = $search[18][1];
    $title = $search[18][2];
    $price = $search[18][3];
    $category = $search[18][4];
    $shippingInfo = $search[18][5];
    $results = $search[18][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t19" placeholder="title" value="<?php session_start(); echo $search[19][2]; ?>" />
    <?php session_start();
    $pic = $search[19][0];
    $link = $search[19][1];
    $title = $search[19][2];
    $price = $search[19][3];
    $category = $search[19][4];
    $shippingInfo = $search[19][5];
    $results = $search[19][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t20" placeholder="title" value="<?php session_start(); echo $search[20][2]; ?>" />
    <?php session_start();
    $pic = $search[20][0];
    $link = $search[20][1];
    $title = $search[20][2];
    $price = $search[20][3];
    $category = $search[20][4];
    $shippingInfo = $search[20][5];
    $results = $search[20][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t21" placeholder="title" value="<?php session_start(); echo $search[21][2]; ?>" />
    <?php session_start();
    $pic = $search[21][0];
    $link = $search[21][1];
    $title = $search[21][2];
    $price = $search[21][3];
    $category = $search[21][4];
    $shippingInfo = $search[21][5];
    $results = $search[21][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t22" placeholder="title" value="<?php session_start(); echo $search[22][2]; ?>" />
    <?php session_start();
    $pic = $search[22][0];
    $link = $search[22][1];
    $title = $search[22][2];
    $price = $search[22][3];
    $category = $search[22][4];
    $shippingInfo = $search[22][5];
    $results = $search[22][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t23" placeholder="title" value="<?php session_start(); echo $search[23][2]; ?>" />
    <?php session_start();
    $pic = $search[23][0];
    $link = $search[23][1];
    $title = $search[23][2];
    $price = $search[23][3];
    $category = $search[23][4];
    $shippingInfo = $search[23][5];
    $results = $search[23][6];
    echo $results;  ?>

  </td>
</tr>

  <tr>
  <td >
    <input type="text" name="t24" placeholder="title" value="<?php session_start(); echo $search[24][2]; ?>" />
    <?php session_start();
    $pic = $search[24][0];
    $link = $search[24][1];
    $title = $search[24][2];
    $price = $search[24][3];
    $category = $search[24][4];
    $shippingInfo = $search[24][5];
    $results = $search[24][6];
    echo $results;  ?>
  </td>
</tr>

</table>

<button type="submit" name = "add0">Add to Cart</button>
<input type="text" name="p0" placeholder="price of item" value="<?php echo $search[0][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add1">Add to Cart</button>
<input type="text" name="p1" placeholder="price of item" value="<?php echo $search[1][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add2">Add to Cart</button>
<input type="text" name="p2" placeholder="price of item" value="<?php echo $search[2][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add3">Add to Cart</button>
<input type="text" name="p3" placeholder="price of item" value="<?php echo $search[3][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add4">Add to Cart</button>
<input type="text" name="p4" placeholder="price of item" value="<?php echo $search[4][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add5">Add to Cart</button>
<input type="text" name="p5" placeholder="price of item" value="<?php echo $search[5][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add6">Add to Cart</button>
<input type="text" name="p6" placeholder="price of item" value="<?php echo $search[6][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add7">Add to Cart</button>
<input type="text" name="p7" placeholder="price of item" value="<?php echo $search[7][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add8">Add to Cart</button>
<input type="text" name="p8" placeholder="price of item" value="<?php echo $search[8][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add9">Add to Cart</button>
<input type="text" name="p9" placeholder="price of item" value="<?php echo $search[9][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add10">Add to Cart</button>
<input type="text" name="p10" placeholder="price of item" value="<?php echo $search[10][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add11">Add to Cart</button>
<input type="text" name="p11" placeholder="price of item" value="<?php echo $search[11][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add12">Add to Cart</button>
<input type="text" name="p12" placeholder="price of item" value="<?php echo $search[12][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add13">Add to Cart</button>
<input type="text" name="p13" placeholder="price of item" value="<?php echo $search[13][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add14">Add to Cart</button>
<input type="text" name="p14" placeholder="price of item" value="<?php echo $search[14][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add15">Add to Cart</button>
<input type="text" name="p15" placeholder="price of item" value="<?php echo $search[15][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add16">Add to Cart</button>
<input type="text" name="p16" placeholder="price of item" value="<?php echo $search[16][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add17">Add to Cart</button>
<input type="text" name="p17" placeholder="price of item" value="<?php echo $search[17][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add18">Add to Cart</button>
<input type="text" name="p18" placeholder="price of item" value="<?php echo $search[18][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add19">Add to Cart</button>
<input type="text" name="p19" placeholder="price of item" value="<?php echo $search[19][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add20">Add to Cart</button>
<input type="text" name="p20" placeholder="price of item" value="<?php echo $search[20][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add21">Add to Cart</button>
<input type="text" name="p21" placeholder="price of item" value="<?php echo $search[21][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add22">Add to Cart</button>
<input type="text" name="p22" placeholder="price of item" value="<?php echo $search[22][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add23">Add to Cart</button>
<input type="text" name="p23" placeholder="price of item" value="<?php echo $search[23][3]; ?>" />
<br><br><br><br><br><br><br><br><br>

<button type="submit" name = "add24">Add to Cart</button>
<input type="text" name="p24" placeholder="price of item" value="<?php echo $search[24][3]; ?>" />

</form>


<script src="catalog_items.js"></script>
</body>
</html>
