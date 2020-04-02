<?php include('../server.php');


// initializing variables
$category1 = "";
$category2 = "";
$category3 = "";
$category4 = ""; 
$categoryArr = array();
$maxPrice = "";
$minPrice = "";

// connect to the database
$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

// check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

// Store the categories into the database
if (isset($_POST['sponsor_done'])) {
	/*
	$username = $_SESSION['username'];
	
	$user_id = "SELECT id FROM users WHERE username='$username'";
	$company_id = "SELECT id FROM company WHERE name='Taco Bell'"; 	
	$query = "INSERT INTO users_has_company (users_id, company_id) VALUES('$user_id','$company_id')";
	//mysqli_query($db, $query);
	*/
	
	$categoryArr = $_POST["Category"];	
	$_SESSION['category1'] = $categoryArr[0];
	$_SESSION['category2'] = $categoryArr[1];
	$_SESSION['category3'] = $categoryArr[2];
	$_SESSION['category4'] = $categoryArr[3];
	
	$_SESSION['maxPrice'] = $_POST["Max"];
	$_SESSION['minPrice'] = $_POST["Min"];

	
	$category1 = $categoryArr[0];
	$category2 = $categoryArr[1];
	$category3 = $categoryArr[2];
	$category4 = $categoryArr[3];
	
	/*
	$company_id = "SELECT id FROM company WHERE name='$company_name'";
	
	$query = "UPDATE company SET name = '$company_name', categoryone='$category1',categorytwo='$category2',categorythree='$category3',categoryfour='$category4' WHERE ID=$company_id"; 
	*/
	/*
	$query = "INSERT INTO company (name, categoryone, categorytwo, categorythree, categoryfour) VALUES('$company_name',$category1','$category2','$category3','$category4')";
	  */
	mysqli_query($db, $query);
	header('location: ../catalog/catalog_home.php');
}
?>
