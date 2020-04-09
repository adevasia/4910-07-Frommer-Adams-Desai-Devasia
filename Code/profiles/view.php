<?php 
 
    require_once("connect.php");
    $query = " select * from users where role='Driver'";
    $result = mysqli_query($conn,$query);
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../navigation.css">
    <title>Review/Edit Drivers</title>
</head>
<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>	
<body class ="style" class="bg-dark">
<ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="sponsorprof.php"><img src="spons.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="sponsor_home.html">HOME</a>
                <a href="view.php">DRIVER</a>
                <a href="#">POINT SYSTEM</a>
                <a href="sponsor_catalog.php">CATALOG</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    
    </ul>
	<h1 align = "center" style="color: black" >Review and Edit Your Drivers</h1>
	<br>
	<br>
	
        <div class="container">
                        <table style="color: black" align = "center">
                            <tr>
                                <td> User ID </td>
                                <td> Username </td>
                                <td> Email </td>
                                <td> User Password </td>
                                <td> First's Name </td>
                                <td> Last's Name </td>
                                <td> User Points </td>
                                <td>   </td>
                                <td>  </td>
                            </tr>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $UserID = $row['id'];
                                        $UserName = $row['username'];
                                        $UserEmail = $row['email'];
                                        $UserPass = $row['password'];
                                        $UserFname = $row['fname'];
                                        $UserLname = $row['lname'];
                                        $UserPoints = $row['points'];
                                        
                            ?>
                                    <tr>
                                        <td><?php echo $UserID ?></td>
                                        <td><?php echo $UserName ?></td>
                                        <td><?php echo $UserEmail ?></td>
                                        <td><?php echo $UserPass ?></td>
                                        <td><?php echo $UserFname ?></td>
                                        <td><?php echo $UserLname ?></td>
                                        <td><?php echo $UserPoints ?></td>
                                        <td><a href="edit.php?GetID=<?php echo $UserID ?>">Edit</a></td>
                                        <td><a href="delete.php?Del=<?php echo $UserID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   
 
                        </table>
        </div>
    
</body>
</html>