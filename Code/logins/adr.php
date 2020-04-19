<?php 
 	//require_once("../profiles/connect.php");
  //  require_once("connect.php");
include('../server.php');
	$userID = $_SESSION['un'];
 
  	mysqli_select_db($db, 'cloud337');
	$query = "select companyN from users where username='$userID'";
	$results = mysqli_query($db,$query);

	if(mysqli_num_rows($results) > 0){
		$user = mysqli_fetch_assoc($results);
		$company = $user['companyN'];
	}else{
		echo "herat";
	}


	mysqli_select_db($db, 'cloud337');
	$query = "select username from requests where companyN='$company' and role='Driver'";
	$result = mysqli_query($db,$query);

$checkbox = array();

if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
 //echo hello;
 $check11 =$checkbox[1];
 //echo $check11;
	for($i=0;$i<count($checkbox);$i++){
		$del_id = $checkbox[$i];
		//$del_id = "jim";
		
	$query1 = "INSERT INTO users(`username`, `email`, `password`, `role`, `secAns`, `companyN`)"
    ." SELECT `username`, `email`, `password`, `role`, `secAns`, `companyN` "
    ." FROM requests WHERE username='".$del_id."'";	
	$res1 = mysqli_query($db, $query1);
	
	mysqli_query($db,"DELETE FROM requests WHERE username='".$del_id."'");
	$message = "Data deleted successfully !";
	header('location:adr.php');
}
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
    <title>Review Drivers Requests</title>
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
  background-color: #4CAF50;
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
            <button class="dropbtn"><a href="../profiles/sponsorprof.php"><img src="../profiles/spons.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="../profiles/sponsor_home.html">HOME</a>
                <a href="../profiles/view.php">DRIVER</a>
                <a href="../profiles/points2.php">POINT SYSTEM</a>
                <a href="../profiles/sponsor_catalog.php">CATALOG</a>
                <a href="#">ANALYTIC</a>
                <a href="login.php">LOGOUT</a>
            </div>
        </div>
    </ul>

	
	<h1 align = "center" style="color: black" >Review Your Drivers</h1>
	<button  style="width: 20%; height: 20%; background-color: #17A5BC;" onclick=" window.location.href='newSponDriv.php' ">Add New Drivers</button>
	<br>
	<form method="post" action="">
        <div class="container">
                        <table style="color: black" align = "center">
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $UserName = $row['username'];
                                        
                            ?>
                                    <tr>
                                        <td><?php echo $UserName ?></td>
										<td><input type="checkbox" name="check[]" class="check" value = "<?php echo $UserName?>"/>Accept/Deny Drivers</td>
                           
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   
 
                        </table>
														<button  name = "save" style="background-color: #17A43D" >Submit</button>
        </div>
	</form>
	<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>
