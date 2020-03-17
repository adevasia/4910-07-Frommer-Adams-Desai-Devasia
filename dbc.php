<!DOCTYPE html>
<html>
<head>
  <title>Table with Registered Users</title>
  <style type="text/css">
    table {
      border-collapse: collapse;
      width: 100%;
      color: #d96459;
      fornt-family: monospace;
      font-size: 25px;
      text-align: left;
          }
    th {
      background-color: #d96459;
      color: white;
      }
  </style>
</head>
<body>
<table>
  <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Email</th>
    <th>Password</th>
    <th>Name</th>
  </tr>
  <?php
  $db = new mysqli("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

        // Check if an error happened when connecting.
        if ($db->connect_error) {
            echo("Connection failed");
        }
  $sql = "SELECT id, username, email, password from users";
  $result = $db-> query($sql);
  
  if($result-> num_rows> 0) {
    while($row =$result-> fetch_assoc()){
      echo "<tr><td>". $row["id"] ."</td><td>". $row["username"] ."</td><td>". $row["email"] ."</td><td>". $row["password"] ."</td><td>". $row["fname"] ."</td><td>";
      }
      echo "</table>";
    }
    else{
      echo "0 result";
    }
    
    $db->close();
    ?>
</table>
</body>
</html>
