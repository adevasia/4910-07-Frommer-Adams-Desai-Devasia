<?php 
 
    require_once("connect.php");
    $UserID = $_GET['GetID'];
    $query = " select * from users where id='".$UserID."'";
    $result = mysqli_query($conn,$query);
 
    while($row=mysqli_fetch_assoc($result))
    {
        $UserID = $row['id'];
        $UserName = $row['username'];
        $UserEmail = $row['email'];
        $UserPass = $row['password'];
        $UserFname = $row['fname'];
        $UserMname = $row['mname'];
        $UserLname = $row['lname'];
        $UserBmonth = $row['bmonth'];
        $UserBday = $row['bday'];
        $UserCity = $row['city'];
        $UserState = $row['state'];
        
    }
    
    
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../navigation.css">
    <title>Edit Sponsor</title>
</head>
<body class ="style" class="bg-dark">
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
	
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h1 class="bg-success text-white text-center py-3"> Update <?php echo $UserFname ?>'s Information </h1>
                        </div>
                        <div class="card-body">
 
                            <form style="color: black" align="left" action="adminSponsor_update.php?ID=<?php echo $UserID ?>" method="post">
                                <label>Username:</label><input type="text" class="form-control mb-2" placeholder=" User Name " name="username" value="<?php echo $UserName ?>"><br/><br/>
                                <label>Email:</label><input type="email" class="form-control mb-2" placeholder=" User Email " name="email" value="<?php echo $UserEmail ?>"><br/><br/>
                                <label>Password:</label><input type="text" class="form-control mb-2" placeholder=" User Password " name="password" value="<?php echo $UserPass ?>"><br/><br/>
                                <label>First Name:</label><input type="text" class="form-control mb-2" placeholder=" User First Name " name="fname" value="<?php echo $UserFname ?>"><br/><br/>
                                <label>Last Name:</label><input type="text" class="form-control mb-2" placeholder=" User Last Name " name="lname" value="<?php echo $UserLname ?>"><br/><br/>
               
                                <label>Birth Month:</label><input type="text" class="form-control mb-2" placeholder=" User Birth Month " name="bmonth" value="<?php echo $UserBmonth ?>"><br/><br/>
                                <label>Birth Day:</label><input type="text" class="form-control mb-2" placeholder=" User Birth Day " name="bday" value="<?php echo $UserBday ?>"><br/><br/>
                                <label>City:</label><input type="text" class="form-control mb-2" placeholder=" User City " name="city" value="<?php echo $UserCity ?>"><br/><br/>
                                <label>State:</label><input type="text" class="form-control mb-2" placeholder=" User State " name="state" value="<?php echo $UserState ?>"><br/><br/>
                                <button class="btn btn-primary" name="updateAS">Update</button>
                            </form>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>