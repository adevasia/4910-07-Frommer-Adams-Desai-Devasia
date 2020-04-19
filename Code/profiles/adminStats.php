<?php 
include('../server.php');
 $starttime = microtime(); // default returns time as string
ob_start(); // start output buffer
  require_once("connect.php");
  $sql="SELECT id from users";
  //$gross="SELECT SUM(price) from users";
  //$total=mysqli_query($conn,$gross)
   //$total=89;
   //mysqli_select_db($db, 'cloud337'); 
 if ($result=mysqli_query($conn,$sql)) 
    { 
        $rowcount=mysqli_num_rows($result);
        
    mysqli_free_result($result);

    }
    
 	mysqli_select_db($db, 'cloud337');
	$query = "select SUM(points) as Points from users";
	$result3 = mysqli_query($db,$query);
		if(mysqli_num_rows($result3) > 0){
		$user = mysqli_fetch_assoc($result3);
		$point = $user['Points'];
	}else{
		echo "empty";
	}   
    
    
readfile($cachepage); // at some point read cache index file
$_rt = microtime() - $starttime; // page response time
$sp = round((ob_get_length() / $_rt) / 1024, 3); // speed in KB/s    
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../navigation.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css">
</head>
<body class ="style">
	
	<ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="adminprof.php"><img src="admin.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="admin_home.html">HOME</a>
                <a href="admin_view.php">ADMIN</a>
                <a href="adminSponsor_view.php">SPONSOR</a>
                <a href="adminDriver_view.php">DRIVER</a>
                <a href="adminStat.php">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    
    </ul>
	
	<h1 text-align = "center"><font color="black">Analytics</front></h1>
	
	<div class="main-section">
		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Total Users</small>
				<p><?php echo $rowcount ?></p>
			</div>
		</div>
		<div class="dashbord dashbord-green">
			<div class="icon-section">
				<i class="fa fa-money" aria-hidden="true"></i><br>
				<small>Developement Team Percent</small>
				<p>$<?php echo $point*.01?></p>
			</div>
		
		</div>
		<div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
				<small>Total Spent</small>
				<p>9 New</p>
			</div>
		</div>
	</div>      
</body>

<!-- hitwebcounter Code START -->
<a href="https://www.hitwebcounter.com" target="_blank">
<img src="https://hitwebcounter.com/counter/counter.php?page=7231660&style=0007&nbdigits=5&type=ip&initCount=0" title="User Stats" Alt="PHP Hits Count"    class="center" >
</a>                                    
                                    
</a>  
