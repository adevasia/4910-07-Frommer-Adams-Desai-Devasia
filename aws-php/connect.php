<?php
	
	$host = 'instance1.cxuvlwohim3v.us-east1.rds.amazonaws.com';
	$user ='master';
	$pass='password';
	$db_name='cloud337';
	$conn = new mysqli($host, $user, $pass, $db_name);
if($conn->connect_error){
		die('Connect error: '. $conn->connect_error);
}


?>