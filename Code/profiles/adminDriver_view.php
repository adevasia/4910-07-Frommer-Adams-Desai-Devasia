<!--Admin can add, delete, and edit Drivers-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
	
button {
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

	
</style>	
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
	
	<h1 align = "center" style="color: black" >Review and Edit Company's Drivers</h1>
	<button  style="width: 20%; height: 20%; background-color: #17A5BC;" onclick=" window.location.href='newAdminDriver.php' ">Add New Drivers</button>
	<br>
	
	<?php
	require_once("connect.php");
	$query1 = "select * from company";
	$result1 = mysqli_query($conn,$query1);
	

		while($rows=mysqli_fetch_assoc($result1))
		{
			$company_name = $rows['name'];
			
				$conn = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");
			$query = "select * from users where role='Driver' and companyN='".$company_name."'  ";
			$result = mysqli_query($conn,$query);
		
	?>
		<br>
	    <h3 align="left"><?php echo $company_name;?></h3> 
        <div class="container">
                        <table style="color: black" align = "center">
                            <tr>
                                <th> User ID </th>
                                <th> Username </th>
                                <th> Email </th>
                                <th> User Password </th>
                                <th> First's Name </th>
                                <th> Last's Name </th>
                                <th> User Points </th>
                                <th>  </th>
                                <th>  </th>
								<th>  </th>
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
										<td>
											<button  style="background-color: #17A43D" onclick=" window.location.href='adminDriver_edit.php?GetID=<?php echo $UserID ?>' ">Edit</button>
										</td>
										<td>
											<button  style="background-color: #FB1111" onclick=" window.location.href='adminDriver_update.php?Del=<?php echo $UserID ?>' ">Delete</button>
										</td>
										<td>
											<button  style="background-color: #0907C7" onclick=" window.location.href='../catalog/admin_driverCatalog.php?GetID=<?php echo $UserID ?>' ">Buy</button>
										</td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   
 
                        </table>
        </div>
       <?php 
			}  
		?>  
</body>
</html>