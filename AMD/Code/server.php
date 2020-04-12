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
  $answer = mysqli_real_escape_string($db, $_POST['question']);
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
  if(empty($answer)) {array_push($errors, "Please answer your security question");}

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

  	$query = "INSERT INTO users (username, email, password, fname, mname, role, secAns) 
  			  VALUES('$username', '$email', '$password', '$fname', '$mname' ,'$role', '$answer')";
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

        if(isset($_POST['button1'])) {
          $username = $_SESSION['username'];
          mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id']; 
            echo "10 points added to your account"; 
            // Increasing the current value with 10
            mysqli_query($db,"UPDATE users SET points = (points + 10) WHERE ID=$user_id");

        }} 
        if(isset($_POST['button2'])) {
        $username = $_SESSION['username']; 
            mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];
            echo "20 points added to your account";
            mysqli_query($db,"UPDATE users SET points = (points + 20) WHERE ID=$user_id");
        }}
        if(isset($_POST['button3'])) { 
          $username = $_SESSION['username'];
            mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];
            echo "30 points added to your account";
            mysqli_query($db,"UPDATE users SET points = (points + 30) WHERE ID=$user_id");
        }}
        if(isset($_POST['button4'])) { 
          $username = $_SESSION['username'];
            mysqli_select_db($db, 'cloud337');
  $id = "SELECT id FROM users WHERE username='$username'";
  $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];
            echo "40 points added to your account";
            mysqli_query($db,"UPDATE users SET points = (points + 40) WHERE ID=$user_id");
  } }

if (isset($_POST['add'])) {
    $username = $_SESSION['username'];
    $price = mysqli_real_escape_string($db, $_POST['p']);
    $title = mysqli_real_escape_string($db, $_POST['t']);
    //$price = $_SESSION['items'][3];

    $_SESSION['price'] = $price;
    $_SESSION['title'] = $title;

    mysqli_select_db($db, 'cloud337');
    $id = "SELECT id FROM users WHERE username='$username'";
    $results = mysqli_query($db, $id);

    if (mysqli_num_rows($results) > 0) {
        $user = mysqli_fetch_assoc($results);
	$user_id = $user['id'];

	//$ratio = mysqli_query($db, "SELECT fname FROM users WHERE username='$username'");
	$_SESSION['ratio'] = 1.5;

	$query = "UPDATE users SET price = '$price', title = '$title' WHERE ID=$user_id";

	if (mysqli_query($db, $query)) {
	    header('location: shoppingCart.php');
	}
	else {
	    array_push($errors, "id is $user_id");
	    header('location: shoppingCart.php');
	}
    }
    else {
	array_push($errors, "In another else id");
    }
}

if(isset($_POST['reset_pass'])){
	$givenAns = mysqli_real_escape_string($db, $_POST['question']);
	$givenUsername = mysqli_real_escape_string($db, $_POST['username']);

	if(empty($givenAns))
		array_push($errors, "Security answer is required");
	if(empty($givenUsername))
		array_push($errors, "username is required");

	if(count($errors) == 0){
		$query = "SELECT secAns FROM users WHERE username='$givenUsername'";
		$results = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($results);
		if(mysqli_num_rows($results) == 1) {
                $_SESSION['user'] = $givenUsername;
			if($user['secAns'] === $givenAns){
					header('location: resetPass.php');
			}
			else{
				header('location: forgotPass.php');
				array_push($errors, "The security answer does not match");
			}
		}else{
			header('location: forgotPass.php');
			array_push($errors, "Your username does not match");
		}
	}}
	
if(isset($_POST['pass_change'])){
	$pas1 = mysqli_real_escape_string($db, $_POST['pass1']);
        $pas2 = mysqli_real_escape_string($db, $_POST['pass2']);
	$username = $_SESSION['user'];

        if(empty($pas1)) array_push($errors, "New password is required");	
	if(empty($pas2)) array_push($errors, "Need to confirm your password");

	if ($pas1 != $pas2) {
	   array_push($errors, "The two passwords do not match");
        }
	if(count($errors) == 0){
	mysqli_select_db($db, 'cloud337');
        $id = "SELECT id FROM users WHERE username='$username'";
        $results = mysqli_query($db, $id);

  if(mysqli_num_rows($results) > 0){

    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];

    $pas1 = md5($pas1);
    $query = "UPDATE users SET password = '$pas1' WHERE ID=$user_id"; 
  
    if(mysqli_query($db, $query))
       header('location: login.php');
  }}
  else
    array_push($errors, "Please Fill the required fields.");

}



?>

