<!-- Sponsors can add new Drivers-->

<?php

  	include('../server.php');
  //  require_once("connect.php");
	$userID = $_SESSION['id'];

  	mysqli_select_db($db, 'cloud337');
	$query = "select company_id from users_has_company where users_id='$userID'";
	$results = mysqli_query($db,$query);

	if(mysqli_num_rows($results) > 0){
		$user = mysqli_fetch_assoc($results);
		$company1 = $user['company_id'];
		$_SESSION['company'] = $company;
	}else{
		echo "empty";
	}

  	mysqli_select_db($db, 'cloud337');
	$query = "select name from company where id='$company1'";
	$results = mysqli_query($db,$query);

	if(mysqli_num_rows($results) > 0){
		$user = mysqli_fetch_assoc($results);
		$company = $user['name'];
	}else{
		echo "empty";
	}
  $db = new mysqli("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

  $resultSet = $db->query("SELECT name FROM company");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../navigation.css">
    <title>Add Drivers</title>
</head>
<body class ="style" class="bg-dark">
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

	
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h1 class="bg-success text-white text-center py-3"> Add New Drivers </h1>
                        </div>
                        <div class="card-body">
 
                            <form style="color: black" align="left" action="newSponDriv.php" method="post">
                                <label>Username:</label><input type="text" class="form-control mb-2" placeholder=" User Name " name="username" value="<?php echo $UserName ?>"><br/><br/>
                                <label>Email:</label><input type="email" class="form-control mb-2" placeholder=" User Email " name="email" value="<?php echo $UserEmail ?>"><br/><br/>
                                <label>Password:</label><input type="text" class="form-control mb-2" placeholder=" User Password " name="password" value="<?php echo $UserPass ?>"><br/><br/>
                                <label>First Name:</label><input type="text" class="form-control mb-2" placeholder=" User First Name " name="fname" value="<?php echo $UserFname ?>"><br/><br/>
                                <label>Last Name:</label><input type="text" class="form-control mb-2" placeholder=" User Last Name " name="lname" value="<?php echo $UserLname ?>"><br/><br/>
								  <label>Points:</label><input type="number" class="form-control mb-2" placeholder=" User Points " name="points" value="<?php echo $UserPoints ?>"><br/><br/>
                                <label>Birth Month:</label><input type="text" class="form-control mb-2" placeholder=" User Birth Month " name="bmonth" value="<?php echo $UserBmonth ?>"><br/><br/>
                                <label>Birth Day:</label><input type="text" class="form-control mb-2" placeholder=" User Birth Day " name="bday" value="<?php echo $UserBday ?>"><br/><br/>
                                <label>City:</label><input type="text" class="form-control mb-2" placeholder=" User City " name="city" value="<?php echo $UserCity ?>"><br/><br/>
                                <label>State:</label><input type="text" class="form-control mb-2" placeholder=" User State " name="state" value="<?php echo $UserState ?>"><br/><br/>
								<label>Security Word:</label><input type="text" class="form-control mb-2" placeholder=" User Security Word " name="word" value="<?php echo $answer ?>"><br/><br/>
								<label value="company">Company:<?php echo $company ?></label>
								<br>
                                <button class="btn btn-primary" name="Insert">Add</button>
								
								<?php 

 
    require_once("connect.php");
 
     if(isset($_POST['Insert']))
    {
        $UserName = $_POST['username'];
        $UserEmail = $_POST['email'];
        $UserPass = md5($_POST['password']);
        $UserFname = $_POST['fname'];
        $UserMname = $_POST['mname'];
        $UserLname = $_POST['lname'];
        $UserBmonth = $_POST['bmonth'];
        $UserBday = $_POST['bday'];
        $UserCity = $_POST['city'];
        $UserState = $_POST['state'];
		$answer = $_POST['secAns'];
		
	
		$role= "Driver"; 
		$UserPoints = $_POST['points'];
 
      $query = "INSERT INTO users (username, email, password, fname, mname, lname, bmonth, bday, role, secAns, city, state, companyN, points) 
  			  VALUES('$UserName', '$UserEmail', '$UserPass', '$UserFname', '$UserMname' , '$UserLname', '$UserBmonth', '$UserBday', '$role', '$answer', '$UserCity', '$UserState','$company' , '$UserPoints')";
        $result = mysqli_query($conn,$query);
		 
		$users_id1 = mysqli_insert_id($conn);
	  
	  
	$id = "SELECT id FROM company WHERE name='$company'";
    $results = mysqli_query($conn, $id);
    $user = mysqli_fetch_assoc($results);
    $userId2 = $user['id'];
	
    $query = "INSERT INTO users_has_company (users_id, company_id)
	      VALUES($users_id1, $userId2)";
    if(mysqli_query($conn, $query));
 
        if($result)
        {
           header("location:sponsorDriver_view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
  
?>
                            </form>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>

