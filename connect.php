<?php

ob_start();
session_start();
	
$host = 'instance1.cxuvlwohim3v.us-east1.rds.amazonaws.com';
$user ='master';
$pass='password';
$db_name='cloud337';
$conn = mysqli_connect($host, $user, $pass, $db_name);
if(!$conn){
		die('Connect error: '. mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);

?>
