<!--
Allows the admin to customize a company's catalog
by choosing 4 categories and setting the min/max 
price
-->

<!--why does the done button stay on the same page and not the home page?--->
<?php 
 require_once("connect.php");
    $companyID = $_GET['GetID'];
    $query = " select * from company where id='".$companyID."'";
    $result = mysqli_query($conn,$query);
 
    while($row=mysqli_fetch_assoc($result))
    {
        $companyName = $row['name'];
    }

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customize <?php echo $companyName?> Catalog</title>
<link rel="stylesheet" type="text/css" href="../navigation.css">
</head>
	
<!--Style the checkbox-->	
<style>
input {
  width: 13px;
  height: 13px;
  padding: 0;
  margin:0;
  vertical-align: middle;
  position: relative;
  top: -1px;
  *overflow: hidden;
}	
</style>
	
<body class ="style">
	<!--Navigation Bar-->
<ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="adminprof.php"><img src="admin.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="admin_home.html">HOME</a>
                <a href="admin_view.php">ADMIN</a>
                <a href="adminSponsor_view.php">SPONSOR</a>
                <a href="adminDriver_view.php">DRIVER</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    
    </ul>
	
	
	<h1 align="center"> Customize <?php echo $companyName?>'s Catalog</h1>
	<h3 align="center">Here you can decide what the drivers will see</h3>

	<form style="color: black" action="admin_catalogEdit.php?GetID=<?php echo $companyID ?>" method="post">
		<h2 align="left">Select Categories</h2>
		<p align="left">Choose up to <b>4</b> categories you will like your drivers to choose from </p>
	
		<table width="50%">
		<tr>
		<td>
					<input type="checkbox" id="Category" name="Category[]" value = "Sports"/>Sports <br>
				</td>
				<td>
					<input type="checkbox" id="Category" name="Category[]" value = "Books"/>Books <br>
				</td>
			</tr>
			<tr>
				<td>	
					<input type="checkbox" id="Category" name="Category[]" value="Home"/>Home <br>
				</td>
				<td>
					<input type="checkbox" id="Category" name="Category[]" value = "Pet"/>Pet Supplies <br>
				</td>
			</tr>
			<tr>
				<td>	
					<input type="checkbox" id="Category" name="Category[]" value="Toys"/>Toys <br>
				</td>
				<td>
					<input type="checkbox" id="Category" name="Category[]" value = "Electronics"/>Electronics <br>
				</td>
			</tr>
				<tr>
				<td>	
					<input type="checkbox" id="Category" name="Category[]" value="Art"/>Art <br>
				</td>
				<td>
					<input type="checkbox" id="Category" name="Category[]" value = "Baby"/>Baby <br>
				</td>
			</tr>
			<tr>
				<td>	
					<input type="checkbox" id="Category" name="Category[]" value="Beauty"/>Beauty/Personal Care <br>
				</td>
				<td>
					<input type="checkbox" id="Category" name="Category[]" value = "Clothing"/>Clothing <br>
				</td>
			</tr>

		</table>
		
		<h2 align="left">Select your <b>Max</b> Price limit</h2>
		<select align="left" style="color: black" id="Max" name="Max" method="Post">
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="45">45</option>
              <option value="50">50</option>
              <option value="55">55</option>
              <option value="60">60</option>
              <option value="65">65</option>
			  <option value="70">70</option>
			  <option value="75">75</option>
			  <option value="80">80</option>
			  <option value="85">85</option>
			  <option value="90">90</option>
			  <option value="95">95</option>
			  <option value="100">100</option>
            </select>
		<h2 align="left">Select your <b>Min</b> Price limit</h2>
			<select align="left"  style="color: black" id="Min" name="Min" method="Post">
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="45">45</option>
              <option value="50">50</option>
              <option value="55">55</option>
              <option value="60">60</option>
              <option value="65">65</option>
			  <option value="70">70</option>
			  <option value="75">75</option>
			  <option value="80">80</option>
			  <option value="85">85</option>
			  <option value="90">90</option>
			  <option value="95">95</option>
			  <option value="100">100</option>
            </select>
		<br>
		<button style="float: left" type="submit" name ="admin_done">Done</button>
		<?php
			include('../server.php');

			// initializing variables
			$category1 = "";
			$category2 = "";
			$category3 = "";
			$category4 = ""; 
			$categoryArr = array();
			$maxPrice = "";
			$minPrice = "";


			// Store the categories into the database
			if (isset($_POST['admin_done'])) {
				$categoryArr = $_POST["Category"];
				$category1 = $categoryArr[0];
				$category2 = $categoryArr[1];
				$category3 = $categoryArr[2];
				$category4 = $categoryArr[3];
				$maxPrice = $_POST["Max"];
				$minPrice = $_POST["Min"];

				mysqli_select_db($db, 'cloud337');
				$query = "UPDATE company SET name = '$companyName', categoryone='$category1',categorytwo='$category2',categorythree='$category3',categoryfour='$category4',min='$minPrice',max='$maxPrice' WHERE ID=$companyID"; 

				$results=mysqli_query($db, $query);
				if($results)
				{
				   header("location:admin_home.html");
				}
				else
				{
					echo ' Please Check Your Query ';
				}
			}
		?>			
	</form>
	

</body>
</html>

