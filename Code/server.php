<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$role     = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

// check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

// REGISTER USER
if (isset($_POST['signup_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password2']);
  $fname = "Ashen";
  $mname = "Last";

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

  $_SESSION['emails'] = $email;
  
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

  	$query = "INSERT INTO users (username, email, password, fname, mname, role) 
  			  VALUES('$username', '$email', '$password', '$fname', '$mname' ,'$role')";
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
	    $_SESSION['username'] = $username;
		
  	  if($user['role'] === "Driver"){
  		  header('location: ../profiles/driver_home.html');
  	  }elseif($user['role'] === "Sponsor"){
  		  header('location: ../profiles/sponsor_home.html');
  	  }else{
  		  header('location: ../profiles/admin_home.html');
      }
    }
    else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//save driver profile information
if (isset($_POST['submit'])) {

  $username = $_SESSION['username'];

  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $phone = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $street = mysqli_real_escape_string($db, $_POST['streetaddress']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);

  $_SESSION['fname'] = $firstname;
  $_SESSION['mname'] = $middlename;
  $_SESSION['lname'] = $lastname;
  $_SESSION['byear'] = $year;
  $_SESSION['phone'] = $phone;
  $_SESSION['street'] = $street;
  $_SESSION['city'] = $city;
  $_SESSION['email'] = $_SESSION['emails'];
  $_SESSION['zipcode'] = $zipcode; //month, day, state

  mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

	if(mysqli_num_rows($results) > 0){

	  $user = mysqli_fetch_assoc($results);
	  $user_id = $user['id'];

    $query = "UPDATE users SET fname = '$firstname', mname = '$middlename', lname = '$lastname', byear = '$year', city='$city' WHERE ID=$user_id"; 
  
	  if(mysqli_query($db, $query))
	     header('location: driverprof.php');
    else{
		 array_push($errors, "id is $user_id");
		 header('location: driverprof.php');
	   }
	}
	else
		array_push($errors, "In another else id");
}

//save sponsor information
if (isset($_POST['submitSpons'])) {

  $username = $_SESSION['username'];

  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $phone = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $street = mysqli_real_escape_string($db, $_POST['streetaddress']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);

  $_SESSION['fnameS'] = $firstname;
  $_SESSION['mnameS'] = $middlename;
  $_SESSION['lnameS'] = $lastname;
  $_SESSION['phoneS'] = $phone;
  $_SESSION['emailS'] = $_SESSION['emails'];
  $_SESSION['streetS'] = $street;
  $_SESSION['cityS'] = $city; //state
  $_SESSION['zipcodeS'] = $zipcode;

  mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];

    $query = "UPDATE users SET fname = '$firstname', mname = '$middlename', lname = '$lastname', city='$city' WHERE ID=$user_id"; 
  
    if(mysqli_query($db, $query))
       header('location: sponsorprof.php');
    else{
     array_push($errors, "id is $user_id");
     header('location: sponsorprof.php');
     }
  }
  else
    array_push($errors, "In another else id");
}

//save admin information
if (isset($_POST['submitAdmin'])) {

  $username = $_SESSION['username'];

  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $department = mysqli_real_escape_string($db, $_POST['deparment']); //month, day

  $_SESSION['fnameA'] = $firstname;
  $_SESSION['mnameA'] = $middlename;
  $_SESSION['lnameA'] = $lastname;
  $_SESSION['byearA'] = $year;
  $_SESSION['emailA'] = $_SESSION['emails'];
  $_SESSION['departmentA'] = $deparment;

  mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];

    $query = "UPDATE users SET fname = '$firstname', mname = '$middlename', lname = '$lastname', byear = '$year' WHERE ID=$user_id"; 
  
    if(mysqli_query($db, $query))
       header('location: adminprof.php');
    else{
     array_push($errors, "id is $user_id");
     header('location: adminprof.php');
     }
  }
  else
    array_push($errors, "In another else id");
}
?>
