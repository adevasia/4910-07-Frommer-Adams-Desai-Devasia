<?php
   ob_start();
   session_start();
   
?>

<html>
<head>
	<title>The Login System</title>
</head>

<body>
	<h1>AWS PHP tutorial</h1>
	<?php
		include 'connect.php';
		$result = $conn->query("select * from users");
		$results = $result->fetch_all();
		
		print_r($results);
	
		$conn->close();
	?>
</body>
</html>