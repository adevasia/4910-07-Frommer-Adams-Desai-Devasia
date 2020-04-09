<?php
session_start();
//include('server.php');
$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

// check connection
//if ($db->connect_error) {
  //  die("Connection failed: " . $db->connect_error);
//} 
//$sql="UPDATE company SET tenpoints='$behave1', twentypoints='$behave2', thirtypoints='$behave3', fortypoints='$behave4' WHERE id='123')";

if(isset($_POST['submit'])){

/*$username = $_SESSION['username'];
mysqli_select_db($db, 'cloud337');
$id = "SELECT id FROM users WHERE username='$username'";
$results = mysqli_query($db, $id);
//$id = "123";
    $user = mysqli_fetch_assoc($results);
    $user_id = $user['id'];
 */$enpoints = mysqli_real_escape_string($db, $_POST['behave1']);
$entypoints = mysqli_real_escape_string($db, $_POST['behave2']);
$irtypoints = mysqli_real_escape_string($db, $_POST['behave3']);
$ortypoints = mysqli_real_escape_string($db, $_POST['behave4']);
$ratio = mysqli_real_escape_string($db, $_POST['pointratio']);

//$sql="INSERT INTO company(tenpoints, twentypoints, thirtypoints, fortypoints) VALUES ('$enpoints','$entypoints', '$irtypoints', '$ortypoints')";
$sql = "UPDATE company SET tenpoints='$enpoints' , twentypoints='$entypoints' , thirtypoints='$irtypoints' , fortypoints='$ortypoints' pointratio='$ratio' WHERE ID=123";
mysqli_query($db, $sql);
header('location: points2.php');}
/*if (!mysql_query($sql,$db))

  {

  die('Error: ' . mysql_error());

  }

echo "Behaviours added";

 
 
mysql_close($db)
}*/
?>

