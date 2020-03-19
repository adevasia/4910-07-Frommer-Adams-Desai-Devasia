<?php
session_start();

$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

if (isset($_POST['submit'])) {
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $phone = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $street = mysqli_real_escape_string($db, $_POST['streetaddress']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
	
  $query = "INSERT INTO users (fname,mname,lname,byear,city) 
		  VALUES('$firstname', '$middlename', '$lastname', '$year', '$city')";
  mysqli_query($db, $query);

}

?>