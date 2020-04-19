<?php 

 require_once("../profiles/connect.php");
    $UserID = $_GET['GetID'];
    $query = " select * from users where id='".$UserID."'";
    $result = mysqli_query($conn,$query);
 
    while($row=mysqli_fetch_assoc($result))
    {
        
        $UserName = $row['username'];
        $points = $row['points'];
      
        
    }

include('../server.php');


mysqli_select_db($db, 'cloud337');
$query = "select company_id from users_has_company where users_id='$UserID'";
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
<title>Sponsor's Catalog</title>
<link rel="stylesheet" type="text/css" href="../navigation.css">
<link rel="stylesheet" type="text/css" href="search.css">
<link rel="stylesheet" type="text/css" href="catalog_items.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="style">
	<ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="../profiles/sponsorprof.php"><img src="../profiles/spons.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="../profiles/sponsor_home.html">HOME</a>
                <a href="../profiles/sponsorDriver_view.php">DRIVER</a>
                <a href="../profiles/points2.php">POINT SYSTEM</a>
                <a href="../profiles/sponsor_catalog.php">CATALOG</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    </ul>

<br style = “line-height:10”>
<h2 align="center" style="color:black">You are buying for <b><?php echo $UserName?></b></h2>	
<h2 style="color:black;" class="pointer">POINTS: <?php echo $points?> </h2>

<?php include 'finding_catalog.php';?>
<!-- The search form -->
<form class="example" action="sponsor_searchCatalog.php?GetID=<?php echo $UserID ?>'" method="post" style="margin:auto;max-width:500px">
	<input type="text" id="user_input" placeholder="Search..." name="search2">
	<button id="subButton" type="submit" name="search" onclick="myFunc2()"><i class="fa fa-search"></i></button>
</form>

<br style = “line-height:10”>

<!--Categories-->
<form class="buttons" action="sponsor_driverCatalog.php?GetID=<?php echo $UserID ?>'" method="post">	
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