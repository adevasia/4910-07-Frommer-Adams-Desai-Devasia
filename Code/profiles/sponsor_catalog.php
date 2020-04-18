<!--
Allows the sponsor to customize their catalog
by choosing 4 categories and setting the min/max 
price
-->
<?php include'../catalog/finding_catalog.php';?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customize Your Catalog</title>
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
            <button class="dropbtn"><a href="sponsorprof.php"><img src="spons.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="sponsor_home.html">HOME</a>
                <a href="view.php">DRIVER</a>
                <a href="points2.php">POINT SYSTEM</a>
                <a href="sponsor_catalog.php">CATALOG</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    </ul>
	
	
	<h1 align="center"> Customize Your Catalog</h1>
	<h3 align="center">Here you can decide what your drivers will see</h3>
	
	<form style="color: black" action="sponsor_catalog.php" method="post">
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
		<select style="color: black" id="Max" name="Max" method="Post">
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
			<select style="color: black" id="Min" name="Min" method="Post">
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
		<button style="float: left" type="submit" name = "sponsor_done">Done</button>
	</form>
</body>
</html>
