<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$role     = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

// REGISTER USER
if (isset($_POST['signup_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password2']);

  if (empty($_POST['Driver']) && empty($_POST['Sponsor'])) {
	  $role = mysqli_real_escape_string($db, $_POST['Administrator']);
  }elseif(empty($_POST['Sponsor']) && empty($_POST['Administrator'])) {
	  $role = mysqli_real_escape_string($db, $_POST['Driver']);
  }else{
	  $role = mysqli_real_escape_string($db, $_POST['Sponsor']);
  }
	
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if(empty($role)) { array_push($errors, "Choose: Driver/Sponsor/Administrator");}
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, role) 
  			  VALUES('$username', '$email', '$password', '$role')";
  	mysqli_query($db, $query);
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($results);
	  
  	if (mysqli_num_rows($results) == 1) {
  	  /*$_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');*/
	  if($user['role'] === "Driver"){
		  header('location: ../profiles/driver_home.html');
	  }elseif($user['role'] === "Sponsor"){
		  header('location: ../profiles/sponsor_home.html');
	  }elseif($user['role'] === "Administrator"){
		  header('location: ../profiles/admin_home.html');
	  }else {
		  array_push($errors, "There is an error");
	  }
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>