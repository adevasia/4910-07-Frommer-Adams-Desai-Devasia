<?php
  $db = new mysqli("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");
  
  $resultSet = $db->query("SELECT name FROM company");
  
  $color1 = "lightblue";
  $color2 = "teal";
  $color = $color1;

        // Check if an error happened when connecting.
        if ($db->connect_error) {
            echo("Connection failed");
        }
?>
<select name="company">
<?php
while($rows = $resultSet->fetch_assoc())
{
    $color == $color1 ? $color = $color2 : $color = $color1;
    
    $company_name = $rows['name'];
    echo "<option value='$company_name' style='background:$color;'>$company_name</option>";
}
?>
</select>
